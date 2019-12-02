<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;
class MusicController extends Controller
{
    //接口获取数据
    public function app_mysqli()
    {
        $arr = file_get_contents('https://www.mxnzp.com/api/music/recommend/list');
        $arr = json_decode($arr, 1);
//        print_r($arr);
        foreach ($arr['data'] as $k => $v) {
            $arr_mysqli = [];
            $arr_mysqli = [
                'author' => $v['author'],
                'info' => $v['info'],
                'album_title' => $v['album_title'],
                'title' => $v['title'],
                'si_proxycompany' => $v['si_proxycompany'],
            ];
//            var_dump($arr_mysqli);die();
            $Music = Music::create($arr_mysqli);
            var_dump($Music);
        }
    }
        // 必须通过assecc_token 返回数据
        public function token(Request $request)
        {
            $token = $request->input('token');
//            var_dump($token);die;
            $redis = new \Redis();
            $redis->connect("127.0.0.1",6379);
            $num = $redis->get($token);
            if ($redis->get($token)){
                if($num >10 ){
                    $arr = array(
                        "error"=>"4005",
                        "msg"=>"接口调用频繁 超过十次，请在下一个5分钟在调用",
                    );
                    print_r($arr);exit;
                }else{
                    $num = $num +1;
                    $redis->set($token,$num);
                }
            }else{
                $arr = array(
                    "error"=>"4001",
                    "msg"=>"token无效",
                );
                print_r($arr);exit;
            }
            // 返回的 数据
            $info=Music::get();
            $json = json_encode($info);

            // logs  目录
            $baseDir= Date("Y/m/d/",time());
            $path=storage_path("logs/api/".$baseDir."");
            if (!empty($json)){
                if (!is_dir($path)) {
                    mkdir($path,0,777);
                }
                file_put_contents($path.date('Y-m-d').'.txt',"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
                file_put_contents($path.date('Y-m-d').'.txt',"$info\n",FILE_APPEND);
            }else{
                $arr = array(
                    "error"=>"4009",
                    "msg"=>"暂无数据",
                );
                print_r($arr);exit;
            }
            return $json;
        }
}
