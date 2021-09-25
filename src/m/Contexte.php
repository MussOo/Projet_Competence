<?php

require("src/m/ContexteManager.php");

class Contexte{
    
    // Table users
    private $contexte_id_contexte;  
    private $contexte_contexte;


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
