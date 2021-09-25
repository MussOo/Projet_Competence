<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Suivi de compétences SIO</title>
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="icon" type="image/png" href="public/image/logo.png" />
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="public/script/main.js"></script>


</head>

<div class="header">
    COMPETENCES
</div>

<div class="collab">
    <?php 
        include("navbar_collaborateur.php");
    ?>

    <div class="mainscreen">
        <h1> Gestion des situations professionnelles </h1>

        <?php
            if (!isset($_GET["situationToEdit"]) and !isset($_GET["usedCompetencesSituation"]) or isset($_GET["updateSituationCompetence"])) {
        ?>
        <table class="situations">
            <tr class="topLine">
                <td class="situations" style="font-size:15px; text-align:center; width: 10%; color:white;">
                    <strong>Créée le</strong></td>
                <td class="situations" style="font-size:15px; text-align:center; width: 49.5%; color:white;"><strong>Nom
                        de la situation</strong></td>
                <td class="situations" style="font-size:15px; text-align:center; width: 10%;color:white; ">
                    <strong>Contexte</strong></td>
                <td class="situations" style="font-size:15px; text-align:center; width: 16%;color:white; ">
                    <strong>Durée</strong></td>
                <td class="situations" style="font-size:15px; text-align:center; width: 6%;color:white; ">
                    <strong>Etat</strong></td>
                <td class="situations" style="width: 10.5%;">&nbsp;</td>
            </tr>

            <?php
                    if(isset($ListSituation)){
                        foreach($ListSituation as $key => $situation){
                            ?>
            <tr>
                <td class="situations"> <?php echo $situation->get("situation_date_creation") ?> </td>
                <td class="situations" style="text-align:left;">
                    <?php echo "<strong> Nom : </strong>" . $situation->get("situation_nom") . "<br><strong>Détails : </strong>" . $situation->get("situation_details") ?>
                </td>
                <td class="situations"> <?php echo $situation->get("contexte_contexte") ?> </td>
                <td class="situations">
                    <?php echo $situation->get("situation_duree") . " " . $situation->get("situation_type_duree") . " à partir du " . $situation->get("situation_date_creation") ?>
                </td>
                <td class="situations"> <?php echo Etat_convertion($situation->get("situation_etat")) ?> </td>
                <td class="situations"><a
                        href="?gestion_situation=true&amp;situationToDelete=<?php echo $situation->get("situation_id_situation") ?>"><img
                            src="https://image.flaticon.com/icons/png/512/49/49854.png" height="30px"
                            alt="Supprimer"></a>
                    <a
                        href="?gestion_situation=true&amp;situationToEdit=<?php echo $situation->get("situation_id_situation") ?>"><img
                            src="http://simpleicon.com/wp-content/uploads/pencil.png" height="30px" alt="Editer"></a>
                    <acronym title="Voir les compétences utilisées">
                        <a
                            href="?gestion_situation=true&amp;usedCompetencesSituation=<?php echo $situation->get("situation_id_situation") ?>"><img
                                src="https://img.icons8.com/ios/452/development-skill.png" height="30px"
                                alt="Editer"></a>
                    </acronym>
                </td>
            </tr>
            <?php }

                    }else{
                        echo ' ';
                    }
                     
                     ?>
        </table>
        <?php 
            } elseif (!isset($_GET["usedCompetencesSituation"])) { 

                

                foreach($situationData as $key => $situation){ 
        ?>
        <form class="mainscreen" method="post"
            action="index.php?gestion_situation=true&amp;editedSituation=<?php echo $situation->get("situation_id_situation") ?>">
            <table style="width:100%">
                <tr>
                    <td class="left">Nom de la situation :</td>
                    <td class="right"><input name="nom_s" type="text"
                            value="<?php echo $situation->get("situation_nom") ?>"></td>
                </tr>

                <tr>
                    <td class="left">Contexte :</td>
                    <td class="right">

                        <select name="contexte_s">
                            <?php
                                 // Récupération des contextes via bdd
                                 foreach($ContexteList as $key => $contexte){  
                                    if ($contexte->get("contexte_id_contexte") == $situation->get("situation_id_contexte")) {
                                        echo "<option selected>" . $contexte->get("contexte_contexte") . "</option>"; // Affichage du nom du contexte dans une option
                                    }
                                    echo "<option>" . $contexte->get("contexte_contexte") . "</option>"; // Affichage du nom du contexte dans une option
                                    
                                }
                            ?>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td style="height:10px"></td>
                </tr>

                <tr>
                    <td class="left">Date de début :</td>
                    <td class="right"> <input type="date" name="datedebut_s"
                            value="<?php echo $situation->get("situation_date_debut") ?>"> </td>
                </tr>

                <tr>
                    <td class="left">Durée :</td>
                    <td class="right">
                        <input style="width:5%" type="number" name="duree_s"
                            value="<?php echo $situation->get("situation_duree") ?>">
                        <?php echo $situation->get("situation_type_duree") ?>
                        <select name="type_duree_s">
                            <option>jour(s)</option>
                            <option>semaine(s)</option>
                            <option>mois</option>
                            <option>an(s)</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td style="height:10px"></td>
                </tr>

                <tr>
                    <td class="left">Détails :</td>
                    <td class="right"><input name="details_s" type="text"
                            value="<?php echo $situation->get("situation_details") ?>"></td>
                </tr>

                <tr>

                    <td class="left">Etat de la situation :</td>
                    <td class="right">
                        <select name="etat_s">
                            <option value="0">En cours</option>
                            <option value="1">Terminé</option>
                        </select>
                    </td>
                </tr>
            </table>

            <h2 class="center"> <br>
                Anciennes ressources :
            </h2>

            <?php

            if(isset($LiensList)){
                foreach($LiensList as $key => $ListLien){   
                    
                    ?>
            <div class="box_grise">
                URL : <strong> <a target="_blank" href="<?php echo $ListLien->get("lien_URI") ?>">
                        <?php echo $ListLien->get("lien_URI") ?> </a> <br></strong>
                Détails : <strong> <?php echo $ListLien->get("lien_details") ?> <br></strong>
            </div> <br>
            <?php
                        }         
                }
                ?>
            <h2 class="center">
                Nouvelles ressources : <br>
                (Vous devez retaper les anciennes ressources)
            </h2>

            <div id="boxLiens">
                <input id="itemNum"></input>
            </div>

            <?php
            if(isset($LiensList)){
                foreach($LiensList as $key => $ListLien){
            ?>
            <script>
                initLien()
            </script>
            <?php
                }
            }               
            ?>

            <br>

            <div class="center">
                <button class="center" type="button" onclick="initLien()">
                    <img src="https://cdn.pixabay.com/photo/2016/12/21/17/11/signe-1923369_1280.png" alt="" width="50"
                        height="50">
                </button>
            </div>


            <br> <br>
            <div class="center">
                <input type="submit" style="font-size:16px; padding:20px; border-radius: 30px;" name="updateSituation"
                    value="Envoyer">
            </div>
        </form>
        <?php }} else { ?>
        <form method="post"
            action="index.php?gestion_situation=true&amp;updateSituationCompetence=true&amp;usedCompetencesSituation=<?php echo $_GET["usedCompetencesSituation"] ?>">
            <div class="tablecompetences">
                <table class="situations" style="width: 100%;">
                    <tr class="topLine">
                        <td class="situations" style="font-size:20px; text-align:center; width:40%; color:white;">
                            Compétences</td>
                    </tr>
                    <?php            
                    
                    
                        foreach($Activitecibler as $key => $activiteC){

                            echo "
                                <tr>
                                    <td style='padding:0px; text-align:left;' class='situations'>
                                    <div style='text-align:center; border-bottom: 1px solid black; background-color:lightgrey; padding:5px;'> B" . $activiteC->get("activite_id_bloc") . ".A" . $activiteC->get("activite_drawID") . " - " . $activiteC->get("activite_nom") . "</div>";
                                    

                                    
                            $CompetenceUpdate = $TestManager->getCompetencesUpdate($activiteC->get("activite_id_activite"), $activiteC->get("activite_id_bloc"),$_GET["usedCompetencesSituation"]);
                            foreach($CompetenceUpdate as $key => $CompetenceU){   
                                $isUsed = "white;";
                                $isChecked = ""; 
                                
                                $isCompetencesUsedSituation = isCompetencesUsedSituation($CompetenceU->get("competence_id_competence"),$_GET["usedCompetencesSituation"]);
                                while ($dataC2 = $isCompetencesUsedSituation->fetch()) {
                                    
                                    if(isset($dataC2)) {
                                        $isUsed = "rgb(169, 230, 174)";
                                        $isChecked = "checked";
                                    }
                                    
                                }

                                echo "<div style='margin: 0px; padding:5px; background-color:" . $isUsed . "'><input " . $isChecked . " type='checkbox' name='". $CompetenceU->get("competence_id_competence") . "'> B"  . $activiteC->get("activite_id_bloc") . ".A" . $activiteC->get("activite_drawID") . ".C" . $CompetenceU->get("competence_drawID") . " - " . $CompetenceU->get("competence_nom") . "</div>";
                               
                            }
                        }
                        echo "</td>";
                    ?>
                    </tr>
                </table>

                <br>

                <div class="center">
                    <button class="center" type="submit" style="font-size:16px; padding:20px; border-radius: 30px;"
                        onclick="openForm()">Envoyer</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>