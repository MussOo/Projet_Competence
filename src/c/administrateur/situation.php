<?php 
$db=connectDB();

require("src/m/Test.php");

$TestManager=new TestManager($db);
$UserManager=new UserManager($db);



/// PAGE ACCUEIL ///

if(empty($_GET)){ // accueil Collaborateur
    
    $AllCollaborateur = $UserManager->getList();
    $AllSituation = $TestManager->Situation_Avancement();
    
    $GetActivite = $TestManager->GetallActivite();

}

/// PAGE Avancement situation
if(isset($_GET['avancement_situation'])){
    
    $AllCollaborateur = $UserManager->getList();
    $AllSituation = $TestManager->Situation_Avancement();
    
    $GetActivite = $TestManager->GetallActivite();

}

/// PAGE Competence Mobiliser
if(isset($_GET['Competence_mobiliser'])){
    
    $situationid = new Test(array(
        "situation_id_situation" => htmlspecialchars($_GET['id_situation']),
    ));
    $Activitecibler=$TestManager->GetActivitecibler($situationid); // fait
    
}





?>