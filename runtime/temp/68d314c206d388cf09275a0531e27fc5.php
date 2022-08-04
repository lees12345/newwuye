<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/home/wwwroot/only.1yuaninfo.com/./application/index/view/personal/questions_list.html";i:1635479583;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,	minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="http://newsloong.gszx77.com/public/static/index/css/new_dragon.css" type="text/css"  rel="stylesheet"/>
    <!-- 底部为灰色的公共样式 -->
    <link href="http://newsloong.gszx77.com/public/static/index/css/gray_style.css" type="text/css"  rel="stylesheet"/>
    <script src="http://newsloong.gszx77.com/public/static/index/js/jquery-2.1.1.min.js"></script>
    <script src="http://newsloong.gszx77.com/public/static/index/js/new_dragon.js"></script>
    <title>投诉</title>
    <style type="text/css">
        
        .advice_zong_title{
            font-size: 16px;
        }


    </style>
</head>
<body>
<p class="advice_zong_title">请选择投诉原因</p>
<div class="advice_one_div">
    <p class="advice_title">诱导<span><img src="http://newsloong.gszx77.com/public/static/index/img/tousu_icon_you.png"></span></p>
    <div class="advice_select">
        <p onclick="jump('诱导分享');">诱导分享</p>
        <p onclick="jump('诱导关注');">诱导关注</p>
        <p onclick="jump('诱导下载');">诱导下载</p>
    </div>
</div>

<div class="advice_one_div">
    <p class="advice_title" onclick="jump('骚扰');">骚扰</p>
</div>
<div class="advice_one_div">
    <p class="advice_title" >欺诈<span><img src="http://newsloong.gszx77.com/public/static/index/img/tousu_icon_you.png"></span></p>
    <div class="advice_select">
        <p onclick="jump('多级分销');">多级分销</p>
        <p onclick="jump('诱导关注');">诱导关注</p>
    </div>
</div>
<div class="advice_one_div">
    <p class="advice_title" onclick="jump('恶意营销');">恶意营销</p>
</div>
<div class="advice_one_div">
    <p class="advice_title" onclick="jump('其他');">其他</p>
</div>
<!-- <div class="temp_bottom"><span><img src="http://newsloong.gszx77.com/public/static/index/img/tousu_icon_dianhua_1.png" >投诉电话:&nbsp;&nbsp;</span><a href="tel:010-87777911">010-87777911</a></div> -->
<script>

    // 个人中心点击展开收起
    // 收起展开
    $(document).ready(function(){
        $("p.advice_title").click(function(){
            
            if($(this).next(".advice_select").is(":hidden")){
                $(this).next('.advice_select').slideDown('slow').parent().siblings().children(".advice_select").slideUp('slow');
                console.log(this);
                $(this).find('img').attr('src','http://newsloong.gszx77.com/public/static/index/img/tousu_icon_xia.png');
            }
            else{
                $(this).next('.advice_select').slideUp('slow');
                $(this).find('img').attr('src','http://newsloong.gszx77.com/public/static/index/img/tousu_icon_you.png');

            }
        });
    });


    function jump($id)
    {
        var id=$id
        // alert(id)
        window.location.href="questions.html?type="+id;
    }

</script>
</body>
</html>
