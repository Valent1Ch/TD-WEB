<?php
session_start();
$num=$_GET['num'];
$list=$_SESSION['todolist']??[];
unset($list[$num]);
$_SESSION['todolist']= []
include 'todolist.php';

?>