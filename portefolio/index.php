<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <nav>
    <ol>
        <a href="index.php#accueil">Accueil</a>
        <a href="index.php#Apropos">A propos</a>
        <a href="index.php#competences">Compétences</a>
        <a href="index.php#experience">Expérience</a>
        <a href="">Formation</a>
        <a href="">Contact</a>
    </ol>
   </nav>
    <main>
    <a name="accueil">Accueil</a>





     <a name="Apropos"> A Propos</a>
   
    <?php  
    
    $content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        //echo '<pre>'.print_r($yamlContent,true).'</pre>';
        $competences=$yamlContent['A propos'];

        echo "<ul class='elm'>";
        foreach($competences as $comp){
            echo "<li>$comp</li>";
        }
        echo "</ul>";
    
    
    ?>
   
     <a name="competences">Compétences</a>

    <?php
        $content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        //echo '<pre>'.print_r($yamlContent,true).'</pre>';
        $competences=$yamlContent['compétences'];

        echo "<ul class='elm'>";
        foreach($competences as $comp){
            echo "<li>$comp</li>";
        }
        echo "</ul>";

    ?>


<a name="experience"> Expérience</a>



<?php
        $content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        //echo '<pre>'.print_r($yamlContent,true).'</pre>';
        $competences=$yamlContent['Experiences'];

        echo "<ul class='elm'>";
        foreach($competences as $comp){
            echo "<li>$comp</li>";
        }
        echo "</ul>";

    ?>

<a name="index.php#contact">Contact</a>

<form method="post">
        <label>Votre email</label>
        <input type="email" name="email" required>
        <label>Message</label>
        <textarea name="message" required></textarea>
        <input type="submit">
    </form>
       
 

    </main>
</body>
</html>


