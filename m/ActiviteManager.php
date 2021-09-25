<?php
    class ActiviteManager{
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }


        public function GetActivitecibler($id_situation){

            $req = $this->db->prepare("SELECT `filliere` FROM  situation WHERE id_situation = :lo");
                $req->execute(array(
                ":lo" => $id_situation
                ));
        
                while($data = $req->fetch()){
                    $filliere = $data['filliere'];
                }

                if($filliere == "SLAM" OR $filliere == 'SISR'){
                    
                    $competences = $this->db->prepare("SELECT * FROM activite WHERE activite.filliere = :filliere");
                    $competences->execute(array(
                        ":filliere" => $filliere
                    ));
                    
                    
                }else{
                    $competences = $this->db->query("SELECT * FROM activite");
                    
                }

                while ($data = $competences->fetch()) {
                    $list[] = new Activite($data);
                }
                                                                                                                                                                                                                                                                                                                                        
                return $list;
        }


        public function GetActiviteUpdate($id_situation){

            $req = $this->db->prepare("SELECT `filliere` FROM  situation WHERE id_situation = :lo");
                $req->execute(array(
                ":lo" => $id_situation
                ));
        
                while($data = $req->fetch()){

                    $filliere = $data['filliere'];
        
                }

        if($filliere == "SLAM" OR $filliere == 'SISR'){
            
            $competences = $this->db->prepare("SELECT * FROM activite WHERE activite.filliere = :filliere");
            $competences->execute(array(
                ":filliere" => $filliere
            ));
            
            return $competences;
        }else{
            $competences = $this->db->query("SELECT * FROM activite");
            return $competences;
        }
        }


        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
