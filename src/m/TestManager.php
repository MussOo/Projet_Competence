<?php
    class TestManager{
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }


        public function GetActivitecibler(Test $situationid){ // recuperer les activité d'une situation en fonction de sa filliere

            $req = $this->db->prepare("SELECT `situation_filliere` FROM  situation WHERE situation_id_situation = :lo");
                $req->execute(array(
                ":lo" => $situationid->get("situation_id_situation")
                ));
        
                while($data = $req->fetch()){
                    $filliere = $data['situation_filliere'];
                }

                if($filliere == "SLAM" OR $filliere == 'SISR'){
                    
                    $competences = $this->db->prepare("SELECT * FROM activite WHERE activite_filliere = :filliere");
                    $competences->execute(array(
                        ":filliere" => $filliere
                    ));
                    
                    
                }else{
                    $competences = $this->db->query("SELECT * FROM activite");
                    
                }

                while ($data = $competences->fetch()) {
                    $list[] = new Test($data);
                }
                                                                                                                                                                                                                                                                                                                                        
                return $list;

        }


        public function getCompetencesUpdate($id_activite, $id_bloc,$id_situation){ // recupere les competences dans l'ordre 

            $req = $this->db->prepare("SELECT `situation_filliere` FROM  situation WHERE situation_id_situation = :lo");
                $req->execute(array(
                ":lo" => $id_situation
                ));
        

            while($data = $req->fetch()){

                $filliere = $data['situation_filliere'];

            }

            if($filliere == "SLAM" OR $filliere == 'SISR'){
                
                $competences = $this->db->prepare("SELECT competence_nom, competence_drawID, competence_id_competence FROM competences
                INNER JOIN activite ON activite_id_activite = competence_id_activite
                WHERE activite_id_bloc = :id_bloc AND competence_id_activite = :id_activite AND competence_filliere = :filliere AND activite_filliere = :filliere");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc,
                    ":filliere" => $filliere
                ));
                
                
            }else{
                $competences = $this->db->prepare("SELECT competence_nom, competence_drawID, competence_id_competence FROM competences
                INNER JOIN activite ON activite_id_activite = competence_id_activite
                WHERE activite_id_bloc = :id_bloc AND competence_id_activite = :id_activite");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc
                    
                ));
                
                }

                while ($data = $competences->fetch()) {
                    $list[] = new Test($data);
                }
                                                                                                                                                                                                                                                                                                                                        
                return $list;
        }

        Public function GetallCompetence($id_activite, $id_bloc){ // recuperer toute les competences

            $filliere = $_SESSION['filliere'];

            if($filliere == "SLAM" OR $filliere == 'SISR'){
                
                $competences = $this->db->prepare("SELECT competence_nom, competence_drawID, competence_id_competence FROM competences
                INNER JOIN activite ON activite_id_activite = competence_id_activite
                WHERE activite_id_bloc = :id_bloc AND competence_id_activite = :id_activite AND competence_filliere = :filliere AND activite_filliere = :filliere");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc,
                    ":filliere" => $filliere
                ));
                
                
            }else{
                $competences = $this->db->prepare("SELECT competence_nom, competence_drawID, competence_id_competence FROM competences
                INNER JOIN activite ON activite_id_activite = competence_id_activite
                WHERE activite_id_bloc = :id_bloc AND competence_id_activite = :id_activite");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc
                    
                ));
                
                }

                while ($data = $competences->fetch()) {
                    $list[] = new Test($data);
                }
                                                                                                                                                                                                                                                                                                                                        
                return $list;
        }

        public function getSituationData($id_situation){ // cherche toute les situation pour l'affiché a l'utilisateur

            $situationData = $this->db->prepare("SELECT * FROM situation WHERE situation_id_situation = ?");
            $situationData->execute(array(
                $id_situation->get("situation_id_situation")
            ));


            while ($data = $situationData->fetch()) {
                $list[] = new Test($data);
            }
                                                                                                                                                                                                                                                                                                                                    
            return $list;
            
        }

        public function updateSituationCompetence($methode){ // envoie les modifications d'une situation
             
    
            $id_situation = $_GET["usedCompetencesSituation"];
    
            // Suppression de TOUTES les compétences de la situation
            $req = $this->db->prepare("DELETE  FROM viser WHERE viser_id_situation = :id_situation");
            $req->execute(array(
                ":id_situation" => $id_situation
            ));
    
            $competencesData = $this->db->query("SELECT competence_id_competence FROM competences");
            while ($data = $competencesData->fetch()) {
                if(isset($methode[$data["competence_id_competence"]])) {
                    $req = $this->db->prepare("INSERT INTO viser VALUES (:id_situation, :id_competence)");
                    $req->execute(array(
                        ":id_situation" => $id_situation,
                        ":id_competence" => $data["competence_id_competence"]
                    ));
                }
            }
            ?>
            <script>
            document.location.href="index.php?gestion_situation=true?";
            </script>
            <?php
        }

        function getCompetences($id_activite, $id_bloc) {  // recuperer toutes les competences en fonction du bloc et de l'activite
            
    
            $filliere = $_SESSION["filliere"];
    
    
            if(isset($filliere) && $filliere == "SLAM" OR $filliere == 'SISR'){
                
                $competences = $this->db->prepare("SELECT competence_nom, competence_drawID, competence_id_competence FROM competences
                INNER JOIN activite ON activite_id_activite = competence_id_activite
                WHERE activite_id_bloc = :id_bloc AND competence_id_activite = :id_activite AND competence_filliere = :filliere");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc,
                    ":filliere" => $filliere
                ));
                
                
            }else{
                $competences = $this->db->prepare("SELECT competences.competence_nom, competences.competence_drawID, competences.competence_id_competence FROM competences
                INNER JOIN activite ON activite.activite_id_activite = competences.competence_id_activite
                WHERE activite.activite_id_bloc = :id_bloc AND competences.competence_id_activite = :id_activite");
                $competences->execute(array(
                    ":id_activite" => $id_activite,
                    ":id_bloc" => $id_bloc
                    
                ));
                
                }
                
                while ($data = $competences->fetch()) {
                    $list[] = new Test($data);
                }
                                                                                                                                                                                                                                                                                                                                        
                return $list;
        }

        public function isCompetencesUsed($id_competences, $id_user) { // cherche les competence utilisé dans une situation
            
    
            $isUsed = $this->db->prepare("SELECT * FROM viser
            INNER JOIN situation ON situation_id_situation = viser_id_situation
            WHERE situation_id_user = :id_user AND viser_id_competence = :id_competence");
            $isUsed->execute(array(
                ":id_user" => $id_user,
                ":id_competence" => $id_competences
            ));
    
            return $isUsed;
        }

        public function GetallActivite() {
            
    
            $filliere = $_SESSION["filliere"];
    
            if(isset($filliere) && $filliere == "SLAM" OR $filliere == 'SISR'){
                $competences = $this->db->prepare("SELECT * FROM activite WHERE activite.activite_filliere = :filliere");
                $competences->execute(array(
                    ":filliere" => $filliere
                ));
    
                
            }else{
            
                $competences = $this->db->query("SELECT * FROM activite");
                
            }

            while ($data = $competences->fetch()) {
                $list[] = new Test($data);
            }
                                                                                                                                                                                                                                                                                                                                    
            return $list;
        }

        Public function Situation_Avancement(){       // recherche ciblé (Page : Avancement_Situation)
            // recupere tout les Collaborateur
    
            if(!isset($_POST['etat']) && !isset($_POST['selectCollaborateur'])){
    
                $AllSituation = $this->db->query("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation,  situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                            FROM situation 
                                            INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user");
            
                
            }elseif($_POST['etat'] === "tous" && $_POST['selectCollaborateur'] === ""){
                // afficher les situation de tout les collab
                $db = connectDB();
                $AllSituation = $this->db->query("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation,  situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                            FROM situation 
                                            INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user");
            
                
            }elseif($_POST['etat'] == "tous" && $_POST['selectCollaborateur'] !== ""){
                // afficher les situation dun collab
    
                $id_EGNOM = $_POST['selectCollaborateur'];
    
                $AllSituation = $this->db->prepare("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation,  situation.situation_date_creation as date_creation, situation.situation_etat as etat  
                                                FROM situation 
                                                INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user 
                                                WHERE utilisateur.id_EGNOM = :id_egnom" );
                $AllSituation->execute(array(
                    ":id_egnom" => $id_EGNOM 
                ));
            
                
            }elseif($_POST['etat'] == "0" && $_POST['selectCollaborateur'] == ""){
                //afficher les situation en cours de tout le monde
    
                $AllSituation = $this->db->query("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation,  situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                            FROM situation 
                                            INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user 
                                            WHERE situation.situation_etat = '0' ");
                
                
            }elseif($_POST['etat'] == "0" && $_POST['selectCollaborateur'] !== ""){
                //afficher les situation en cours dun collab
                
                $id_EGNOM = $_POST['selectCollaborateur'];
                $etat = $_POST['etat'];
    
                $AllSituation = $this->db->prepare("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation, situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                                FROM situation 
                                                INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user
                                                WHERE situation.situation_etat = :etat 
                                                AND utilisateur.id_EGNOM = :id_egnom" );
                $AllSituation->execute(array(
                    ":id_egnom" => $id_EGNOM, 
                    ":etat" => $etat
                ));
    
                
            }elseif($_POST['etat'] == "1" && $_POST['selectCollaborateur']  !== ""){
                //afficher les situation terminer dun collab
    
                $id_EGNOM = $_POST['selectCollaborateur'];
                $etat = $_POST['etat'];
    
                $AllSituation = $this->db->prepare("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation, situation.situation_date_creation as date_creation, situation.situation_etat as etat 
                                                FROM situation 
                                                INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user 
                                                WHERE utilisateur.id_EGNOM = :id_egnom 
                                                AND situation.situation_etat = :etat" );
                $AllSituation->execute(array(
                    ":id_egnom" => $id_EGNOM, 
                    ":etat" => $etat
                ));
    
                
            }elseif($_POST['etat'] == "1" && $_POST['selectCollaborateur'] == ""){
                //afficher les situation terminer de tous
    
                
                $AllSituation = $this->db->query("SELECT situation.situation_id_situation as id_situation, utilisateur.nom as nom_user, utilisateur.prenom as prenom_user, situation.situation_nom as nom_situation,  situation.situation_date_creation as date_creation, situation.situation_etat as etat
                                            FROM situation 
                                            INNER JOIN utilisateur ON utilisateur.id = situation.situation_id_user 
                                            WHERE situation.situation_etat = '1' ");
                
            
            }else{
                echo 'Une erreur est survenu';
            }

            while ($data = $AllSituation->fetch()) {
                $list[] = new Test($data);
            }
              
            if(isset($list)){
                return $list;
            }else{
                $list = array();
            }
        }

            

        

        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
