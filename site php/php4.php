<?php
session_start();
$res='non connecté';
if(isset($_SESSION['user'])){
    $res="vous êtes ".$_SESSION['user'];
    $res=$res."<a href="deco.php"></a>
}
echo $res;
?>