<?php
if(!isset($_SESSION)){
    session_start();

}

$list = $_SESSION['todolist']??[];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <h1>TODO LIST</h1>
   



?>

<form method="post">
<input type="text" name="todo">

</form>

<?php

if(isset($_POST['todo'])) {
    $_SESSION['todolist']=$_POST['todo'];
    var_dump($_SESSION);
}


?>



<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Success</button>

</body>
</html>


