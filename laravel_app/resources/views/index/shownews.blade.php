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
                    {{--当前位置：<a href="http://demo.metinfo.cn/" title="网站首页">网站首页</a> &gt; <a href=../news/ >新闻资讯</a> > <a href=../news/news.php?lang=cn&class2=5 >业界资讯</a>--}}
                </div>
                {{--<span>业界资讯</span>--}}
            </h3>
            <div class="clear"></div>

            <div class="active" id="shownews">
                <h1 class="title">{{$navigationthree_3['nth_name']}}</h1>
                <div class="editor"><div><div>

                        </div>
                        <div>
                            &nbsp;</div>
                        <ol>
                            {{$navigationthree_3['nth_content']}}
                            {{--<li>--}}
                                {{--<span style="font-size:13px;"><strong></strong><span style="font-size:12px;"></span></span><br />--}}
                                {{--&nbsp;</li>--}}
                            {{--<li>--}}
                                {{--<span style="font-size:13px;"><strong>不要将自己的公司名称或品牌作为主要关键词</strong><span style="font-size:12px;">，</span></span>因为在你的目标群体中，很多人是没有听说过你的公司和品牌的，小企业做产品，对于中小企业来说，客户一般都是通过产品和服务来了解你的公司和品牌的，因此，网站关键词如果设置为公司名称，则不能达到良好的营销效果。<br />--}}
                                {{--&nbsp;</li>--}}
                            {{--<li>--}}
                                {{--<span style="font-size:13px;"><strong>关键词不宜过长</strong><span style="font-size:12px;">，</span></span>太长的关键词很少会有人搜索；点击量不宜太热，点击量太大搜索的人越多那么竞争也就会越激烈；同时关键词也不能太冷门，冷门关键词排到第一位也不会有多少人搜索访问，具体可以参考&ldquo;百度指数&rdquo;中的关键词访问量。<br />--}}
                                {{--&nbsp;</li>--}}
                            {{--<li>--}}
                                {{--碰到热门关键词时，<span style="font-size:13px;"><strong>最好在关键词前面或后面加上地域限制</strong></span>，譬如&ldquo;塑钢门窗&rdquo;，这个关键词竞争是非常激烈，但是&ldquo;长沙塑钢门窗&rdquo;就比较好做了，而且如果你做的是有地域限制的业务，那么其他地方搜索到你的网站也没有多大意义。<br />--}}
                                {{--&nbsp;</li>--}}
                            {{--<li>--}}
                                {{--<span style="font-size:13px;"><strong>标题关键词应该控制在1-3个之间</strong></span>，除非第四个以后的关键词是比较冷门的，否则在标题中添加多个关键词是没有任何意义的，反而会影响主关键词的排名。<br />--}}
                                {{--&nbsp;</li>--}}
                        </ol>
                        <div id="metinfo_additional"></div></div><div class="clear"></div></div>
                <div class="met_hits"><div class='metjiathis'><div class="jiathis_style"><span class="jiathis_txt">分享到：</span><a class="jiathis_button_icons_1"></a><a class="jiathis_button_icons_2"></a><a class="jiathis_button_icons_3"></a><a class="jiathis_button_icons_4"></a><a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a></div><script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1346378669840136" charset="utf-8"></script></div>点击次数：<span><script language='javascript' src='../include/hits.php?type=news&id=10'></script></span>&nbsp;&nbsp;更新时间：2012-07-17 16:53:59&nbsp;&nbsp;【<a href="javascript:window.print()">打印此页</a>】&nbsp;&nbsp;【<a href="javascript:self.close()">关闭</a>】</div>
                <div class="met_page">上一条：没有了&nbsp;&nbsp;下一条：<a href='shownews.php?lang=cn&id=4' >新手使用MetInfo建站步骤</a></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@endsection