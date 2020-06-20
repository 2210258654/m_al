<?php
require_once('./function.php');
$link=connect();
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$sql="select * from user where username='$username' and password='$password'";
$result=mysqli_query($link,$sql);

if($row=mysqli_fetch_assoc($result)){
    
    session_start();
    $_SESSION['userinfo']=array(
        'id'=>$row['id'],
        'username'=>$row['username']
    );
    header("refresh:3;url=../my_user/my_user.php");
    
}
else{
    echo'用户名或密码错误';
    
}
?>