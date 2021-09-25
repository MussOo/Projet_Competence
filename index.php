<?php
session_start();


require('config/config.php');
require('src/c/Authentification.php');

if(isset($currentUser)){
    if($currentUser->get("type_de_compte") === 'collaborateur'){
        
        
        require('src/c/collaborateur_page.php');
        
    
    }elseif($currentUser->get("type_de_compte") === 'administrateur_rh'){
    
    
        require('src/c/administrateur_rh_page.php');
        
    }
}
    
?>