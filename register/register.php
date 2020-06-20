<?php
require_once('./function.php');
$link=connect();
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$email=$_POST['email'];
if(empty($username)){
    echo'用户名不能为空';
    die();
}
if(empty($email)){
    echo'邮箱不能为空';
    die();
}
if(empty($password)){
    echo'密码不能为空';
    die();
}
$sql_select = "select * from user where username = '$username'";
$result=mysqli_query($link,$sql_select);
$row=mysqli_fetch_assoc($result);
if(isset($row))
{
    echo"注册失败,用户名已存在<td><a href='./register.html'>返回注册</a></td>";
    die();
}
$sql="insert into user values(null,'$username','$password','$email')";

if(mysqli_query($link,$sql)){
    echo"注册成功,<td><a href='../login/login.html'>返回登录</a></td>";
}
?>