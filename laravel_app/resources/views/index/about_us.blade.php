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
                    {{--当前位置：<a href="http://demo.metinfo.cn/" title="网站首页">网站首页</a> &gt; <a href=../about/show.php?lang=cn&id=19 >关于我们</a> > <a href=../about/show.php?lang=cn&id=19 >公司简介</a>--}}
                </div>
                {{----}}
                <span>@if(empty($navigationtwo['2']['nt_name'])){{$navigationtwo1['nt_name']}}@else {{$navigationtwo['2']['nt_name']}}@endif</span>
                {{--公司简介--}}

            </h3>
            <div class="clear"></div>
            <div class="editor active" id="showtext">
                <div><div>
                        <img  src="{{$navigationthree_3['0']['nth_img']}}" style="margin: 8px; width: 150px; float: left; height: 150px" / alt="图片关键词">&nbsp; &nbsp; &nbsp;{{$navigationthree_3['0']['nth_name']}}</div>
                    <div>
                        &nbsp;</div>
                    <div>
                        &nbsp; &nbsp; &nbsp;{{$navigationthree_3['0']['nth_content']}}</div>
                    <div>
                        &nbsp;</div>
                    <div>
                        &nbsp; &nbsp; &nbsp;{{$navigationthree_3['1']['nth_name']}}</div>
                    <div>
                        &nbsp;</div>
                    <div>
                        &nbsp; &nbsp; &nbsp;{{$navigationthree_3['1']['nth_content']}}</div>
                    <div>
                        &nbsp;</div>
                    <div>
                        <strong><span style="font-size: 13px">{{$navigationthree_3['2']['nth_name']}}</span></strong></div>
                    <div>
                        &nbsp; &nbsp; &nbsp;{{$navigationthree_3['2']['nth_content']}}</div>
                    <div>
                        &nbsp;</div>
                    <div>
                        <strong><span style="font-size: 13px">{{$navigationthree_3['3']['nth_name']}}</span></strong></div>
                    <div>
                        &nbsp; &nbsp; &nbsp;{{$navigationthree_3['3']['nth_content']}}</div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection