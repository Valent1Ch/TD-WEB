<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>
</head>
<body>
    <?php

$cnx = mysqli_connect("localhost", "root","","albums");

if (mysqli_connect_errno()){
    echo "Echec de la connexion : ".mysqli_connect_error();
    exit();
}
$sql = "SELECT * from albums";
$res = mysqli_query($cnx, $sql);

while ($ligne = mysqli_fetch_array($res)) {
    echo $ligne['nomAlb']."<br />";
}

mysqli_free_result ($res);

mysqli_close($cnx);

?>







</body>
</html>