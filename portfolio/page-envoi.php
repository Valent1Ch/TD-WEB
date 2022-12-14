<?php 
//print_r($_POST);
echo $_POST["prenom"];
$mail=$_POST["mail"];
$nom=$_POST["prenom"]." ".$_POST["nom"];
$objet=$_POST["objet"];
$message=$nom."\n".$_POST["message"];
mail($mail, $objet, $message);

?>