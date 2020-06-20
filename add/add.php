<?php
require_once('./function.php');
$link=connect();
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);


?>