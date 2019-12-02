<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;
use Illuminate\Support\Facades\Redis;//redis
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $key = md5(uniqid());
        $redis = new \Redis();
        $redis->connect("127.0.0.1",6379);
//        $redis->set($key,0,60*5);
//        return $key;
        $ip=sprintf("%u",crc32($_SERVER['REMOTE_ADDR']));
        if(!$redis->get('sole_'.$ip)){
            $key=md5(uniqid());
            $redis->set('sole_'.$ip,$key,300);
        }
        $keys=$redis->get('sole_'.$ip);
        if($redis->get($keys)){
            $nums=$redis->get($keys);
            if($nums >= 10){
                dd('频率过高');
            }
            $redis->incr($keys,$nums);
        }else{
                $redis->set($keys,1,300);
        }
        $data=Music::get();
        $json=json_encode($data);
//        var_dump($json);die;
        //logs  目录
        $baseDir= Date("Y/m/d/",time());
        $path=storage_path("logs/api/1/".$baseDir."");
        if (!empty($json)){
            if (!is_dir($path)) {
                mkdir($path,0,777);
            }
            file_put_contents($path.date('Y-m-d').'.txt',"<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<\n",FILE_APPEND);
            file_put_contents($path.date('Y-m-d').'.txt',"$json\n",FILE_APPEND);
        }else{
            $arr = array(
                "error"=>"4009",
                "msg"=>"暂无数据",
            );
            print_r($arr);exit;
        }
        return $json;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 22;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr=$request->all();
        $key=$arr['u_name'].'_'.$arr['u_pwd'];
        $accessToken=Redis::get($key);
//        dd($accessToken);
        echo $accessToken;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
    }
}
