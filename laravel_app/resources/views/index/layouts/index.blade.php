<?php
ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<title>网站关键词-网站名称</title>
<meta name="description" content="网站描述，一般显示在搜索引擎搜索结果中的描述文字，用于介绍网站，吸引浏览者点击。" />
<meta name="keywords" content="网站关键词" />
<meta name="generator" content="MetInfo 5.1.7" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="{{asset('images/metinfo.css')}}" />
<script src="{{asset('images/jQuery1.7.2.js')}}" type="text/javascript"></script>
<script src="{{asset('images/ch.js')}}" type="text/javascript"></script>

</head>
<body>
<header>
<div class="inner">
<div class="top-logo">
<a href="{{asset('index.html')}}" title="网站名称" id="web_logo"><img src="{{asset('images/logo.png')}}" alt="网站名称" title="网站名称" style="margin:20px 0px 0px 0px;" /></a>

<ul class="top-nav list-none">
<li class="t">
{{--<a href='#' onclick='SetHome(this,window.location,"非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='设为首页'  >设为首页</a><span>|</span>--}}
{{--<a href='#' onclick='addFavorite("非IE浏览器不支持此功能，请手动设置！");' style='cursor:pointer;' title='收藏本站'  >收藏本站</a><span>|</span><a class="fontswitch" id="StranLink" href="javascript:StranBody()">繁体中文</a><span>|</span>--}}
{{--<a href='#' title='WAP'>WAP</a><span>|</span>--}}
{{--<a href='#' title='English'  >English</a><span>|</span>--}}
{{--<a href='#' title='我的订单' class='shopweba'>我的订单</a></li><li class="b">--}}
{{--<a href="{{asset('admin/index.html')}}"><strong><span style="color:#ffff00;"><span style="font-size: 14px;">后台演示请点击这里进入</span></span></strong></a></li>--}}
</ul>
</div>
	<nav>
		<ul class="list-none">

			{{--<li id="nav_10001" style='width:121px;' class='navdown'><a href='{{asset('index.html')}}' class='nav'><span>网站首页</span></a></li>--}}
			{{--<li class="line"></li>--}}
			@foreach ($navigation as $v)		{{--一级导航栏 开始--}}
			<li id='nav_1' style='width:121px;' @if($url=="na_id=".$v['na_id']) class='navdown' @elseif($url=="") @if($v['na_id']==1) class="navdown" @endif @else class='hover-none nav' @endif ><a href='{{$v['na_url']}}?na_id={{$v['na_id']}}' 0 class='hover-none nav'><span>{{$v['na_name']}}</span></a></li>
			<li class="line"></li>
			@endforeach							{{--一级导航栏 结束--}}
			{{--<li id='nav_2' style='width:121px;' ><a href='{{asset('news.html')}}'  class='hover-none nav'><span>新闻资讯</span></a></li>--}}
			{{--<li class="line"></li>--}}
			{{--<li id='nav_3' style='width:121px;' ><a href='{{asset('index.html')}}' class='hover-none nav'><span>产品展示</span></a></li>--}}
			{{--<li class="line"></li>--}}
			{{--<li id='nav_32' style='width:121px;' ><a href='{{asset('index.html')}}'   class='hover-none nav'><span>下载中心</span></a></li>--}}
			{{--<li class="line"></li>--}}
			{{--<li id='nav_33' style='width:121px;' ><a href='{{asset('index.html')}}'   class='hover-none nav'><span>客户案例</span></a></li>--}}
			{{--<li class="line"></li>--}}
			{{--<li id='nav_36' style='width:120px;' ><a href='{{asset('index.html')}}'   class='hover-none nav'><span>招贤纳士</span></a></li>--}}
			{{--<li class="line"></li>--}}
			{{--<li id='nav_22' style='width:120px;' ><a href='{{asset('index.html')}}'  class='hover-none nav'><span>联系我们</span></a></li>--}}
		</ul>
	</nav>
</div>
</header>
@yield('content')
<footer data-module="10001" data-classnow="10001">
	<div class="inner">
		<div class="foot-text">
			<div class="foot-nav">
				@foreach($friend as $v)
				<a href='{{$v['f_url']}}'  title='公司动态'>{{$v['f_name']}}</a><span>|</span>
				@endforeach
				{{--<a href='message/'  title='在线留言'>在线留言</a><span>|</span><a href='feedback/'  title='在线反馈'>在线反馈</a><span>|</span><a href='link/'  title='友情链接'>友情链接</a><span>|</span><a href='member/'  title='会员中心'>会员中心</a><span>|</span><a href='search/'  title='站内搜索'>站内搜索</a><span>|</span><a href='sitemap/'  title='网站地图'>网站地图</a><span>|</span><a href='http://gc04430.d215.51kweb.com/admin/'  title='网站管理'>网站管理</a></div>--}}
			<p>我的网站 版权所有 2008-2012 湘ICP备88888</p>
<p>电话：0731-12345678 12345678  QQ:88888888 999999  Email:metinfo@metinfo.cn</p>
		</div>
	</div>
</footer>
<script src="{{asset('images/fun.inc.js')}}" type="text/javascript"></script>
{{--<div style="text-align:center;">--}}
{{--<p>来源：More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>--}}
{{--</div>--}}
</body>
</html>
<?php
	$contents=ob_get_contents();
	file_put_contents($filename,$contents);
?>