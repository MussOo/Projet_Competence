<?php
    class SituationManager {
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }


        function getSituations(Situation $situation) {
            // Récupérations des situations
            $situations = $this->db->prepare("SELECT * FROM situation
            INNER JOIN contexte ON situation.situation_id_contexte = contexte.contexte_id_contexte WHERE situation_id_user = ?");
            $situations->execute(array(
                $situation->get("situation_id_situation"),
            ));

            while ($data = $situations->fetch()) {
                $list[] = new Situation($data);
            }
                
            if(isset($list)){ // si la table 
                return $list;
            }else{

            }
            
        
        }

        function DeleteSituation(Situation $situation){

            $req = $this->db->prepare("DELETE FROM liens WHERE lien_id_situation = ?");
            $req->execute(array(
                $situation->get("situation_id_situation")
            ));

            $req = $this->db->prepare("DELETE FROM viser WHERE viser_id_situation = ?");
            $req->execute(array(
                $situation->get("situation_id_situation")
            ));
            
            $req = $this->db->prepare("DELETE FROM situation WHERE situation_id_situation = ?");
            $req->execute(array(
                $situation->get("situation_id_situation")
            ));

            ?> 
            <script>
            document.location.href="index.php?gestion_situation=true?";
            </script>


            <?php
    }


        public function UpdateSituation($methode){

            // Récupération des données de bases
            $nom = htmlspecialchars($methode["nom_s"]);
            $contexte = htmlspecialchars($methode["contexte_s"]);
            $datedebut = htmlspecialchars($methode["datedebut_s"]);
            $duree = htmlspecialchars($methode["duree_s"]);
            $type_duree = htmlspecialchars($methode["type_duree_s"]);
            $details = htmlspecialchars($methode["details_s"]);
            $etat = htmlspecialchars($methode["etat_s"]);
            $itemNum = htmlspecialchars($methode["itemNum"]);

            // On supprime les anciens liens
            $req = $this->db->prepare("DELETE FROM liens WHERE lien_id_situation = ?");
            $req->execute(array(
                $_GET["editedSituation"]
            ));

            // Pour chaque élements on insert dans la table liens
            for ($i = 1; $i <= $itemNum; $i++) {
                $currentURL = $methode["url_" . $i];
                $currentDetail = $methode["detail_" . $i];
                if (isset($currentURL) and isset($currentDetail)) {
                    $req = $this->db->prepare("INSERT INTO liens(lien_URI, lien_details, lien_id_situation) VALUES (:URI, :details, :id_situation)");
                    $req->execute(array(
                        ":URI" => $currentURL,
                        ":details" => $currentDetail,
                        ":id_situation" => $_GET["editedSituation"]
                    ));
                }
            }

            // Récupération ID à partir du contexte
            $req = $this->db->prepare("SELECT contexte_id_contexte FROM contexte WHERE contexte_contexte = ?");
            $req->execute(array(
                $contexte
            ));

            while ($data = $req->fetch()) {
                $id_contexte = $data["contexte_id_contexte"];
            };

            // Envois des données dans la table situation
            $req = $this->db->prepare("UPDATE situation SET situation_nom = :nom, situation_date_debut = :date_debut, situation_date_creation = :date_creation, situation_duree = :duree, situation_type_duree = :type_duree, situation_details = :details, situation_id_contexte = :id_contexte, situation_etat = :etat WHERE situation_id_situation = :id_situation ");
            $req->execute(array(
                ":id_situation" => $_GET["editedSituation"],
                ":nom" => $nom,
                ":date_debut" => $datedebut,
                ":date_creation" => date('Y-m-d'),
                ":duree" => $duree,
                ":type_duree" => $type_duree,
                ":details" => $details,
                ":id_contexte" => $id_contexte,
                ":etat" => $etat,
            ));   
            
            ?>

            <script>document.location.href="index.php?gestion_situation=true";</script><?php
        }

        public function getSituationData(Situation $situation){

        $situationData = $this->db->prepare("SELECT * FROM situation WHERE situation_id_situation = ?");
        $situationData->execute(array(
            $situation->get("situation_id_situation")
        ));

        while ($data = $situationData->fetch()) {
            $listSituationID[] = new Situation($data);
        }

        return $listSituationID;
        
        }



        
        public function CreerSituation($id,$filliere,$methode){

            // Récupération des données de bases
        $nom = htmlspecialchars($methode["nom_s"]);
        $contexte = htmlspecialchars($methode["contexte_s"]);
        $datedebut = htmlspecialchars($methode["datedebut_s"]);
        $duree = htmlspecialchars($methode["duree_s"]);
        $type_duree = htmlspecialchars($methode["type_duree_s"]);
        $details = htmlspecialchars($methode["details_s"]);
        $itemNum = htmlspecialchars($methode["itemNum"]);

        // Récupération ID à partir du contexte
        $req = $this->db->prepare("SELECT contexte_id_contexte FROM contexte WHERE contexte_contexte = ?");
        $req->execute(array(
            $contexte
        ));

    

        while ($data = $req->fetch()) {
            $id_contexte = $data["contexte_id_contexte"];
        };

            // Envois des données dans la table situation
            $req = $this->db->prepare("INSERT INTO situation(situation_nom, situation_date_debut, situation_date_creation, situation_duree, situation_type_duree, situation_details, situation_id_contexte, situation_id_user, situation_filliere) VALUES 
            (:nom, :date_debut, :date_creation, :duree, :type_duree, :details, :id_contexte, :id_user, :Filliere) ");
            $req->execute(array(
                ":nom" => $nom,
                ":date_debut" => $datedebut,
                ":date_creation" => date('Y-m-d'),
                ":duree" => $duree,
                ":type_duree" => $type_duree,
                ":details" => $details,
                ":id_contexte" => $id_contexte,
                ":id_user" => $id,
                ":Filliere" => $filliere
            ));        

            sleep(2);

            // Récupération de l'ID de la situation via le nom
            $req1 = $this->db->prepare("SELECT situation_id_situation FROM situation WHERE situation_nom = :nom");
            $req1->execute(array(
                ":nom" => $nom  
            ));

            
            
            while ($data = $req1->fetch()) {
                
                $currentID = $data["situation_id_situation"];
            }

            sleep(1);

            $competencesData = $this->db->query("SELECT competence_id_competence FROM competences");
            while ($data = $competencesData->fetch()) {
                if(isset($methode[$data["competence_id_competence"]])) {
                    $req = $this->db->prepare("INSERT INTO viser VALUES (:id_situation, :id_competence)");
                    $req->execute(array(
                        ":id_situation" => $currentID,
                        ":id_competence" => $data["competence_id_competence"]
                    ));
                }
            }
            
            // Pour chaque élements on insert dans la table liens
            for ($i = 1; $i <= $itemNum; $i++) {
                $currentURL = $methode["url_" . $i];
                $currentDetail = $methode["detail_" . $i];
                if (isset($currentURL) and isset($currentDetail)) {
                    $req = $this->db->prepare("INSERT INTO liens(lien_URI, lien_details, lien_id_situation) VALUES (:URI, :details, :id_situation)");
                    $req->execute(array(
                        ":URI" => $currentURL,
                        ":details" => $currentDetail,
                        ":id_situation" => $currentID
                    ));
                }
            }
    
            sleep(1);

            header("Location: index.php?gestion_situation=true"); 

        }

        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
