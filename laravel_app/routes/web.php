<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::any('exam/register','exam\RegisterController@register');
Route::any('exam/key','exam\RegisterController@exam_key');
Route::any('exam/com','exam\RegisterController@exam_com');
Route::get('/', function () {
    return view('welcome');
});
Route::get('music/app_mysqli','Music\MusicController@app_mysqli');
Route::get('music/token','Music\MusicController@token');
//前台
Route::prefix('index')->group(function () {
    //首页
   Route::any('index','index\IndexController@index');
   //关于我们
   Route::any('about_us','index\IndexController@about_us');
   //新闻资讯
   Route::any('news','index\IndexController@news');
   //展示
   Route::any('shownews','index\IndexController@shownews');
});
//后台
Route::prefix('admin')->middleware('checklogin')->group(function () {
    //首页
    Route::any('index','admin\AdminController@index');
    //一级导航栏
    Route::get('navigation_bar_one','admin\AdminController@navigation_bar_one');
    Route::post('navigation_bar_one_do','admin\AdminController@navigation_bar_one_do');//添加数据
    Route::get('navigation_bar_one_list','admin\AdminController@navigation_bar_one_list');//展示数据
    Route::get('navigation_bar_one_del','admin\AdminController@navigation_bar_one_del');//删除数据
    //二级导航栏
    Route::get('navigation_bar_two','admin\AdminController@navigation_bar_two');
    Route::post('navigation_bar_two_do','admin\AdminController@navigation_bar_two_do');//添加数据
    Route::get('navigation_bar_two_list','admin\AdminController@navigation_bar_two_list');//展示数据
    Route::get('navigation_bar_two_del','admin\AdminController@navigation_bar_two_del');//删除数据
    //三级导航栏
    Route::get('navigation_bar_three','admin\AdminController@navigation_bar_three');
    Route::post('navigation_bar_three_do','admin\AdminController@navigation_bar_three_do');//添加数据
    Route::get('navigation_bar_three_list','admin\AdminController@navigation_bar_three_list');//展示数据
    Route::get('navigation_bar_three_del','admin\AdminController@navigation_bar_three_del');//删除数据
    //下轮播图
    Route::get('slide','admin\AdminController@slide');
    Route::post('slide_do','admin\AdminController@slide_do');//添加数据
    Route::get('slide_list','admin\AdminController@slide_list');//展示数据
    Route::get('slide_del','admin\AdminController@slide_del');//删除数据
    //上轮播图
    Route::get('slides','admin\AdminController@slides');
    Route::post('slides_do','admin\AdminController@slides_do');//添加数据
    Route::get('slides_list','admin\AdminController@slides_list');//展示数据
    Route::get('slides_del','admin\AdminController@slides_del');//删除数据
    //友情链接
    Route::get('friend','admin\AdminController@friend');
    Route::post('friend_do','admin\AdminController@friend_do');//添加数据
    Route::get('friend_list','admin\AdminController@friend_list');//展示数据
    Route::get('friend_del','admin\AdminController@friend_del');//删除数据
    //RBAC
    Route::get('role','admin\AdminController@role');//角色视图
    Route::post('role_do','admin\AdminController@role_do');//角色添加数据
    Route::get('role_list','admin\AdminController@role_list');//角色展示
    Route::get('role_del','admin\AdminController@role_del');//角色删除
    Route::get('right','admin\AdminController@right');//权限视图
    Route::post('right_do','admin\AdminController@right_do');//权限视图添加数据
    Route::get('right_list','admin\AdminController@right_list');//权限展示
    Route::get('right_del','admin\AdminController@right_del');//权限删除
    Route::get('user_role','admin\AdminController@user_role');//用户角色视图
    Route::post('user_role_do','admin\AdminController@user_role_do');//用户角色添加数据
    Route::get('role_right','admin\AdminController@role_right');//角色权限视图
    Route::post('role_right_do','admin\AdminController@role_right_do');//用户角色添加数据
    //uploadify 上传图片
    Route::any('upload','admin\AdminController@upload');
});
Route::prefix('admin')->group(function () {
//登录
    Route::get('logins', 'login\LoginController@login');
    Route::post('logins_do', 'login\LoginController@login_do');//查询
//注册
    Route::get('register', 'login\LoginController@register');
    Route::post('register_do', 'login\LoginController@register_do');//添加
    Route::post('email', 'login\LoginController@email');//注册发送邮箱
});