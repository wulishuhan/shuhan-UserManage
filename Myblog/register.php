<?php

// 设定字符集
header('Content-Type:text/html;charset=utf-8');

$error = array();    // 保存错误信息

// 封装函数：载入HTML模板文件
function showRegPage() {
    $error = $GLOBALS['error']; // 从全局变量读取错误信息
    
    define('APP', 'itcast');
    require 'register_html.php';

    exit;  // 终止程序继续执行
}

// 没有表单提交时，显示注册页面
if (empty($_POST)) {
    showRegPage();
}

// 执行到此处说明有表单提交

// 判断表单中各字段是否都已填写
$check_fields = array('username', 'password', 'email');
foreach ($check_fields as $v) {
    if (empty($_POST[$v])) {
        $error[] = '错误：' . $v . '字段不能为空！';
    }
}
if (!empty($error)) {
    showRegPage();  // 显示错误信息并停止程序
}

// 连接数据库，设置字符集，选择数据库
$link = mysqli_connect('localhost', 'root', '123456') or exit('数据库连接失败！');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'itcast') or exit('itcast数据库不存在！');

//接收需要处理的表单字段
$username = trim($_POST['username']);
$password = $_POST['password'];
$email = trim($_POST['email']);

// 载入表单验证函数库，验证用户名和密码格式
require './check_form.lib.php';
if (($result = checkUsername($username)) !== true) {
    $error[] = $result;
}
if (($result = checkPassword($password)) !== true) {
    $error[] = $result;
}
if (($result = checkEmail($email)) !== true) {
    $error[] = $result;
}
if (!empty($error)) {
    showRegPage();  // 显示错误信息并停止程序
}

// SQL转义
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);

// 判断用户名是否存在
$sql = "select `id` from `user` where `username`='$username'";
$rst = mysqli_query($link, $sql);
if (mysqli_fetch_row($rst)) {
    $error[] = '用户名已经存在，请换个用户名。';
    showRegPage();  // 显示错误信息并停止程序
}

// 生成密码盐
$salt = md5(uniqid(microtime()));

// 提升密码安全
$password = md5($salt . md5($password));

// 拼接SQL语句
$sql = "insert into `user_info` (`username`,`email`,`sex`,`count`) values ('$username','$email','男','1')";

// 执行SQL语句
$rst = mysqli_query($link, $sql);


// 拼接SQL语句
$sql = "insert into `user` (`username`,`password`,`salt`,`email`) values ('$username','$password','$salt','$email')";

// 执行SQL语句
$rst = mysqli_query($link, $sql);

if ($rst) {

    // 用户注册成功，自动登录
    session_start();
    
    // 获取新注册用户的ID
    $id = mysqli_insert_id($link);
    
    $_SESSION['userinfo'] = array(
        'id' => $id,               // 将用户id保存到SESSION
        'username' => $username    // 将用户名保存到SESSION
    );

    // 注册成功，自动跳转到会员中心
    
    echo '<script>alert("注册成功！");window.location.href="user.php"; </script>';
    exit;
} else {
    $error[] = '注册失败，数据库操作失败。';
    showRegPage();  // 显示错误信息并停止程序
}
