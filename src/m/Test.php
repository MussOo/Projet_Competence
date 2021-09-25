<?php

require("src/m/TestManager.php");

class Test{
    
    // Table 
    private $bloc_id_bloc;  
    private $bloc_nom;

    private $activite_id_activite; 
    private $activite_drawID;
    private $activite_nom;
    private $activite_id_bloc; 
    private $activite_filliere;

    private $competence_id_competence; 
    private $competence_drawID;
    private $competence_nom;
    private $competence_id_activite;
    private $competence_filliere;

    private $viser_id_situation; 
    private $viser_id_competence;

    private $situation_id_situation ; 
    private $situation_nom; 
    private $situation_date_debut; 
    private $situation_details; 
    private $situation_date_creation; 
    private $situation_duree; 
    private $situation_type_duree; 
    private $situation_etat; 
    private $situation_id_contexte ; 
    private $situation_id_user ; 
    private $situation_filliere; 

    
    
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
