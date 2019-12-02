@extends('admin/layouts.index')
@section('content')
    <script src="{{asset('uploadify/jquery.uploadify.js')}}"></script>
    <link rel="stylesheet" href="{{asset('uploadify/uploadify.css')}}">
    <style>
        .smart-green {
            /*margin-left: auto;*/
            margin-right: auto;
            max-width: 500px;
            /*background: #F8F8F8;*/
            padding: 30px 30px 20px 30px;
            font: 12px Arial, Helvetica, sans-serif;
            color: #666;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }
        .smart-green h1 {
            font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
            padding: 20px 0px 20px 40px;
            display: block;
            margin: -30px -30px 10px -30px;
            color: #FFF;
            background: #9DC45F;
            text-shadow: 1px 1px 1px #949494;
            border-radius: 5px 5px 0px 0px;
            -webkit-border-radius: 5px 5px 0px 0px;
            -moz-border-radius: 5px 5px 0px 0px;
             border-bottom: 1px solid #89AF4C;
        }
        .smart-green h1 > span {
             display: block;
             font-size: 11px;
            color: #FFF;
        }
        .smart-green label {
            display: block;
            margin: 0px 0px 5px;
        }
        .smart-green label > span {
            float: left;
            margin-top: 10px;
            color: #5E5E5E;
        }
        .smart-green input[type="text"], .smart-green input[type="email"],
        .smart-green textarea, .smart-green select {
            color: #555;
            height: 30px;
            line-height: 15px;
            width: 100%;
            padding: 0px 0px 0px 10px;
            margin-top: 2px;
            border: 1px solid #E5E5E5;
            background: #FBFBFB;
            outline: 0;
            -webkit-box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
            box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
            font: normal 14px/14px Arial, Helvetica, sans-serif;
        }
        .smart-green textarea {
            height: 100px;
            padding-top: 10px;
        }
        .smart-green .button {
            background-color: #9DC45F;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-border-radius: 5px;
            border: none;
            padding: 10px 25px 10px 25px;
            color: #FFF;
            text-shadow: 1px 1px 1px #949494;
        }
        .smart-green .button:hover {
            background-color: #80A24A;
        }
        .error-msg{
            color: red;
            margin-top: 10px;
        }
        .success-msg{
            color: #80A24A;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <center class="smart-green">
        <label><span>三级导航名称 :</span>
            <input id="title" type="text" name="nth_name" placeholder="名称" />
            <div class="error-msg"></div>
        </label>
        <label><span>导航栏地址 :</span>
            <input id="title" type="text" name="nth_url" placeholder="地址" />
            <div class="error-msg"></div>
        </label>
        <label><span>三级导航栏图片 :</span>
            <input type="file" id="uploadify" />
            <div id="show_img"></div>
            <div class="error-msg"></div>
        </label>
        <label><span>导航栏权重 :</span>
            <input id="title" type="text"  name="nth_weight" placeholder="请填数字" /> &nbsp; &nbsp; &nbsp; &nbsp;
            <div class="error-msg"></div>
        </label>
        <label><span>是否显示 :</span>
            <input  type="radio" name="is_show" value="1" />是 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  type="radio" name="is_show"  value="2" />否 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="error-msg"></div>
        </label>
        <br><br><br><br>
        <label><span>二级导航 :</span>
            <select name="nt_id">
                <option value ="">请选择</option>
                @foreach($info as $v)
                <option value ="{{$v['nt_id']}}">{{$v['nt_name']}}</option>
                @endforeach
            </select>
            <div class="error-msg"></div>
        </label>
        <label><span>三级导航内容 :</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"></script>
            <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
            <script id="editor" type="text/plain" name="nth_content" style="width:100%;height:350px;"></script>
            <script type="text/javascript">
            //实例化编辑器
            var ue = UE.getEditor('editor', {
                toolbars: [
                    [
                        'undo', //撤销
                        'bold', //加粗
                        'underline', //下划线
                        'preview', //预览
                        'horizontal', //分隔线
                        'inserttitle', //插入标题
                        'cleardoc', //清空文档
                        'fontfamily', //字体
                        'fontsize', //字号
                        'paragraph', //段落格式
                        'simpleupload', //单图上传
                        'insertimage', //多图上传
                        'attachment', //附件
                        'music', //音乐
                        'inserttable', //插入表格
                        'emotion', //表情
                        'insertvideo', //视频
                        'justifyleft', //居左对齐
                        'justifyright', //居右对齐
                        'justifycenter', //居中对
                        'justifyjustify', //两端对齐
                        'forecolor', //字体颜色
                        'fullscreen', //全屏
                        'edittip ', //编辑提示
                        'customstyle', //自定义标题
                        'template', //模板
                    ]
                ]
            });
            </script>
        <div class="error-msg"></div> &nbsp; &nbsp; </label>
        <div class="success-msg"></div>
        <label>
        <span>&nbsp;</span><input type="submit" class="button but" value="确定" /></label>
        <input type="hidden" name="csrfmiddlewaretoken" value="SfHkbL4feo1G00sJQtbO7TtLN4c2BUwa" />
    </center>

    <script>
        $(document).ready(function () {
            $("#uploadify").uploadify({
               'swf':"{{asset('uploadify/uploadify.swf')}}",
                'uploader':'{{url('/admin/upload')}}',
                'onUploadSuccess':function (file,msg,data) {
                    // console.log(file);
                    // console.log(msg);
                    // console.log(data);
                    let img="<img src='http://www.laravel_app.com/"+msg+"' alt='waht' style='width: 200px;height: 200px'> <input type='hidden' name='nth_img' value='"+msg+"'>";
                    $("#show_img").append(img);
                }
            });
            $('.but').on('click',function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let nth_name=$("input[name='nth_name']").val();
                // if(!nth_name){
                //     alert("三级导航名称不能为空");return;
                // }
                let nth_url=$("input[name='nth_url']").val();
                // let Expression=/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
                // let objExp=new RegExp(Expression);
                // if(objExp.test(nth_url) != true){
                //     alert("网址格式不正确！请重新输入");return;
                // }
                let nth_weight=$("input[name='nth_weight']").val();
                if(!nth_weight){
                    alert("导航栏权重不能为空");return;
                }else if(isNaN(nth_weight)){
                    alert("导航栏权重不全是数字");return;
                }
                let is_show=$("input:radio:checked").val();
                if(!is_show){
                    alert("请选择是否显示");return;
                }
                let nt_id=$('option:selected').val();
                if(!nt_id){
                    alert("请选择二级导航");return;
                }
                let nth_content= UE.getEditor('editor').getContentTxt();
                let nth_img=$("input[name='nth_img']").val();
                // console.log(nth_img);return;
                data={
                    'nth_name':nth_name,
                    'nth_url':nth_url,
                    'nth_weight':nth_weight,
                    'is_show':is_show,
                    'nt_id':nt_id,
                    'nth_content':nth_content,
                    'nth_img':nth_img
                };
                // console.log(data);return;
                let url="{{url('admin/navigation_bar_three_do')}}";
                $.ajax({
                    data:data,
                    dataType: "json",
                    type: "post",
                    url: url,
                    // processData : false,
                    // contentType : false,
                    // async:false,
                    success:function (msg) {
                        if(msg == 1){
                            alert("添加成功");
                            window.location.href="{{url('admin/navigation_bar_three_list')}}"
                        }else{
                            alert("添加失败");
                        }
                    }
                })
            })
        })
    </script>
@endsection