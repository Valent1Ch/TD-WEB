<?php
if(!isset($_SESSION)) {
    session_start();
}
$list = $_SESSION['todolist'] ?? [];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<h1>Todo liste</h1>
<a href="todoadd.php" class="btn btn-success">Ajouter un élément</a>
<a href="tododelete.php" class="btn btn-warning">Supprimer tout</a>

<ul class="list-group">
<?php
foreach ($list as $todolist=>$elm){
    echo "<li class='list-group-item'>$elm <a href='deleteElement.php?num=$todolist'>X</a></li>";
}


?>
</ul>

</body>
</html>
<?php