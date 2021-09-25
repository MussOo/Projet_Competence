<?php

require("src/m/LienManager.php");

class Lien {
    
    // Table users
    private $lien_id_liens;  
    private $lien_URI;
    private $lien_details;  
    private $lien_id_situation;

    
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
