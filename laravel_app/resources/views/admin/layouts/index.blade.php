<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
<title>企业网站管理系统</title>
<link href="{{asset('admin/images/metinfo.css')}}" rel="stylesheet" />
	{{--//引用这个css样式就可以了--}}
<link href="{{asset('page2.css')}}" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" src="{{asset('admin/images/jQuery1.7.2.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/images/cookie.js')}}"></script>
<script type="text/javascript">

// function kzqie(my){
	// if(my.text()=='宽版'){
	// 	$('#metcmsbox').css('width','100%');
	// 	$.ajax({url : 'include/config.php?lang=cn&met_kzqie=1',type: "POST"});
	// 	my.attr('title','切换到窄版');
	// 	my.text('窄版');
	// }else{
	// 	$('#metcmsbox').css('width','1000px');
	// 	$.ajax({url : 'include/config.php?lang=cn&met_kzqie=0',type: "POST"});
	// 	my.attr('title','宽版');
	// 	my.text('宽版');
	// }
// }
</script>

<body id="indexid">
<div id="metcmsbox">
<div id="top"> 
    <div class="floatr">
	  <div class="top-r-box">
		<div class="top-right-boxr">
			<div class="top-r-t">
				@if(!empty(session('userinfo')))
				 你好：<a href="#" id="mydata" title="编辑 admin 的个人资料" class='tui' style="text-decoration:underline;">{{session('userinfo')}}</a><span>-</span>
				@else
				 <a  href="{{url('admin/register')}}" >注册</a><span>|</span><a href="{{url('admin/logins')}}" >登录</a>
				@endif
			</div>
	      <div class="langs">

        <div class="langtxt">
			<div class="langkkkbox">
				<div id="langcig">
					<span id="langcion" title="cn">简体中文</span>
				  <span class="langqie">语言设置</span>
				</div>
				<div class="langlist shadow" style="display:none;"></div>
			</div>
			<div class="webyy">网站语言：</div>
		</div>

		  </div>
		</div>
		<div class="nav">
          <ul id="topnav">

            <li id="metnav_1" class="list">
					<a href="javascript:;" id="nav_1" class="onnav" hidefocus="true">
					<span class="c1"></span>
					一级导航
					</a>
			</li>

            <li id="metnav_2" class="list">
					<a href="javascript:;" id="nav_2"  hidefocus="true">
					<span class="c2"></span>
					二级导航
					</a>
			</li>

            <li id="metnav_3" class="list">
					<a href="javascript:;" id="nav_3"  hidefocus="true">
					<span class="c3"></span>
					三级导航
					</a>
			</li>

            <li id="metnav_4" class="list">
					<a href="javascript:;" id="nav_4"  hidefocus="true">
					<span class="c4"></span>
					下轮播图表
					</a>
			</li>

            <li id="metnav_5" class="list">
					<a href="javascript:;" id="nav_5"  hidefocus="true">
					<span class="c5"></span>
					上轮播图
					</a>
			</li>

            <li id="metnav_6" class="list">
					<a href="javascript:;" id="nav_6"  hidefocus="true">
					<span class="c6"></span>
					友情链接
					</a>
			</li>

            <li id="metnav_7" class="list">
					<a href="javascript:;" id="nav_7"  hidefocus="true">
					<span class="c7"></span>
					RBAC
					</a>
			</li>

          </ul>
		</div>
	  </div>
    </div>
    <div class="floatl">
	    <a href="/" hidefocus="true" id="met_logo"><img src="{{asset('admin/images/logoen.gif')}}" alt="MetInfo企业网站管理系统" title="MetInfo企业网站管理系统" /></a>
	</div>
</div>
<div id="content">
    <div class="floatl" id="metleft">
        <div class="fast">
	        <a  href="{{url('index/index')}}" id="qthome" title="网站首页">网站首页</a>
			<span></span>
			<a href="{{url('admin/index')}}" id="hthome" title="后台首页">后台首页</a>
		</div>
	    <div class="nav_list" id="leftnav">

<ul  id="ul_1">
	{{----}}
<li ><a href="{{url('admin/navigation_bar_one')}}" target='main' id='nav_1_8' class="on" title="系统信息" hidefocus="true" >一级导航栏</a></li>
<li ><a href="{{url('admin/navigation_bar_one_list')}}" >一级导航展示</a></li>
{{--<li ><a href="1.html" target='main' id='nav_1_10' title="语言设置" hidefocus="true">语言设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_1_11' title="图片设置" hidefocus="true">图片设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_1_12' title="安全与效率" hidefocus="true">安全与效率</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_1_13' title="数据与备份" hidefocus="true">数据与备份</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_1_14' title="上传文件管理" hidefocus="true">上传文件管理</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_1_15' title="商业授权" hidefocus="true">商业授权</a></li>--}}
{{--<li ><a href="1.html" target="_blank" title="使用手册" hidefocus="true">使用手册</a></li>--}}
{{--<li ><a href="1.html/" target="_blank" title="技术支持" hidefocus="true">技术支持</a></li>--}}
</ul>
<ul style="display:none;" id="ul_2">
<li ><a href="{{url('admin/navigation_bar_two')}}" target='main' id='nav_2_18'  hidefocus="true">二级导航</a></li>
 <li ><a href="{{url('admin/navigation_bar_two_list')}}" >二级导航展示</a></li>
 {{--<li ><a href="1.html" target='main' id='nav_2_20' title="列表页设置" hidefocus="true">列表页设置</a></li>--}}
 {{--<li ><a href="1.html" target='main' id='nav_2_21' title="内容页设置" hidefocus="true">内容页设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_2_22' title="Flash设置" hidefocus="true">Flash设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_2_23' title="在线交流设置" hidefocus="true">在线交流设置</a></li>--}}
{{--<li ><a href="1.html" target='_blank' id='nav_2_24' title="模板配置说明" hidefocus="true">模板配置说明</a></li>--}}
</ul>

<ul style="display:none;" id="ul_3">
<li ><a href="{{url('admin/navigation_bar_three')}}" target='main' id='nav_3_25'  hidefocus="true">三级导航</a></li>
<li ><a href="{{url('admin/navigation_bar_three_list')}}" target='main' id='nav_3_25'  hidefocus="true">三级导航展示</a></li>
{{--<li ><a href="1.html" target='main' id='nav_3_26' title="产品模块字段" hidefocus="true">产品模块字段</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_3_27' title="下载模块字段" hidefocus="true">下载模块字段</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_3_28' title="图片模块字段" hidefocus="true">图片模块字段</a></li>--}}
</ul>

<ul style="display:none;" id="ul_4">
<li ><a href="{{url('admin/slide')}}" target='main' id='nav_4_29'  hidefocus="true">下轮播图</a></li>
<li ><a href="{{url('admin/slide_list')}}" target='main' id='nav_4_30' title="底部信息" hidefocus="true">下轮播图展示</a></li>
{{--<li ><a href="1.html" target='main' id='nav_4_31' title="其他内容" hidefocus="true">其他内容</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_4_32' title="批量操作" hidefocus="true">批量操作</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_4_33' title="内容回收站" hidefocus="true">内容回收站</a></li>--}}
</ul>

<ul style="display:none;" id="ul_5">
<li ><a href="{{url('admin/slides')}}" target='main' id='nav_5_34' hidefocus="true">上轮播图</a></li>
<li ><a href="{{url('admin/slides_list')}}" target='main' id='nav_5_35'  hidefocus="true">上轮播图展示</a></li>
{{--<li ><a href="1.html" target='main' id='nav_5_36' title="网站地图设置" hidefocus="true">网站地图设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_5_37' title="SEO参数设置" hidefocus="true">SEO参数设置</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_5_38' title="热门标签" hidefocus="true">热门标签</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_5_39' title="友情链接" hidefocus="true">友情链接</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_5_55' title="站内广告" hidefocus="true">站内广告</a></li>--}}
</ul>

<ul style="display:none;" id="ul_6">
<li ><a href="{{url('admin/friend')}}" target='main' id='nav_6_44'  hidefocus="true">友情链接</a></li>
<li ><a href="{{url('admin/friend_list')}}" target='main' id='nav_6_41' hidefocus="true">友情链接展示</a></li>
{{--<li ><a href="1.html" target='main' id='nav_6_40' title="短信功能" hidefocus="true">短信功能</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_6_42' title="网站保姆" hidefocus="true">网站保姆</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_6_43' title="网站体检" hidefocus="true">网站体检</a></li>--}}
{{--<li ><a href="1.html" target='main' id='nav_6_54' title="在线订购" hidefocus="true">在线订购</a></li>--}}
</ul>
<ul style="display:none;" id="ul_7">
<li ><a href="{{url('admin/role')}}" target='main' id='nav_7_45'  hidefocus="true">角色添加</a></li>
<li ><a href="{{url('admin/role_list')}}" target='main' id='nav_7_49'  hidefocus="true">角色展示</a></li>
<li ><a href="{{url('admin/right')}}" target='main' id='nav_7_46'  hidefocus="true">权限添加</a></li>
<li ><a href="{{url('admin/right_list')}}" target='main' id='nav_7_47'  hidefocus="true">权限展示</a></li>
<li ><a href="{{url('admin/user_role')}}" target='main' id='nav_7_48'  hidefocus="true">用户角色</a></li>
<li ><a href="{{url('admin/role_right')}}" target='main' id='nav_7_4'  hidefocus="true">角色权限</a></li>
</ul>
</div>
<div class="claer"></div>
<div class="left_footer">感谢使用 <a href="" target="_blank">MetInfo</a><span class="none">Powered by <b><a href=http://www.metinfo.cn target=_blank>MetInfo 5.1.7</a></b> &copy;2008-2013 &nbsp;<a href=http://www.metinfo.cn target=_blank>MetInfo Inc.</a></span></div>
		
	</div>
    <div class="floatr" id="metright">
      <div class="iframe">
		  @yield('content')
	    {{--<div class="min"><iframe frameborder="0" id="main" name="main" src="1.html" scrolling="no"></iframe></div>--}}
		</div>
    </div>
	<div class="clear"></div>
	</div>
</div>
<script src="{{asset('admin/images/metinfo.js')}}" type="text/javascript"></script>

</body>
</html>

