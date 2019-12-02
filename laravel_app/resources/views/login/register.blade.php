<!DOCTYPE html>
<html>

<!-- Head -->
<head>
    <title>注册表单</title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('admin/login/css/style.css')}}" type="text/css" media="all">
</head>
<!-- //Head -->

<!-- Body -->
<body>
<h1>注册表单</h1>
<div class="container w3layouts agileits">
<div class="register w3layouts agileits">
    <h2>注 册</h2>
    <form action="" method="post">
        <input type="text" name="u_email" placeholder="邮箱" required="" id="bl">
        <input type="text" name="u_mobile" placeholder="手机号码" required="">
        <input type="password" name="u_pwd" placeholder="密码" required="">
        <input type="text" name="phone_number" placeholder="验证码" required="">
    </form>
    <div class="send-button w3layouts agileits">
            <input type="submit" value="免费注册" id="but">
            <a href="{{url('admin/logins')}}">登录</a>
        {{--<button id="but">免费注册</button>--}}
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="footer w3layouts agileits">
    <p>Copyright &copy; More Templates</p>
</div>
</body>
<!-- //Body -->

</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('#bl').blur(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let u_email=$("input[name='u_email']").val();
            if(!u_email){
                alert('邮箱不能为空');return;
            }
            let data={};
            data={
                'email':u_email,
            };
            var url="{{url('admin/email')}}";
            $.ajax({
                data:data,
                dataType: "json",
                type: "post",
                url: url,
                success:function (msg) {
                    if(msg !==1){
                        alert('邮箱有误');
                    }
                }
                
            })
        })
        $('#but').on('click',function () {
            // alert('111');
            let u_email=$("input[name='u_email']").val();
            let u_mobile=$("input[name='u_mobile']").val();
            let u_pwd=$("input[name='u_pwd']").val();
            let phone_number=$("input[name='phone_number']").val();
            let data={};
            data={
                'u_email':u_email,
                'u_mobile':u_mobile,
                'u_pwd':u_pwd,
                'phone_number':phone_number,
            };
            let url="{{url('admin/register_do')}}";
            $.ajax({
                data:data,
                dataType: "json",
                type: "post",
                url: url,
                success:function (msg) {
                    if(msg == 1){
                        alert("验证码有误");return;
                    }else if(msg == 2){
                        alert("注册成功");
                    }else if(msg == 3){
                        alert("注册失败");return;
                    }else if(msg == 4){
                        alert("该邮箱已注册");return;
                    }
                    window.location.href="{{url('admin/index')}}";
                }

            })
            return false;//禁止submit跳转
        })
    })
</script>