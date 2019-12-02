<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href='{{url("api/user/$accessToken")}}' id="but">获取数据</a>
    <table id="com">
        <tr>
            <td>名字</td>
            <td>描述</td>
            <td>库存</td>
        </tr>
    </table>
</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#but").click(function () {
            event.preventDefault();//阻止默认事件行为的触发  a 标签
            var _this = $(this);//定义
            var url = _this.attr('href');//获取 a 标签// alert(url);
            $.ajax({
                url: url,
                success:function (msg) {
                    $.each({

                    })
                }
            });
        })
    })
</script>