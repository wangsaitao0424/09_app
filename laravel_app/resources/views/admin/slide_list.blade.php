@extends('admin/layouts.index')
@section('content')
    <link rel="stylesheet" href="{{asset('/layui/css/layui.css')}}">
    <script src="{{asset('/layui/layui.js')}}"></script>
    {{--<script src="{{asset('/jquery.js')}}"></script>--}}
    <font size="5" color="#1e90ff">
        <marquee scrollamount="10">知我者，谓我心忧，不知我者，谓我何求</marquee>
        <marquee scrollamount="10" direction="right">无端坠入红尘梦，惹却三千烦恼丝</marquee>
    </font>
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
            <th>ID</th>
            <th>下播图图片</th>
            <th>权重</th>
            <th>是否展示</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $v)
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';" align="content">
                <td>{{$v['sls_id']}}</td>
                <td><img src="{{$v['sls_img']}}" alt=""></td>
                <td>{{$v['sls_weight']}}</td>
                <td>@if($v['is_show']==1) 是 @else 否 @endif</td>
                <td>{{date("Y-m-d H:i:s",$v['sls_time'])}}</td>
                <td><a href="{{url('admin/slide_del?sls_id='.$v['sls_id'])}}" class="layui-btn layui-btn-normal">删除</a></td>
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