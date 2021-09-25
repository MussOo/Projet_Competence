<?php
require_once('src/v/global/header.php')
?>

<div class="admin">
    <?php 
        include("navbar_administrateur.php");
    ?>

    <div class="mainscreen">

        <div class="box_admin_table">

            <H1> Avancement Situation </H1>

            <form method="post" action="">
                <label for="pet-select">Etat :</label>

                <select name="etat" id="pet-select">
                    <option value="tous"> Tous </option>
                    <option value="0">En cours</option>
                    <option value="1">Terminé</option>
                </select>


                Collaborateur :
                <input list="selectCollaborateur" name="selectCollaborateur" type="text" id="choix_Collaborateur">



                <input type="submit" name='find' value="Rechercher">
            </form>

            <br> <br>

            <table class="situations">
                <tr class="topLine">
                    <td class="situations"> Collaborateur </th>
                    <td class="situations"> Nom </th>
                    <td class="situations"> Compétences mobilisées </th>
                    <td class="situations"> Date de création</th>
                    <td class="situations"> Etat (Situation) </th>
                </tr>

                <?php
                if(isset($AllSituation)){
                    foreach($AllSituation as $key => $data){
                    
                        ?>
                <tr>
                    <td class="situations" style="background:white;">
                        <?php echo $data->get("nom_user") . " " . $data->get("prenom_user") ?> </td>
                    <td class="situations" style="background:white;"> <?php echo $data->get("nom_situation") ?> </td>
                    <td class="situations" style="background:white;"> <a
                            href="index.php?Competence_mobiliser=true&amp;id_situation= <?php echo $data->get("id_situation") ?>"
                            onclick="window.open(this.href); return false;"> <button>Compétences</button> </a></td>
                    <td class="situations" style="background:white;"> <?php echo $data->get("date_creation") ?> </td>
                    <td class="situations" style="background:white;"> <?php echo Etat_convertion($data->get("etat"))?>
                    </td>
                </tr>

                <?php }
                }else{
                    echo '';
                }
                 ?>
            </table>

        </div>

    </div>
</div>

</html>