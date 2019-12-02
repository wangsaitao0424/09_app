@extends('index/layouts.index')
@section('content')
    <div class="inner met_flash"><div class="flash">
            <a href='' target='_self' title='企业网站管理系统'><img src='{{asset('images/1342430358.jpg')}}' width='980' alt='企业网站管理系统' height='90'></a>
        </div></div>


    <div class="sidebar inner">
        <div class="sb_nav">
            <h3 class='title myCorner' data-corner='top 5px'>{{$news['nt_name']}}</h3>
            {{--新闻资讯--}}
            <div class="active" id="sidebar" data-csnow="2" data-class3="0" data-jsok="2">
                @foreach($navigationthree_1 as $v)
                    <dl class="list-none navnow"><dt id='part2_4'><a href='{{$v['nth_url']}}'  title='公司动态' class="zm"><span>{{$v['nth_name']}}</span></a></dt></dl>
                @endforeach
                {{--<dl class="list-none navnow"><dt id='part2_5'><a href='#'  title='业界资讯' class="zm"><span>业界资讯</span></a></dt></dl>--}}
                <div class="clear"></div></div>

            <h3 class='title line myCorner' data-corner='top 5px'>{{$contact['nt_name']}}</h3>
            {{--联系方式--}}
            <div class="active editor"><div>
                    {{$navigationthree_2['0']['nth_name']}}<strong>{{$navigationthree_2['0']['nth_content']}}</strong>{{$navigationthree_2['1']['nth_name']}}</div>
                <div>
                    {{$navigationthree_2['1']['nth_content']}}</div>
                <div>
                    {{$navigationthree_2['2']['nth_name']}}</div>
                <div>
                    {{$navigationthree_2['2']['nth_content']}}</div>
                <div>
                    {{$navigationthree_2['3']['nth_name']}}</div>
                <div>
                    {{$navigationthree_2['3']['nth_content']}}</div>
                <div class="clear"></div></div>
        </div>
    <div class="sb_box">
        <h3 class="title">
            <div class="position">
                {{--当前位置：<a href="index.html" title="网站首页">网站首页</a> &gt; <a href="news.html">新闻资讯</a>--}}
            </div>
            <span>{{$navigationtwo['nt_name']}}</span>
        </h3>
        <div class="clear"></div>

        <div class="active" id="newslist">
            <ul class='list-none metlist'>
                @foreach($navigationthree_3 as $v)
                <li class='list top'><span>{{date("Y-m-d",$v['nth_time'])}}</span><a href='{{$v['nth_url']}}?nth_id={{$v['nth_id']}}' title='如何选择网站关键词?' target='_self'>{{$v['nth_name']}}</a><img class='listhot' src='{{asset('images/hot.gif')}}' alt='图片关键词' /></li>
                @endforeach
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='新手使用MetInfo建站步骤' target='_self'>新手使用MetInfo建站步骤</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='企业网站应该多长时间备份一次？' target='_self'>企业网站应该多长时间备份一次？</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='如何充分发挥MetInfo的SEO功能' target='_self'>如何充分发挥MetInfo的SEO功能</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='什么是伪静态？伪静态有何作用?' target='_self'>什么是伪静态？伪静态有何作用?</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='企业用网站进行网络宣传的优势' target='_self'>企业用网站进行网络宣传的优势</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='MetInfo企业建站系统有何优势？' target='_self'>MetInfo企业建站系统有何优势？</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='商业版和免费版在系统功能上有区别吗？' target='_self'>商业版和免费版在系统功能上有区别吗？</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='为什么企业要建多国语言网站？' target='_self'>为什么企业要建多国语言网站？</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li>--}}
                {{--<li class='list '><span>[2012-07-16]</span><a href='shownews.html' title='如何获取MetInfo网站管理系统商业授权？' target='_self'>如何获取MetInfo网站管理系统商业授权？</a><img class='listhot' src='images/hot.gif' alt='图片关键词' /></li></ul>--}}
            <div id="flip"><style>.digg4  { padding:3px; margin:3px; text-align:center; font-family:Tahoma, Arial, Helvetica, Sans-serif;  font-size: 12px;}.digg4  a,.digg4 span.miy{ border:1px solid #ddd; padding:2px 5px 2px 5px; margin:2px; color:#aaa; text-decoration:none;}.digg4  a:hover { border:1px solid #a0a0a0; }.digg4  a:hover { border:1px solid #a0a0a0; }.digg4  span.current {border:1px solid #e0e0e0; padding:2px 5px 2px 5px; margin:2px; color:#aaa; background-color:#f0f0f0; text-decoration:none;}.digg4  span.disabled { border:1px solid #f3f3f3; padding:2px 5px 2px 5px; margin:2px; color:#ccc;}.digg4 .disabledfy { font-family: Tahoma, Verdana;} </style><div class='digg4 metpager_8'><span class='disabled disabledfy'><b>«</b></span><span class='disabled disabledfy'>‹</span><span class='current'>1</span><span class='disabled disabledfy'>›</span><span class='disabled disabledfy'><b>»</b></span></div></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
@endsection