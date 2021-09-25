<?php
require_once('src/v/global/header.php')
?>


<div class="collab">
    <?php 
        include("navbar_collaborateur.php");
    ?>
    <div class="mainscreen">
        <h1> Compétences utilisées </h1>
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
                                    
                                    $CompetenceU = $TestManager->GetallCompetence($activiteC->get("activite_id_activite"), $activiteC->get("activite_id_bloc"));
                            
                            foreach($CompetenceU as $key => $CompetenceU){   
                                $isCompetencesUsed = isCompetencesUsed($CompetenceU->get("competence_id_competence"),$currentUser->get("id"));                                
                                $isUsed = "white;";
                                
                                
                                while ($dataC2 = $isCompetencesUsed->fetch()) {
                                    
                                    if(isset($dataC2)) {
                                        $isUsed = "rgb(169, 230, 174)";
                                         
                                    }
                                    
                                }

                                echo "<div style='margin: 0px; padding:5px; background-color:" . $isUsed . "'><input' name='". $CompetenceU->get("competence_id_competence") . "'> B"  . $activiteC->get("activite_id_bloc") . ".A" . $activiteC->get("activite_drawID") . ".C" . $CompetenceU->get("competence_drawID") . " - " . $CompetenceU->get("competence_nom") . "</div>";
                            }
                        }
                        echo "</td>";
                    ?>
                </tr>
            </table>
        </div>
    </div>

</div>