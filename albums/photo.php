<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Albums</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php


$cnx=mysqli_connect("localhost", "root", "", "albums");

if(mysqli_connect_errno()){
	echo "Echec de connexion";
	exit();
}

$sql="SELECT nomPh FROM photos WHERE idPh=".$_GET['id'];
$res=mysqli_query($cnx, $sql);
$photo=mysqli_fetch_array($res);

echo '<img id="grande" src="photos/'.$photo['nomPh'].'" />';

?>
</body>
</html>