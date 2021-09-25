<?php

require("src/m/SituationManager.php");

class Situation {
    
    // Table users
    private $situation_id_situation;  
    private $situation_nom;
    private $situation_date_debut; 
    private $situation_details;
    private $situation_date_creation;
    private $situation_duree;
    private $situation_type_duree;
    private $situation_etat;
    private $situation_id_contexte;
    private $situation_id_user;
    private $situation_filliere;
    private $itemNum;
    
    public function __construct($data) {
        $this->hydrate($data);
    }


    public function hydrate($data) {   
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }


    public function set($key, $value) {
        $this->$key = $value;
    }

    public function get($key) {
        return $this->$key;
    }

         
}
?>
