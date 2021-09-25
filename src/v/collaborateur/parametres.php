<?php
require_once('src/v/global/header.php')
?>
<div class="collab">
    <?php 
        include("navbar_collaborateur.php");
    ?>

    <div class="mainscreen">
        <h1> Paramètres</h1>

        <form action="index.php?ChangeOption=true" method="post">
            <div class="b">
                Cibler les competences voulue :

                <select name="liste" id="liste">
                    <option value="SISR">SISR</option>
                    <option value="SLAM">SLAM</option>
                    <option value="Toute">Toute</option>
                </select>

                <input type="submit" value="Selectionné"> <br>

                <?php
                    echo "(Vous ciblez actuellement les competences <strong>" . $currentUser->get("filliere") . "</strong>).";
                ?>
            </div>
        </form>
    </div>
</div>