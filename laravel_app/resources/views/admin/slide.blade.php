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
        <label><span>下轮播图片 :</span>
            <input type="file" id="uploadify" />
            <div id="show_img"></div>
            <div class="error-msg"></div>
        </label>
        <label><span>下轮播权重 :</span>
            <input id="title" type="text"  name="sls_weight" placeholder="请填数字" /> &nbsp; &nbsp; &nbsp; &nbsp;
            <div class="error-msg"></div>
        </label>
        <label><span>是否显示 :</span>
            <input  type="radio" name="is_show" value="1" />是 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input  type="radio" name="is_show"  value="2" />否 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <div class="error-msg"></div>
        </label>
        {{--<label><span>页面描述 :</span>--}}
        {{--<textarea id="description" name="description"></textarea>--}}
        {{--<div class="error-msg"></div> &nbsp; &nbsp; </label>--}}
        {{--<div class="success-msg"></div>--}}
        {{--<label>--}}
        <span>&nbsp;</span><input type="submit" class="button but" value="确定" /></label>
        <input type="hidden" name="csrfmiddlewaretoken" value="SfHkbL4feo1G00sJQtbO7TtLN4c2BUwa" />
    </center>
    <script>
        $(document).ready(function () {
                $("#uploadify").uploadify({
                    'swf':"{{asset('uploadify/uploadify.swf')}}",
                    'uploader':'{{url('/admin/upload')}}',
                    'onUploadSuccess':function (file,msg,data) {
                        let img="<img src='http://www.laravel_app.com/"+msg+"' alt='waht' style='width: 200px;height: 200px'> <input type='hidden' name='sls_img' value='"+msg+"'>";
                        $("#show_img").append(img);
                    }
                });
            $(".but").on('click',function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let sls_img=$("input[name='sls_img']").val();
                if(!sls_img){
                    alert("请添加图片");return;
                }
                let sls_weight=$("input[name='sls_weight']").val();
                if(!sls_weight){
                    alert("导航栏权重不能为空");return;
                }else if(isNaN(sls_weight)){
                    alert("导航栏权重不全是数字");return;
                }
                let is_show=$("input:radio:checked").val();
                if(!is_show){
                    alert("请选择是否显示");return;
                }
                data={
                    'sls_img':sls_img,
                    'sls_weight':sls_weight,
                    'is_show':is_show,
                };
                // console.log(data);return;
                let url="{{url('admin/slide_do')}}";
                $.ajax({
                    data:data,
                    dataType: "json",
                    type: "post",
                    url: url,
                    success:function (msg) {
                        if(msg == 1){
                            alert("添加成功");
                            window.location.href="{{url('admin/slide_list')}}"
                        }else{
                            alert("添加失败");
                        }
                    }
                })
            })
        })
    </script>
@endsection