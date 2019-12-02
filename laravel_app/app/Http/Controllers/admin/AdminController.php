<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Navigation;//一级导航model
use App\Model\NavigationTwo;//二级导航model
use App\Model\NavigationThree;//三级导航model
use App\Model\Slide;//下轮播图model
use App\Model\Slides;//上轮播图model
use App\Model\Friend;//友情链接model
use App\Model\Role;//角色model
use App\Model\Right;//权限model
use App\Model\User;//用户model
use App\Model\User_Role;//用户权限model
use App\Model\Role_Right;//角色权限model
class AdminController extends Controller
{
    /**
     * 自动加载 判断是否登录
     * AdminController constructor.
     * @param Request $request
     */
//    public function __construct(request $request)
//    {
//        $this->request = request();
//        // 验证是否登录
//        $this->middleware(function ($request, $next) {
//            if (!\Session::get('userinfo')) {
//                echo "<script>alert('请先登录!');location.href='" . url('admin/logins') . "';</script>";
//            }
//            return $next($request);
//        });
//    }

    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //取session中的值
//        if ($request->session()->has('userinfo')) {
//            $email = session('userinfo');
////            dd($email);
//            return view('admin/index',['email'=>$email]);
//        }
        return view('admin/index');
    }

    /**
     * 一级导航栏视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_one()
    {
        return view('admin/navigation_bar_one');
    }

    /**
     * 一级导航添加数据 ajax
     */
    public function navigation_bar_one_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'na_name'=>$arr['na_name'],
            'na_url'=>$arr['na_url'],
            'na_weight'=>$arr['na_weight'],
            'na_time'=>time(),
            'na_home'=>$arr['na_home']
        ];
        $res=Navigation::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 一级导航展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_one_list(Request $request)
    {
        $arr=$request->input('na_name');
//        dd($arr);
        if(isset($arr)){
            $list=Navigation::paginate(3);
        }else{
            $list=Navigation::where('na_name','like',"%".$arr['na_name']."%")->paginate(3);
        }
//        $list=Navigation::where([''])->paginate(3);
        return view('admin/navigation_bar_one_list',['list'=>$list]);
    }

    /**
     * 一级导航删除
     * @return int
     */
    public function navigation_bar_one_del()
    {
        $na_id=$_REQUEST['na_id'];
//        dd($na_id);
        $result=NavigationTwo::where(['na_id'=>$na_id])->first();
        if(!empty($result)){
            return 3;die;
        }
//        dd($result);
        $res=Navigation::where(['na_id'=>$na_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    /**
     * 二级导航视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_two()
    {
        $info=Navigation::all();
        return view('admin/navigation_bar_two',['info'=>$info]);
    }

    /**
     * 二级导航数据添加
     */
    public function navigation_bar_two_do()
    {
        $arr=$_REQUEST;
        $data=[
            'nt_name'=>$arr['nt_name'],
            'nt_weight'=>$arr['nt_weight'],
            'is_show'=>$arr['is_show'],
            'na_id'=>$arr['na_id'],
            'nt_time'=>time(),
        ];
//        var_dump($data);die;
        $res=NavigationTwo::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 二级导航栏展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_two_list()
    {
        $list_two=NavigationTwo::paginate(3);
//        dd($list_two);
        $list_one=Navigation::get();
//        var_dump($list_one);die;
        return view('admin/navigation_bar_two_list',['list_two'=>$list_two,'list_one'=>$list_one]);
    }
    /**
     * 二级导航删除
     * @return int
     */
    public function navigation_bar_two_del()
    {
        $nt_id=$_REQUEST['nt_id'];
        $result=NavigationThree::where(['nt_id'=>$nt_id])->first();
        if(!empty($result)){
            return 3;die;
        }
        $res=NavigationTwo::where(['nt_id'=>$nt_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 三级导航栏视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_three()
    {
        $info=NavigationTwo::all();
        return view('admin/navigation_bar_three',['info'=>$info]);
    }

    /**
     * 三级导航添加
     */
    public function navigation_bar_three_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'nth_name'=>$arr['nth_name'],
            'nth_url'=>$arr['nth_url'],
            'nth_weight'=>$arr['nth_weight'],
            'is_show'=>$arr['is_show'],
            'nt_id'=>$arr['nt_id'],
            'nth_content'=>empty($arr['nth_content'])? 0 :$arr['nth_content'],
            'nth_img'=>empty($arr['nth_img'])? 0 : $arr['nth_img'],
            'nth_time'=>time(),
        ];
//        var_dump($data);die;
        $res=NavigationThree::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 三级导航展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function navigation_bar_three_list()
    {
        $list_two=NavigationTwo::get();
        $list_three=NavigationThree::paginate(3);
        return view('admin/navigation_bar_three_list',['list_two'=>$list_two,'list_three'=>$list_three]);
    }

    /**
     * 三级导航删除
     * @return int
     */
    public function navigation_bar_three_del()
    {
        $nth_id=$_REQUEST['nth_id'];
//        dd($nth_id);
        $res=NavigationThree::where(['nth_id'=>$nth_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 下轮播图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slide()
    {
        return view('admin/slide');
    }

    /**
     * 下轮播添加
     */
    public function slide_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'sls_img'=>$arr['sls_img'],
            'sls_weight'=>$arr['sls_weight'],
            'is_show'=>$arr['is_show'],
            'sls_time'=>time()
        ];
//        var_dump($data);die;
        $res=Slide::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 展示下轮播图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slide_list()
    {
        $list=Slide::paginate(3);
        return view('admin/slide_list',['list'=>$list]);
    }

    /**
     * 删除下轮播图
     * @return int
     */
    public function slide_del()
    {
        $sls_id=$_REQUEST['sls_id'];
        $res=Slide::where(['sls_id'=>$sls_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    /**
     * 上轮播图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slides()
    {
        return view('admin/slides');
    }

    /**
     * 上轮播添加
     */
    public function slides_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'sl_img'=>$arr['sl_img'],
            'sl_weight'=>$arr['sl_weight'],
            'is_show'=>$arr['is_show'],
            'sl_time'=>time()
        ];
//        var_dump($data);die;
        $res=Slides::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 展示上轮播图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slides_list()
    {
        $list=Slides::paginate(3);
//        dd($list);
        return view('admin/slides_list',['list'=>$list]);
    }

    /**
     * 删除上轮播图
     * @return int
     */
    public function slides_del()
    {
        $sl_id=$_REQUEST['sl_id'];
        $res=Slides::where(['sl_id'=>$sl_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 友情链接视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function friend()
    {
        return view('admin/friend');
    }

    /**
     * 友情链接添加
     */
    public function friend_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'f_name'=>$arr['f_name'],
            'f_url'=>$arr['f_url'],
            'f_weight'=>$arr['f_weight'],
            'is_show'=>$arr['is_show'],
            'f_time'=>time()
        ];
//        var_dump($data);die;
        $res=Friend::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * 友情链接展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function friend_list()
    {
        $list=Friend::paginate(3);
        return view('admin/friend_list',['list'=>$list]);
    }

    /**
     * 友情链接删除
     * @return int
     */
    public function friend_del()
    {
        $f_id=$_REQUEST['f_id'];
        $res=Friend::where(['f_id'=>$f_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * 角色视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role()
    {
        return view('admin/role');
    }

    /**
     * 角色添加
     */
    public function role_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'role_name'=>$arr['role_name'],
            'role_time'=>time(),
        ];
//        var_dump($data);die;
        $res=Role::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 角色展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role_list()
    {
        $list=Role::paginate(3);
        return view('admin/role_list',['list'=>$list]);
    }

    /**
     * 角色删除
     * @return int
     */
    public function role_del()
    {
        $role_id=$_REQUEST['role_id'];
        $res=Role::where(['role_id'=>$role_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    /**
     * 权限视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function right()
    {
        return view('admin/right');
    }

    /**
     * 权限添加
     */
    public function right_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'right_url'=>$arr['right_url'],
            'right_time'=>time(),
        ];
//        var_dump($data);die;
        $res=Right::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 权限展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function right_list()
    {
        $list=Right::paginate(3);
        return view('admin/right_list',['list'=>$list]);
    }
    /**
     * 权限删除
     * @return int
     */
    public function right_del()
    {
        $right_id=$_REQUEST['right_id'];
        $res=Right::where(['right_id'=>$right_id])->delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     *用户权限视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user_role()
    {
        $user=User::all();
        $role=Role::all();
        return view('admin/user_role',['user'=>$user,'role'=>$role]);
    }

    /**
     * 用户权限添加
     */
    public function user_role_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'user_id'=>$arr['user_id'],
            'role_id'=>$arr['role_id']
        ];
//        var_dump($data);die;
        $res=User_Role::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * 角色权限视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function role_right()
    {
        $role=Role::all();
        $right=Right::all();
        return view('admin/role_right',['role'=>$role,'right'=>$right]);
    }

    /**
     * 角色权限添加数据
     */
    public function role_right_do()
    {
        $arr=$_REQUEST;
//        dd($arr);
        $data=[
            'role_id'=>$arr['role_id'],
            'right_id'=>$arr['right_id']
        ];
//        var_dump($data);die;
        $res=Role_Right::create($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * uploadify 上传图片
     * @param Request $request
     */
    public function upload(Request $request)
    {
        $requestobj=$request->file("Filedata");//资源对象
        $ext=$requestobj->getClientOriginalExtension();//扩展名
        $path=$requestobj->getRealPath();//源路径
        $filename=date("YmdHis",time()).'.'.$ext;//新名字
        Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath="/uploads/$filename";
        echo $newPath;
    }
}
