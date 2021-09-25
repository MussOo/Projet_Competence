<?php
require_once('src/v/global/header.php')
?>

<div class="admin">
    <?php 
        include("navbar_administrateur.php");
    ?>

    <div class="mainscreen">
        <div class="box_admin_arondie_statistique">
            <div>
                <H1 style="margin-top:0px;"> Statistiques général </H1>
            </div>
            <div>
                <span>Terminé :</span> <strong>
                    <?php echo Situation_tous_terminer(); ?> <br>
                </strong>
                <span>En cours :</span> <strong>
                    <?php echo Situation_tous_encour(); ?> <br>
                </strong>
                <span>Toutes les situations :</span> <strong>
                    <?php echo Situation_tous(); ?> <br>
                </strong>
            </div>
        </div>

        <div class="box_admin_arondie_statistique" style="margin-top:1%;">
            <H1 style="margin-top:0px;"> Statistiques visée </H1>
            <form method="post" action="">

                <label for="name">Collaborateur à viser :</label>
                <input list="selectCollaborateur" name="selectCollaborateur_statistique" type="text"
                    id="choix_Collaborateur">


                <br>
                <input type="submit" name='find' value="Viser">
            </form>
            <br>

            <span>Terminé :</span> <strong>
                <?php echo statistique_avancer_cibler_terminer(); ?> <br>
            </strong>
            <span>En cours :</span> <strong>
                <?php echo statistique_avancer_cibler_encours(); ?> <br>
            </strong>
            <span>Contributions :</span> <strong>
                <?php echo Contribution_sur_situationAll(); ?>%<br>
            </strong>
        </div>
    </div>