<?php

require('src/c/collaborateur/situation.php');
require('src/c/collaborateur/competence.php');

if (!isset($_GET["gestion_situation"]) && !isset($_GET['collaborateur_convertion_PDF']) && !isset($_GET["competence"]) && !isset($_GET["tableau_de_synthese"]) && !isset($_GET["parametres"])){ // Si l'objet currentUser est créé :
    
    include("src/v/" . $_SESSION["type_de_compte"] . '/accueil.php');
    // On redirige avec la valeur qu'on a définie au dessus
   
}

if(isset($_GET['gestion_situation'])){

  include("src/v/collaborateur/gestion_situation.php");

}elseif(isset($_GET['competence'])){

        
    include("src/v/collaborateur/competence.php");
    
}elseif(isset($_GET['tableau_de_synthese'])){
    
    include("src/v/collaborateur/tableau_de_synthese.php");

}elseif(isset($_GET['parametres'])){
    
    
    include("src/v/collaborateur/parametres.php");

}elseif(isset($_GET['collaborateur_convertion_PDF'])){
    
    
    include("src/v/collaborateur/collaborateur_convertion_PDF.php");
}

?>