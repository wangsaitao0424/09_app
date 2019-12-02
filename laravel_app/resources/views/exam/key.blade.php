<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>
</head>
<body>
<center>
    <table>
        <h1>用户登录</h1>
        <tr>
            <td>用户名称</td>
            <td><input type="text" name="u_name"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="u_pwd"></td>
        </tr>
        <tr>
            <td><input type="button" value="提交" id="bu"></td>
            <td></td>
        </tr>
    </table>

</center>
</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#bu").on("click",function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let u_name=$("input[name='u_name']").val();
            let u_pwd=$("input[name='u_pwd']").val();
            data={
                'u_name':u_name,
                'u_pwd':u_pwd
            };
            let url="{{url('api/info')}}";
            // console.log(url);return;
            $.ajax({
                data:data,
                dataType: "json",
                type: "post",
                url: url,
                success:function (msg) {
                    let img="<h3>"+msg+"</h3>";
                    $("#show_img").append(img);
                }
            });
        })
    })
</script>