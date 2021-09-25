<?php

function connectDB() { // connexion a la bdd (configuration dans Config.php)

    try { $bdd = new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME .';charset=utf8', DB_USER, DB_PWD); }
    catch(Exception $e) { die('Erreur : '.$e->getMessage()); }

    return $bdd;
}

function connect($list, $type) { // verification sur le compte existe.
    foreach ($list as $key => $value) {
        if ($type["username"] == $value->get("id_EGNOM") and $type["pwd"] == $value->get("mdp")) {
            $found = true;
            $currentUser = $value;
            
            
        }
    }  
    return array(
        "found" => isset($found) ? $found : false,
        "currentUser" => isset($currentUser) ? $currentUser : false,
    );  
    
}
  
function Etat_convertion($etat){        // Change une valeur decimal en texte (Page : Avancement_Situation)
    if($etat == "0"){
        $resultat = 'En cours';
    }elseif($etat == "1"){
        $resultat = 'Terminé';
    }

    return $resultat;
}

function isCompetencesUsedSituation($id_competences, $id_situation) {       // cibles les competences utilisé dans une situation
    $db = connectDB();

    $isUsed = $db->prepare("SELECT * FROM viser
            INNER JOIN situation ON situation.situation_id_situation = viser.viser_id_situation
            WHERE situation.situation_id_situation = :id_situation AND viser.viser_id_competence = :id_competence");
            $isUsed->execute(array(
                ":id_situation" => $id_situation,
                ":id_competence" => $id_competences
            ));

    return $isUsed;
}

function isCompetencesUsed($id_competences, $id_user){ // cherche les competences utilisé par un utilisateur

    $db = connectDB();

    $isUsed = $db->prepare("SELECT * FROM viser
    INNER JOIN situation ON situation.situation_id_situation = viser.viser_id_situation
    WHERE situation.situation_id_user = :id_user AND viser.viser_id_competence = :id_competence");
    $isUsed->execute(array(
        ":id_user" => $id_user,
        ":id_competence" => $id_competences
    ));

    return $isUsed;

}

function getCompetences($id_activite, $id_bloc) { // cherche les competences en fonction du Bloc et l'activité
    $db = connectDB();

    $filliere = $_SESSION["filliere"];

    if(isset($filliere) && $filliere == "SLAM" OR $filliere == 'SISR'){
        
        $competences = $db->prepare("SELECT competences.nom, competences.drawID, competences.id_competence FROM competences
        INNER JOIN activite ON activite.id_activite = competences.id_activite
        WHERE activite.id_bloc = :id_bloc AND competences.id_activite = :id_activite AND competences.filliere = :filliere");
        $competences->execute(array(
            ":id_activite" => $id_activite,
            ":id_bloc" => $id_bloc,
            ":filliere" => $filliere
        ));
        
        return $competences;
    }else{
        $competences = $db->prepare("SELECT competences.nom, competences.drawID, competences.id_competence FROM competences
        INNER JOIN activite ON activite.id_activite = competences.id_activite
        WHERE activite.id_bloc = :id_bloc AND competences.id_activite = :id_activite");
        $competences->execute(array(
            ":id_activite" => $id_activite,
            ":id_bloc" => $id_bloc
            
        ));
        return $competences;
        }

}



/// Statistique /// 


function Situation_tous_terminer(){   // statistique_collab
    $db = connectDB();
        $situation_tous_terminer = $db->query("SELECT * FROM situation where situation.situation_etat = '1'");

        $count = 0;

        while ($data = $situation_tous_terminer->fetch()) {
            $count = $count + 1;
        }

        return $count;
}
function Situation_tous_encour(){       // statistique_collab
    $db = connectDB();
        $situation_tous_terminer = $db->query("SELECT * FROM situation where situation.situation_etat = '0'");

        $count = 0;

        while ($data = $situation_tous_terminer->fetch()) {
            $count = $count + 1;
        }

        return $count;
}

function Situation_tous(){          // statistique_collab
    $db = connectDB();
        $situation_tous_terminer = $db->query("SELECT * FROM situation");

        $count = 0;

        while ($data = $situation_tous_terminer->fetch()) {
            $count = $count + 1;
        }

        return $count;
}
function statistique_avancer_cibler_encours(){
    if(isset($_POST['selectCollaborateur_statistique'])){

        $id_EGNOM = $_POST['selectCollaborateur_statistique'];
        $count = 0;

        $db = connectDB();
        $situation_tous_terminer = $db->prepare("SELECT utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation, situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                        FROM situation 
                                        INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user
                                        WHERE utilisateur.id_EGNOM = :id_egnom AND situation.situation_etat = '0'" );
        $situation_tous_terminer->execute(array(
            ":id_egnom" => $id_EGNOM, 
        ));
      

        while ($data = $situation_tous_terminer->fetch()) {
            $count = $count + 1;
        }

        return $count;
    }     
}

function Contribution_sur_situationAll(){
    $count = Situation_tous();

    if(isset($_POST['selectCollaborateur_statistique'])){

        $id_EGNOM = $_POST['selectCollaborateur_statistique']; 
        $result = 0; 
        $resultat = 0;

        $db = connectDB();
        $Contribution_sur_situationAll = $db->prepare("SELECT * 
                                                FROM situation 
                                                INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user
                                                WHERE utilisateur.id_EGNOM = :id_egnom " );
        $Contribution_sur_situationAll->execute(array(
            ":id_egnom" => $id_EGNOM, 
        ));
      

        while ($data = $Contribution_sur_situationAll->fetch()) {
            $result = $result + 1;
        }

        $resultat = ($result * 100) / $count ;

        return $resultat;
    }
}

function statistique_avancer_cibler_terminer(){
    if(isset($_POST['selectCollaborateur_statistique'])){

        $id_EGNOM = $_POST['selectCollaborateur_statistique'];
        $count = 0;
        
        $db = connectDB();
        $situation_tous_terminer = $db->prepare("SELECT utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation, situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                        FROM situation 
                                        INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user
                                        WHERE utilisateur.id_EGNOM = :id_egnom AND situation.situation_etat = '0'" );
        $situation_tous_terminer->execute(array(
            ":id_egnom" => $id_EGNOM, 
        ));
      

        while ($data = $situation_tous_terminer->fetch()) {
            $count = $count + 1;
        }

        return $count;
    }     
}


?>