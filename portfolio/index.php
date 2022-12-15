<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="portfolioicon1.ico" type="image/x-icon">
   
    <title>Portfolio</title>
</head>
<body>
   
<nav>

    <ol>

    <a  href="index.php#accueil"> Accueilaaaaa</a>
    <a  href="index.php#Apropos"> A propos</a>
    <a  href="index.php#competences"> Compétences</a>
    <a  href="index.php#experience"> Expérience</a>
    <a  href="index.php#accueil"> Formation</a>
    <a  href="index.php#accueil"> Contact</a>
 
    </ol>
   </nav>

   
   
   <main>
    <h1>BIENVENUE SUR MON PORTFOLIO</h1>
    <a name="accueil">Accueil</a>

    
    

     <a name="Apropos"> A Propos</a>
   
    <?php  
    
    $content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        //echo '<pre>'.print_r($yamlContent,true).'</pre>';
        $competences=$yamlContent['sujet'];

        echo "<div class='elm'>";
        echo $yamlContent["sujet"]["description"];
        echo '<img id="livre" src="'.$yamlContent["sujet"]["src"].'" />';
        echo "</div>";
    
    
    ?>
   
     <a name="competences">Compétences <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 2 16 13">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg></a>
      
        

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


<a name="experience"> Expérience Professionel <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star-fill" viewBox="0 2 16 13">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
</a>
<div class='elm'>
<?php

$content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        $competences=$yamlContent['Experiences'];
        $experiencepro=$yamlContent['stages'][0];
        $experiencepro2=$yamlContent['stages'][1];
        echo  $competences=$yamlContent['Experiences'];
        echo "<ul>";
        echo "<li>$experiencepro</li>";
        echo "<li>$experiencepro2</li>";  
        echo "</ul>"
        ?>
</div>




<a name="index.php#contact">Contact <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 2 16 13">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
</svg></a>


<div class='elm'>

<?php

$competences=$yamlContent['formulaire'];
echo $yamlContent["formulaire"]["texteformlaire"];



?>

<form name="mon-formulaire1" action="page-envoi.php" method="post">

<p>
   Votre prénom :<br />
   <input type="text" name="prenom" value="" />
</p>
<p>
   Votre nom :<br />
   <input type="text" name="nom" value="" />
</p>
<p>
   Votre adresse mail :<br />
   <input type="text" name="mail" value="" />
</p>
<p>
   Votre objet :<br />
   <input type="text" name="objet" value="" />
</p>
<p>
   Votre message :<br />
   <textarea name="message" rows="6" cols="40">Vous pouvez saisir ici un message.</textarea>
</p>
<p>
   <input type="submit" value="Envoyer" />
   <input type="reset" value="Annuler" />
</p>
</form>
<?php
$content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
        $competences=$yamlContent['formulaire'];

        echo '<img id="logoformulaire" src="'.$yamlContent["formulaire"]["image"].'" />';
        
        
        $content=file_get_contents('competenceyaml.yaml');
        $yamlContent=yaml_parse($content);
       
      
       
       
  ?>  
    </div>
 
    
    </main>
</body>
</html>


