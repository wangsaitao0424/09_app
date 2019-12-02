<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ExamUser;
use Illuminate\Support\Facades\Redis;//redis
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token=Request::input()[''];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $u_name=ExamUser::where(['u_name'=>$arr['u_name']])->first();
        if(!empty($u_name)){
            return 3;
        }
        $res=ExamUser::create($arr);
        if($res){
            $key=$arr['u_name'].'_'.$arr['u_pwd'];
            Redis::setex("user",60*5,$key);
            $accessToken=rand(1000,9999).$key;
            Redis::setex($key,60*5,$accessToken);
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $key=Redis::get("user");
        $wid=Redis::get($key);
        if($id == $wid){
            if(Redis::get('num')>10){
                return 3;
            }else{
                if(empty(Redis::get('com'))){
                    $res=DB::table('exam_com')->get()->toArray();
//            dd($res);
                    $data=json_encode($res);
                    Redis::setex("com",6000,$data);
                    return $data;
                }else{
                    $data=Redis::get('com');
                    Redis::incr('num',60*5);
//                echo $num;die;
                    return $data;
                }
            }
        }else{
            echo 2;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        echo 11;die;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
