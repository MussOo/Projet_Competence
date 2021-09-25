<?php $db=connectDB();

require("src/m/Situation.php");
require("src/m/Contexte.php");
require("src/m/Lien.php");
require("src/m/Activite.php");
require("src/m/Test.php");

$situationManager=new SituationManager($db);
$contexteManager=new ContexteManager($db);
$LienManager=new LienManager($db);
$TestManager=new TestManager($db);


    if(isset($_GET['gestion_situation'])) {

        $situationid = new Situation(array(
            "situation_id_situation" => $currentUser->get("id"),
        ));

        $ListSituation = $situationManager->getSituations($situationid); // fait 

        if(isset($_GET['situationToDelete'])) {

            $situationid = new Situation(array(
                "situation_id_situation" => htmlspecialchars($_GET['situationToDelete']),
            ));
            $situationManager->DeleteSituation($situationid); // fait 

        }

        if(isset($_GET['situationToEdit'])) {

            $situationid = new Situation(array(
                "situation_id_situation" => htmlspecialchars($_GET['situationToEdit']),
            ));
            
            $lienid = new Lien(array(
                "lien_id_situation" => htmlspecialchars($_GET['situationToEdit']),
            ));
    
            $situationData = $situationManager->getSituationData($situationid); // fait
            
            $LiensList=$LienManager->getList($lienid); // fait
            
            $ContexteList=$contexteManager->GetContexte();

        }

        if(isset($_POST["updateSituation"])) {

            $situationManager->UpdateSituation($_POST); // pas fais 
        }

        if(isset($_GET["usedCompetencesSituation"])) {

            $situationid = new Test(array(
                "situation_id_situation" => htmlspecialchars($_GET['usedCompetencesSituation']),
            ));
            $Activitecibler=$TestManager->GetActivitecibler($situationid); // fait

        }

        if(isset($_GET['updateSituationCompetence'])){

            $EnvoieEditCompetence=$TestManager->updateSituationCompetence($_POST); // pas fait
    
        }
    }elseif(isset($_GET['competence'])){ // page competences

        $Activitecibler=$TestManager->GetallActivite(); // fait

    }elseif(isset($_GET['collaborateur_convertion_PDF'])){
        
        
        $Activitecibler=$TestManager->GetallActivite();

    }else{
        
    }

/// PAGE ACCUEIL ///

if(empty($_GET)  ){ // accueil Collaborateur
    
    $ListContexte = $contexteManager->getContexte();
    $GetActivite = $TestManager->GetallActivite();


}


if(isset($_GET['createSituation'])){
    
    $EnvoieDataSituation = $situationManager->CreerSituation($currentUser->get("id"), $currentUser->get("filliere"),$_POST); // pas fait
    
}
?>