@extends('admin/layouts.index')
@section('content')
    <link rel="stylesheet" href="{{asset('/layui/css/layui.css')}}">
    <script src="{{asset('/layui/layui.js')}}"></script>
    {{--<script src="{{asset('/jquery.js')}}"></script>--}}
        <font size="5" color="#1e90ff">
            <marquee scrollamount="10">知我者，谓我心忧，不知我者，谓我何求</marquee>
            <marquee scrollamount="10" direction="right">无端坠入红尘梦，惹却三千烦恼丝</marquee>
        </font>
    <center>
    {{--<form action="{{url('admin/navigation_bar_one_list')}}" method="get">--}}
        {{--<div class="col-lg-6">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" name="na_name" id="title" placeholder="导航名称">--}}
                {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" id="search" type="button"> Search </button>--}}
                  {{--</span>--}}
            {{--</div><!-- /input-group -->--}}
        {{--</div><!-- /.col-lg-6 -->--}}
        {{--</div><!-- /.row -->--}}
    {{--</form>--}}
    </center>
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="200">
            <col width="150">
        </colgroup>
        <thead>
        <tr align="content">
            <td>ID</td>
            <td>一级导航名称</td>
            <td>导航栏地址</td>
            <td>导航栏权重</td>
            <td>是否展示在首页</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($list as $v)
            <tr  onmouseover="this.style.backgroundColor='#32ffd6';" onmouseout="this.style.backgroundColor='#dee5e2';"  align="content">
                <td>{{$v['na_id']}}</td>
                <td>{{$v['na_name']}}</td>
                <td>{{$v['na_url']}}</td>
                <td>{{$v['na_weight']}}</td>
                <td>@if($v['na_home']==1) 是 @else 否 @endif</td>
                <td>{{date("Y-m-d H:i:s",$v['na_time'])}}</td>
                <td><a href="{{url('admin/navigation_bar_one_del?na_id='.$v['na_id'])}}" class="layui-btn layui-btn-normal">删除</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <center>
    {{ $list->render()}}
    </center>
    <script>
        $(document).ready(function () {
            $(".layui-btn").click(function () {
                event.preventDefault();
                let _this = $(this);
                let url=_this.attr('href');
                // console.log(url);return;
               $.ajax({
                   url:url,
                   success:function (msg) {
                       if(msg == 1){
                           alert("删除成功");
                           window.location.reload();
                       }else if(msg == 3){
                           alert("该导航栏下有分类");
                       }else{
                           alert("删除失败");
                       }
                   }
               })
                // return false;
            })
        })
    </script>

@endsection