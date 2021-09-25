<?php

require("src/m/ActiviteManager.php");

class Activite{
    
    // Table users
    private $id_activite;  
    private $drawID;
    private $nom; 
    private $id_bloc;
    private $filliere;
   

    
    public function __construct($data) {
        $this->hydrate($data);
    }

    public function hydrate($data) {   
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Setters
    public function setId_activite($value) {
        $this->Id_activite = $value;
    }

    public function setDrawid($value) {
        $this->Drawid = $value;
    }

    public function setNom($value) {
        $this->Nom = $value;
    }

    public function setId_bloc($value) {
        $this->Id_bloc = $value;
    }

    public function setFilliere($value) {
        $this->Filliere = $value;
    }

   
    // Getters
    public function id_activite() {
        return $this->id_activite;
    }

    public function drawID() {
        return $this->drawID;
    }        
    public function nom() {
        return $this->nom;
    }
    
    public function id_bloc() {
        return $this->id_bloc;
    }
    
    public function filliere() {
        return $this->filliere;
    }
    
    

         
}
?>
