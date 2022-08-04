<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/home/wwwroot/only.1yuaninfo.com/./application/wxadmint1/view/login/logins.html";i:1635479595;}*/ ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>后台登录-后台登录管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link rel="stylesheet" href="/public/static/admin/css/style.css">
  </head>
  <body>
  <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
	  <form action="<?php echo url('wxadmint1/login/deng'); ?>" method="post">
    <?php echo token('__hash__'); ?>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="用户名" name='admin_name'/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="密码" name='admin_password'/>
        </div>
    
		<input type="submit" value='登录' class="login__submit">
        <p class="login__signup"><a></a></p>
      </div>
	  </form>
    </div>
</div>
    <script src='/public/static/admin/js/jquery.min.js'></script>    
</body>
</html>
