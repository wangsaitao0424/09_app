<!DOCTYPE html>
<html>

<!-- Head -->
<head>
<title>登录表单</title>

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
<h1>登录表单</h1>
<div class="container w3layouts agileits">
  <div class="login w3layouts agileits">
    <h2>登 录</h2>
    {{--<form action="#" method="post">--}}
      <input type="text" name="u_email" placeholder="邮箱" required="">
      <input type="password" name="u_pwd" placeholder="密码" required="">
    {{--</form>--}}
    <ul class="tick w3layouts agileits">
      <li>
        {{--<input type="checkbox" id="brand1" value="">--}}
        {{--<label for="brand1"><span></span>记住我</label>--}}
      </li>
    </ul>
    <div class="send-button w3layouts agileits">
      {{--<form>--}}
        <input type="submit" value="登 录" id="but">
      {{--</form>--}}
    </div>
    <a href="{{url('admin/register')}}">注册</a>
    {{--<div class="social-icons w3layouts agileits">--}}
      {{--<p>- 其他方式登录 -</p>--}}
      {{--<ul>--}}
        {{--<li class="qq"><a href="#"> <span class="icons w3layouts agileits"></span> <span class="text w3layouts agileits">QQ</span></a></li>--}}
        {{--<li class="weixin w3ls"><a href="#"> <span class="icons w3layouts"></span> <span class="text w3layouts agileits">微信</span></a></li>--}}
        {{--<li class="weibo aits"><a href="#"> <span class="icons agileits"></span> <span class="text w3layouts agileits">微博</span></a></li>--}}
        {{--<div class="clear"> </div>--}}
      {{--</ul>--}}
    {{--</div>--}}
  </div>
  <div class="clear"></div>
</div>
<div class="footer w3layouts agileits">
  <p>Copyright &copy; More Templates</p>
</div>
</body>
<!-- //Body -->
</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function () {
      $('#but').on('click',function () {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        let u_email=$("input[name='u_email']").val();
        let u_pwd=$("input[name='u_pwd']").val();
        // let data={};
        data={
          'u_email':u_email,
          'u_pwd':u_pwd
        };
        let url="{{url('admin/logins_do')}}";
        $.ajax({
          data:data,
          dataType: "json",
          type: "post",
          url: url,
          success:function (msg) {
            if(msg == 1){
              alert("无此账号");return;
            }else if(msg == 2){
              alert("账号或密码错误");return;
            }else{
              alert("登录成功");
            }
            window.location.href="{{url('admin/index')}}";
          }
        });
        return false;//禁止submit跳转
      })
    })
</script>