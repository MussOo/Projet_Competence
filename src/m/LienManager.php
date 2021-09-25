<?php
    class LienManager {
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }

        public function getList(Lien $lien){

            $req = $this->db->prepare("SELECT * FROM liens WHERE lien_id_situation = ?");
            $req->execute(array(
                $lien->get("lien_id_situation")
            ));

            while ($data = $req->fetch()) {
                $list[] = new Lien($data);
            }
                
            if(isset($list)){
                return $list;
            }
            
        }

        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
