<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Model\User;
use DB;
class LoginController extends Controller
{
    //登录视图
    public function login()
    {
        return view('login/login');
    }
    //登录查询
    public function login_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $u_email=$arr['u_email'];
        $u_pwd=$arr['u_pwd'];
        $res=User::where('u_email',$u_email)->first();
        if(empty($res)){
            return 1;
        }
        if($res['u_pwd'] != $u_pwd){
            return 2;
        }
        session(['userinfo'=>$u_email]);
        return 3;
    }
    //注册视图
    public function register()
    {
        return view('login/register');
    }
    //注册添加数据库
    public function register_do(Request $request)
    {
        $arr=$_REQUEST;
        $email=Cache::get($arr['u_email']);
//        dd($arr['phone_number']);
        $emails=DB::table('user')->where('u_email',$arr['u_email'])->first();
//        var_dump($emails);die;
        if(!empty($emails)){
            return 4;
        }
        if(!$email==$arr['phone_number']){
            return  1;
        }
        $data=[
            'u_mobile'=>$arr['u_mobile'],
            'u_email'=>$arr['u_email'],
            'u_pwd'=>$arr['u_pwd'],
            'u_time'=>time(),
        ];
//        dd($data);
        $res=User::insertGetId($data);
//        dd($res);
        if($res){
            session(['userinfo'=>$arr['u_email']]);
            return 2;
        }else{
            return 3;
        }
    }
    //发送邮箱
    public function email()
    {
         $email=$_REQUEST['email'];
//         dd($email);
        $msg=rand(1000,9999);
        Mail::raw($msg ,function($message)use($email){
            //设置主题
            $message->subject("欢迎注册MetInfo有限公司");
            //设置接收方
            $message->to($email);
        });
        Cache::store('file')->put($email, $msg);
        $num=Cache::get($email);
        var_dump($num);
        echo 1;
    }
}
