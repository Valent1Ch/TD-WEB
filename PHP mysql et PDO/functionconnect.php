<?php 
function connect(string $dbName):PDO
{
    try{
        $db = new PDO ("mysql:host=127.0.0.1;dbname=$dbName",'root','');
    } catch (Exception $e){
        echo $e->getMessage();
        die();
    }
    return $db;
}

function queryandFetchall (PDO $db,string $sql): array 

{
    $statement=$db->query($sql);
    return $statement->fetchAll(PDO: :FetchAll)
}