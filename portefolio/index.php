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
        <a href="index.php#acceuil">Accueil</a>
        <a href="">A propos</a>
        <a href="index.php#competences">Compétences</a>
        <a href="">Expérience</a>
        <a href="">Formation</a>
        <a href="">Contact</a>
    </ol>
   </nav>
    <main>
    <a name="acceuil"></a>


     <a name="competences"></a>
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

<a name="index.php#contact"></a>

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


