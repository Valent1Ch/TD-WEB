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

if(!isset($_GET['id'])) {
	$sql="SELECT idAlb FROM albums ORDER BY RAND() LIMIT 1";
	$res=mysqli_query($cnx, $sql);
	$_GET['id']=mysqli_fetch_array($res)["idAlb"];
}

$sql="SELECT * FROM albums";
$res=mysqli_query($cnx, $sql);

echo '<nav>';
while($album = mysqli_fetch_array($res)){
	$id = $album["idAlb"]==$_GET['id'] ? ' id="index" ' : '';
	echo '<a '.$id.' href="index.php?id='.$album["idAlb"].'">'.$album["nomAlb"].'</a>';
}
echo '</nav>';

$sql="SELECT photos.* FROM photos INNER JOIN comporter ON comporter.idPh=photos.idPh WHERE idAlb=".$_GET['id'];
$res=mysqli_query($cnx, $sql);

echo '<main>';
while($photo = mysqli_fetch_array($res)){
	echo '<a target="_blank" href="photo.php?id='.$photo['idPh'].'"><img src="photos/'.$photo['nomPh'].'" /></a>';
}
echo '</main>';

mysqli_free_result($res);
mysqli_close($cnx);

?>
</body>
</html>