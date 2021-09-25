<?php
    require('src/c/administrateur/situation.php');
    require('src/c/administrateur/competence.php');
    

if (!isset($_GET["parametres"]) && !isset($_GET["Competence_mobiliser"]) && !isset($_GET["statistique_detaille"])){ // Si l'objet currentUser est créé :

 
include("src/v/" . $_SESSION["type_de_compte"] . '/accueil.php');
    // On redirige avec la valeur qu'on a définie au dessus
    
}

if(isset($_GET["Competence_mobiliser"])){


    include("src/v/" . $_SESSION["type_de_compte"] . '/competence_mobiliser.php');
}

if(isset($_GET["statistique_detaille"])){


    include("src/v/" . $_SESSION["type_de_compte"] . '/statistique_detaille.php');
}



?>