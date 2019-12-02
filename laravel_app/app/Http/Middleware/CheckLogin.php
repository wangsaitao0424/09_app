<?php

namespace App\Http\Middleware;

use Closure;
//use App\Model\Role;//角色model
use App\Model\Right;//权限model
use App\Model\User;//用户model
use App\Model\User_Role;//用户角色model
use App\Model\Role_Right;//角色权限model
use DB;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('userinfo'))){
            echo "<script>alert('请先登录!');location.href='" . url('admin/logins') . "';</script>";
        }
        //rbac
        $user=User::where('u_email',session('userinfo'))->join('user_role','user.u_id','user_role.user_id')->first();//role_id
        $role_right=Role_Right::where('role_id',$user['role_id'])->get();
        $data="";
        foreach ($role_right as $k=>$v){
            $http=$request->server('HTTP_HOST');//可以获取到 $_SERVER 中的 HTTP_HOST 信息 （即访问域名）
            $url=$request->server('REDIRECT_URL'); //
            $header='http://'.$http.$url;
            $right=Right::where(['right_id'=>$v['right_id']])->where(['right_url'=>$header])->first();
            $data.=$right;
        }
        if(empty($data)){
            echo "<script>alert('你的权限不高!请联系超级管理员。');location.href='" . url('admin/index') . "';</script>";die;
        }
        return $next($request);
    }
}
