<?php

$message=$_GET['msg']??"Bonjour";
$max=$_GET['nb']??5;
$color=$_GET['color']??'black';
$bgcolor=$_GET['bgcolor']??'white';

?>

<form method="get">
    
    <input type="text" name="msg" value="<?=$message?>">
    <input type="number" value="1" max=<?=$max?> min="1" name="nb">
    <input type="color" name="color" value="<?=$color>">
    <input type="color" name="bgcolor" value="<?=$bgcolor?>">
    <button type="submit">Valider</button>


</form>


<?php
if(isset($_GET['msg'])) {
foreach (range(1,$max)as $i){
    echo "<h$i style='color: $color;background-color:$bgcolor'>
    $message</h$i>";
    }
}

?>