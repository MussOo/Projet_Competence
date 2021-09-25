<?php
    class ContexteManager{

        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }
   

        public function GetContexte(){

            $contexte = $this->db->query('SELECT * FROM contexte');

            while ($data = $contexte->fetch()) {
                $list[] = new Contexte($data);
            }
                
            return $list;
        }
        
        public function GetContextecible($id_situation){

            $situationData = $this->db->prepare("SELECT * FROM situation WHERE situation_id_situation = ?");
            $situationData->execute(array(
            $id_situation
            
        ));


            while ($data = $situationData->fetch()) {
                $list[] = new Contexte($data);
            }
                
            return $list;
        }

        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
