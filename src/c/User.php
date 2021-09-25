<?php



    $db = connectDB();
    $userManager = new UserManager($db);

if(isset($_GET['Okcreate'])){ // creation d'un compte collaborateur

    $Option = new User(array(
        "nom" => htmlspecialchars($_POST["nom"]),
        "prenom" => htmlspecialchars($_POST["prenom"]),
        "id_EGNOM" => htmlspecialchars($_POST["identifiant"]),
        "mdp" => htmlspecialchars($_POST["pwd"]),
    ));

    $creation = $userManager->Create($Option); // fait 

}

?>