@extends('index/layouts.index')
@section('content')
	<div class="inner met_flash">
<link href='{{asset('images/css.css')}}' rel='stylesheet' type='text/css' />
<script src='{{asset('images/jquery.bxSlider.min.js')}}'></script>
<div class='flash flash6' style='width:980px; height:245px;'>
<ul id='slider6' class='list-none'>
	@foreach($up_slides as $v)			{{--上轮播图 开始--}}
<li><a href="javascript:void(0);"  ><img src='{{asset($v['sl_img'])}}'width='980' height='245'></a></li>
{{--<li><a href='#' target='_blank' ><img src='{{asset('images/1342430031.jpg')}}'  width='980' height='245'></a></li>--}}
{{--<li><a href='#' target='_blank' ><img src='{{asset('images/1342430031.jpg')}}'  width='980' height='245'></a></li>--}}
{{--<li><a href='#' target='_blank' ><img src='{{asset('images/1342430031.jpg')}}'  width='980' height='245'></a></li>--}}
	@endforeach							{{--上轮播图 结束--}}
</ul>
</div>
<script type='text/javascript'>$(document).ready(function(){ $('#slider6').bxSlider({ mode:'vertical',autoHover:true,auto:true,pager: true,pause: 5000,controls:false});});</script></div>


<div class="index inner">
		@foreach($navigationtwo as $v)		{{--二级导航 开始--}}
		@if($v['nt_id'] == 1)         {{--na_id 为1的 数据在这里的开始--}}
	<div class="aboutus style-1">
		<h3 class="title">
			{{----}}
			<span class='myCorner' data-corner='top 5px'>{{$v['nt_name']}}</span>
			<a href="javascript:void(0);" class="more" title="链接关键词">更多>></a>
		</h3>

		<div class="active editor clear contour-1"><div>
				{{----}}
	<img alt="" src="{{$navigationthree_1['0']['nth_img']}}" style="margin: 8px; width: 196px; float: left; height: 209px; " /></div>
	{{--公司简介--}}
<div style="padding-top:10px;">
<span style="font-size:14px;"><strong>{{$navigationthree_1['0']['nth_name']}}</strong></span></div>
<div>{{$navigationthree_1['0']['nth_content']}}</div>
<div>&nbsp;</div>
<div>
	<span style="font-size:14px;"><strong>{{$navigationthree_1['1']['nth_name']}}</strong></span></div><div>
				<span style="font-size:12px;">{{$navigationthree_1['1']['nth_content']}}</span></div>
			<div class="clear">
</div></div></div>
		@endif							{{--na_id 为1的 数据在这里的结束--}}
		@if($v['nt_id'] == 2)			{{--na_id 为2的 数据在这里的开始--}}
	<div class="case style-2">
		<h3 class='title myCorner' data-corner='top 5px'><a href="" title="链接关键词" class="more">更多>></a>{{$v['nt_name']}}</h3>
	  <div class="active dl-jqrun contour-1">
		@foreach($navigationthree_2 as $va)
			{{--案例--}}
<dl class="ind">
<dt><a href="javascript:void(0);" target='_self'><img src="{{asset($va['nth_img'])}}" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>
<dd>
<h4><a href="{{$va['nth_url']}}" target='_self' title="示例案例六">{{$va['nth_name']}}</a></h4>
<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">{{$va['nth_content']}}</p>
</dd>
</dl>
		@endforeach
{{--<dl class="ind">--}}
{{--<dt><a href="{{$navigationthree['3']['nth_url']}}" target='_self'><img src="{{asset($navigationthree['3']['nth_img'])}}" alt="图片关键词" title="图片关键词" style="width:116px; height:80px;" /></a></dt>--}}
{{--<dd>--}}
{{--<h4><a href="{{$navigationthree['3']['nth_url']}}" target='_self' title="示例案例五">{{$navigationthree['3']['nth_name']}}</a></h4>--}}
{{--<p class="desc" title="相关描述文字，相关描述文字，相关描述文字，相关描述文字，相关描述文字。">{{$navigationthree['3']['nth_content']}}</p>--}}
{{--</dd>--}}
{{--</dl>--}}

<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
		@endif						{{--na_id 为2的 数据在这里的结束--}}
		@if($v['nt_id'] == 3)		{{--na_id 为3的 数据在这里的开始--}}
	<div class="index-news style-1">
		<h3 class="title">
			<span class='myCorner' data-corner='top 5px'>{{$v['nt_name']}}</span>
			<a href="javascript:void(0);" class="more" title="链接关键词">更多>></a>
		</h3>
		<div class="active clear listel contour-2"><ol class='list-none metlist'>
				@foreach($navigationthree_3 as $va)
					{{--公司新闻--}}
<li class='list top'><span class='time'>{{date("Y-m-d",$va['nth_time'])}}</span><a href="{{$va['nth_url']}}" >{{$va['nth_name']}}</a></li>
				@endforeach
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >新手使用MetInfo建站步骤</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >企业网站应该多长时间备份一次？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >如何充分发挥MetInfo的SEO功能</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >什么是伪静态？伪静态有何作用?</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >企业用网站进行网络宣传的优势</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >MetInfo企业建站系统有何优势？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >商业版和免费版在系统功能上有区别吗？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >为什么企业要建多国语言网站？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >如何获取MetInfo网站管理系统商业授权？</a></li>--}}
</ol></div>
	</div>
		@endif					{{--na_id 为3的 数据在这里的结束--}}
		@if($v['nt_id'] == 4)	{{--na_id 为4的 数据在这里的开始--}}
