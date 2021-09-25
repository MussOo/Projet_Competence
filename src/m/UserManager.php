<?php
    class UserManager {
        private $db;

        public function __construct(PDO $db) {
            $this->setDB($db);
        }


        public function getList(){

            $req = $this->db->query("SELECT * FROM utilisateur");

            while ($data = $req->fetch()) {
                $users[] = new User($data);
            }

            return $users;

        }


        public function Create(User $user){


            $req = $this->db->prepare("INSERT INTO utilisateur(id_EGNOM, nom, prenom, mdp, type_de_compte) VALUES(:id_EGNOM, :nom, :prenom, :mdp, 'collaborateur')");
            $req->execute(array(
                ":id_EGNOM" => $user->get("id_EGNOM"),
                ":prenom" => $user->get("prenom"),
                ":nom" => $user->get("nom"),
                ":mdp" => $user->get("mdp")
            ));

            ?>
            <script>alert('Merci,votre compte a bien été créé')</script>
            <?php
        }

        public function Connexion($identifiant, $pwd){

            $connect = $this->db->query('SELECT * FROM utilisateur'); // Requête SQL : on selectionne tout les users
            $found = false;

            while ($data = $connect->fetch()) {
                if ($identifiant == $data['id_EGNOM'] and $pwd == $data['mdp']) {
                    // Si le login et le mdp sont bon alors :
                    $found = true; // Un utilisateur a été trouvé
                    return $data; // On retourne les données
                }
            }

            if (!$found) {
                // Si a un utilisateur n'a été trouvé :
                echo "Login ou mot de passe incorrect <br>";
                echo "<a href='index.php'> Retour à l'accueil </a>";
                unset($_SESSION["login"]);

                return NULL;
            }

            
        }

        public function GetFilliere($id_user){
           
        
            $req = $this->db->prepare("SELECT `filliere` FROM  utilisateur WHERE id = :lo ");
                    $req->execute(array(
                    ":lo" => $id_user
                    )); 
    
                    while ($data = $req->fetch()) {
                        $list[] = new User($data);
                    }
                        
                    return $list;
        }


        public function ChangeOption($methode){

            // Récupération des données de bases
            $option = $methode["liste"];
            $login = $_SESSION["username"];
            $pwd = $_SESSION["pwd"];
    
    
            $req = $this->db->prepare("UPDATE `utilisateur` SET `filliere`=(:filliere) WHERE id_EGNOM = :lo AND mdp = :pwd");
                    $req->execute(array(
                    ":filliere" => $option,
                    ":lo" => $login,
                    ":pwd" => $pwd
                    )); 
    
                    echo '<script language=javascript> alert(\'Vous avez choisie '. $option.'\'); </script> ';
                    ?> 
                    <script>
                    document.location.href="index.php?";
                    </script>
                    
                    <?php
        }
        

        public function setDB(PDO $db) {
            $this->db = $db;
        }

    }
?>
