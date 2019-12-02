<?php

namespace App\Http\Controllers\index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Navigation;//一级导航model
use App\Model\NavigationTwo;//二级导航model
use App\Model\NavigationThree;//三级导航model
use App\Model\Slides;//上轮播图model
use App\Model\Slide;//下轮播图model
use App\Model\Friend;//友情链接model
use Illuminate\Support\Facades\Redis;//redis
class IndexController extends Controller
{
    /**
     * 加载视图 传数据
     * IndexController constructor.
     *
     */
    public function __construct()
    {
        if(!is_dir("./ob")){
            mkdir("./ob", 0, 777);
        }
        //一级导航
        view()->composer(['index/layouts/index'], function ($view) {
            $navigation=Navigation::where('na_home','1')->orderBy('na_weight','desc')->get();//一级导航数据
            $view->with('navigation',$navigation);
        }
        );
        //地址
        view()->composer(['index/layouts/index'], function ($view) {
            $url=$_SERVER['QUERY_STRING'];
            $view->with('url',$url);
        }
        );
        //友情链接
        view()->composer(['index/layouts/index'], function ($view) {
            $friend=Friend::where('is_show','1')->orderBy('f_weight','desc')->get();
            $view->with('friend',$friend);
        }
        );
        //新闻资讯
        view()->composer(['index/about_us','index/news','index/shownews'], function ($view) {
            $navigationthree_1=NavigationThree::where('nt_id',6)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//第一个的数据
            $view->with('navigationthree_1',$navigationthree_1);
        }
        );
        //新闻资讯
        view()->composer(['index/about_us','index/news','index/shownews'], function ($view) {
            $news=NavigationTwo::where('nt_id',6)->where('is_show','1')->orderBy('nt_weight','desc')->first()->toArray();//第一个的数据
            $view->with('news',$news);
        }
        );
        //联系方式
        view()->composer(['index/about_us','index/news','index/shownews'], function ($view) {
            $navigationthree_2=NavigationThree::where('nt_id',7)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//第二个的数据
            $view->with('navigationthree_2',$navigationthree_2);
        }
        );
        //新闻资讯
        view()->composer(['index/about_us','index/news','index/shownews'], function ($view) {
            $contact=NavigationTwo::where('nt_id',7)->where('is_show','1')->orderBy('nt_weight','desc')->first()->toArray();//第一个的数据
            $view->with('contact',$contact);
        }
        );
    }

    /**
     * 首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filename="ob/index.html";
        $key="index";
        if(!empty(Redis::get($key))){
            echo Redis::get($key);die;
        }else {
            if (file_exists($filename)) {
                echo file_get_contents($filename);
                Redis::setex($key,600,file_get_contents($filename));
                die;
            }
        }
        $arr=$request->all();
        $navigation_id=Navigation::where('na_home','1')->orderBy('na_weight','desc')->first();//获取到首个数据的id
        $na_id=!empty($arr) ? $arr['na_id'] : $navigation_id['na_id']; //判断是否没点
        $navigationtwo=NavigationTwo::where('is_show','1')->where('na_id',$na_id)->orderBy('nt_weight','desc')->get();//获取二级导航
        $navigationthree_1=NavigationThree::where('nt_id',1)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//公司简介
        $navigationthree_2=NavigationThree::where('nt_id',2)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//案例
        $navigationthree_3=NavigationThree::where('nt_id',3)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//公司新闻
//        dd($navigationthree_3);
        $navigationthree_4=NavigationThree::where('nt_id',4)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//行业资讯
        $navigationthree_5=NavigationThree::where('nt_id',5)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();////招聘
//        dd($navigationthree_4);
        $up_slides=Slides::where('is_show',1)->orderBy('sl_weight','desc')->get();//上轮播图
        $next_slide=Slide::where('is_show',1)->orderBy('sls_weight','desc')->get();//下轮播图
        return view('index/index',compact('up_slides','next_slide','navigationtwo','navigationthree_1','navigationthree_2','navigationthree_3','navigationthree_4','navigationthree_5','filename'));
    }

    /**
     * 关于我们..................
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about_us(Request $request)
    {
        $arr=$request->all();
//        dd($arr);
        $filename="ob/about_us_".$arr['na_id'].".html";
        $key="about_us_".$arr['na_id'];
        if(!empty(Redis::get($key))){
            echo Redis::get($key);die;
        }else {
            if (file_exists($filename)) {
                echo file_get_contents($filename);
                Redis::setex($key,600,file_get_contents($filename));
                die;
            }
        }
//        dd($arr);
        $navigationtwo=NavigationTwo::where('is_show','1')->where('na_id',$arr['na_id'])->orderBy('nt_weight','desc')->get()->toArray();//获取二级导航
        $navigationtwo1=NavigationTwo::where('is_show','1')->where('na_id',$arr['na_id'])->orderBy('nt_weight','desc')->first()->toArray();//获取二级导航
//        dd($navigationtwo['nt_id']);
        $nt_id=empty($navigationtwo['2']['nt_id'])?$navigationtwo1['nt_id']:$navigationtwo['2']['nt_id'];
        $navigationthree_3=NavigationThree::where('nt_id',$nt_id)->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();//第三个的数据
//       dd($nt_id);
//        dd($navigationthree_3);
        return view('index/about_us',compact('navigationtwo','navigationthree_3','navigationtwo1','filename'));
    }

    /**
     * 新闻资讯...........
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news(Request $request)
    {
        $arr=$request->all();
        $filename="ob/news_".$arr['na_id'].".html";
        $key="new_".$arr['na_id'];
//        dd($filename);
        if(!empty(Redis::get($key))){
            echo Redis::get($key);die;
        }else {
            if (file_exists($filename)) {
                echo file_get_contents($filename);
                Redis::setex($key,600,file_get_contents($filename));
                die;
            }
        }
        $navigationtwo=NavigationTwo::where('is_show','1')->where('na_id',$arr['na_id'])->orderBy('nt_weight','desc')->first()->toArray();//获取二级导航
        $navigationthree_3=NavigationThree::where('nt_id',$navigationtwo['nt_id'])->where('is_show','1')->orderBy('nth_weight','desc')->get()->toArray();
//        dd($navigationtwo['nt_id']);
        return view('index/news',compact('navigationtwo','navigationthree_3','filename'));
    }

    /**
     * 内容
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shownews(Request $request)
    {
        $nth_id=$request->all()['nth_id'];
        $key="nth_".$nth_id;
        $filename="ob/shownews_".$nth_id.".html";
        if(!empty(Redis::get($key))){
            echo Redis::get($key);die;
        }else{
            if(file_exists($filename)){
                echo file_get_contents($filename);
                Redis::setex($key,600,file_get_contents($filename));
                die;
            }
        }
        $navigationthree_3=NavigationThree::where('nth_id',$nth_id)->where('is_show','1')->orderBy('nth_weight','desc')->first()->toArray();
        return view('index/shownews',['navigationthree_3'=>$navigationthree_3,'filename'=>$filename]);
    }
}