<div class="index-news style-1">
<h3 class="title"><span class='myCorner' data-corner='top 5px'>{{$v['nt_name']}}</span><a href="" class="more" title="链接关键词">更多>></a></h3>
<div class="active clear listel contour-2"><ol class='list-none metlist'>
		@foreach($navigationthree_4 as $va)
			{{--行业资讯--}}
<li class='list top'><span class='time'>{{date("Y-m-d",$va['nth_time'])}}</span><a href='{{$va['nth_url']}}' >{{$va['nth_name']}}</a></li>
		@endforeach
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >新手使用MetInfo建站步骤</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >企业网站应该多长时间备份一次？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >如何充分发挥MetInfo的SEO功能</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >什么是伪静态？伪静态有何作用?</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >企业用网站进行网络宣传的优势</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#'>MetInfo企业建站系统有何优势？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#'>商业版和免费版在系统功能上有区别吗？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >为什么企业要建多国语言网站？</a></li>--}}
{{--<li class='list '><span class='time'>2012-07-16</span><a href='#'>如何获取MetInfo网站管理系统商业授权？</a></li>--}}
</ol></div>
	</div>
		@endif					{{--na_id 为4的 数据在这里的结束--}}
		@if($v['nt_id'] == 5)	{{--na_id 为5的 数据在这里的开始--}}
	<div class="index-conts style-2">
		<h3 class='title myCorner' data-corner='top 5px'>

			<a href="" title="链接关键词" class="more">更多>></a>{{$v['nt_name']}}
		</h3>
<div class="active clear listel contour-2"><ol class='list-none metlist'>
		@foreach($navigationthree_5 as $va)
			{{--招聘--}}
 <li class='list top'><span class='time'>{{date("Y-m-d",$va['nth_time'])}}</span><a href='{{$va['nth_url']}}' >{{$va['nth_name']}}</a></li>
		@endforeach
 {{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >网络销售</a></li>--}}
 {{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >网页UI设计师</a></li>--}}
 {{--<li class='list '><span class='time'>2012-07-16</span><a href='#' >Web前端开发人员</a></li>--}}
 {{--<li class='list '><span class='time'>2012-07-16</span><a href='#'>电子商务专员</a></li>--}}
 </ol></div>
</div>
		@endif				{{--na_id 为5的 数据在这里的结束--}}
		@endforeach					{{--二级导航 开始--}}
	{{--@endforeach				--}}{{--一级导航 结束--}}
	<div class="clear p-line"></div>
    
	<div class="index-product style-2">
		<h3 class='title myCorner' data-corner='top 5px'>
			<span></span>
 <div class="flip"><p id="trigger"></p> <a class="prev" id="car_prev" href="javascript:void(0);"></a> <a class="next" id="car_next" href="javascript:void(0);"></a></div>
			<a href=""  class="more">更多>></a>
		</h3>
		<div class="active clear">
			<div class="profld" id="indexcar" data-listnum="5">
			<ol class='list-none metlist'>
				@foreach($next_slide as $v) 	{{--下轮播图 开始--}}
 <li class='list'><a href="javascript:void(0);"  class='img'><img src='{{asset($v['sls_img'])}}'  width='160' height='130' /></a> </li>
 				@endforeach						{{--下轮播图 结束--}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342404422.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' >示例产品七</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#' class='img'><img src='{{asset('images/1342404422.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品六' target='_self'>示例产品六</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342404144.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品三' target='_self'>示例产品三</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342360923.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品五' target='_self'>示例产品五</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342405015.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品四' target='_self'>示例产品四</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342404144.jpg')}}'  width='160' height='130' /></a><h3 style='width:160px;'><a href='#' title='示例产品二' target='_self'>示例产品二</a></h3></li>--}}
 {{----}}
 {{--<li class='list'><a href='#'  class='img'><img src='{{asset('images/1342360923.jpg')}}' alt='示例产品一' title='示例产品一' width='160' height='130' /></a><h3 style='width:160px;'><a href='#'>示例产品一</a></h3></li>--}}
			</ol>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div class="index-links">
		<h3 class="title">

			<a href="" title="链接关键词" class="more">更多>></a>
		</h3>
		<div class="active clear">
			<div class="img"><ul class='list-none'>
				</ul>
			</div>
			<div class="txt"><ul class='list-none'>
					<li><a href="javascript:void(0);" target='_self' title='企业网站管理系统'>MetInfo</a></li>
					<li><a href="javascript:void(0);" target='_self' title='企业网站管理系统'>米拓信息</a></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
{{--<footer data-module="10001" data-classnow="10001">--}}
	{{--<div class="inner">--}}
		{{--<div class="foot-nav"><a href='{{asset('news/news.php?lang=cn&class2=4')}}'  title='公司动态'>公司动态</a><span>|</span><a href='message/'  title='在线留言'>在线留言</a><span>|</span><a href='feedback/'  title='在线反馈'>在线反馈</a><span>|</span><a href='link/'  title='友情链接'>友情链接</a><span>|</span><a href='member/'  title='会员中心'>会员中心</a><span>|</span><a href='search/'  title='站内搜索'>站内搜索</a><span>|</span><a href='sitemap/'  title='网站地图'>网站地图</a><span>|</span><a href='http://gc04430.d215.51kweb.com/admin/'  title='网站管理'>网站管理</a></div>--}}
{{--</footer>--}}
@endsection