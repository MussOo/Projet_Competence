<?php 

    require("src/m/function.php");
    require("src/m/User.php");
    require('src/c/User.php');

    $db = connectDB();
    $userManager = new UserManager($db);

    $listUsers = $userManager->getList();

if(isset($_GET['deconnexion'])){ // deconnexion
    unset($currentUser) ;
   session_destroy( );
   header('Location: ?');
    }


    if (isset($_SESSION["username"]) & isset($_SESSION["username"])) {
        // Si ce n'est pas pas la première connexion du user, on get le login et pwd via la session
        $dataUser = connect($listUsers, $_SESSION);
    
        $found = $dataUser["found"];
        $currentUser = $dataUser["currentUser"];
        $_SESSION["type_de_compte"] =  $currentUser->get("type_de_compte");
        $_SESSION["filliere"] =  $currentUser->get("filliere");

    } elseif (isset($_POST["username"]) & isset($_POST["pwd"])) {
        // Si c'est la première connexion du user, on get le login et pwd via le formulaire
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["pwd"] = $_POST["pwd"];
        $dataUser = connect($listUsers, $_SESSION);
    
        $found = $dataUser["found"];
        $currentUser = $dataUser["currentUser"];
        $_SESSION["type_de_compte"] =  $currentUser->get("type_de_compte");
        $_SESSION["filliere"] =  $currentUser->get("filliere");
        header('Location: ?');

    } elseif(isset($_GET['create'])) {
        // Si il n'y a ni session, ni formulaire, alors on affiche la page de connexion
    
        include("src/v/global/creation_compte.php");

    }else{

        include("src/v/global/authpage.php");
        
    }

    
    if(isset($_GET['ChangeOption'])){
        $EnvoieDataSituation = $userManager->ChangeOption($_POST); 
    }
    
    

    if ( isset($_GET['deconnectUser'])){  // Cliquer sur le bouton deconnecté - destruction de la session en cours.
        unset($currentUser) ;
        session_destroy( );
        header('Location: ?');
    }


?>