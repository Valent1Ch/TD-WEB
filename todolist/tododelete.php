<?php
session_start();
$num=$_GET['num'] ?? 0;


$list=$_SESSION['todolist']??[];
unset($list[$num]);



$_SESSION['todolist']=$list;
include 'todolist.php';








?>
