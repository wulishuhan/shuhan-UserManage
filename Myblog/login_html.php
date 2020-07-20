<?php if(!defined('APP')) die('error!'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎登录</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
<form method="post">
<table class="reg">
	<tr><td class="title" colspan="2">欢迎登录</td></tr>
	<tr><th>用户名：</th><td><input type="text" name="username" /></td></tr>
	<tr><th>密码：</th><td><input type="password" name="password" /></td></tr>
	<tr>
		<th>验证码：</th><td><input type="text" name="captcha"/><img src="code.php" alt="" id="code_img"/"> 
		<a href="#" id="change">看不清，换一张&nbsp;</a>
	</td>
	</tr>
	<tr><td colspan="2" class="td-auto-login">
		<input type="checkbox" class="checkbox" id="auto_login" name="auto_login" value="on" /><label for="auto_login">下次自动登录</label>
	</td></tr>
	<tr><td colspan="2" class="td-btn">
	<input type="submit" value="登录" class="button" />
	<input type="button" value="立即注册" class="button" onclick="location.href='register.php'" />
	</td></tr>
	
</table>
</form>
<?php if(!empty($error)): ?>
	<div class="error-box">登录失败，错误信息如下：
		<ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
	</div>
<?php endIf; ?>
	<script>
	var change = document.getElementById("change");
	var img = document.getElementById("code_img");
	change.onclick = function(){
		img.src = "code.php?t="+Math.random(); //增加一个随机参数，防止图片缓存
		return false; //阻止超链接的跳转动作
	}
	alert
</script>
</body>
</html>