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

<body>
    <form class="formulaire" method="POST" action="index.php?Okcreate" name="creation_compter" id="creation_compter">
        <div>
        <a href="?">Retour vers l'espace connexion</a>
        <h1>Creation Compte</h1>
            <div>
                Nom <br>
                <input name="nom" type="text" id="nom"><br>
                Prenom <br>
                <input name="prenom" type="text" id="prenom"><br><br><br>
            </div>
            <div>
                Identifiant : <br>
                <input name="identifiant" type="text" id="identifiant"><br>
                Mot de passe : <br>
                <input name="pwd" type="password" id="pwd"><br>
                réécrire le Mot de passe : <br>
                <input name="Repwd" type="password" id="Repwd"><br><br>

            </div>
            <div id="pwdDivR"></div>

            <div> <br><br><br>
                <button onclick='checkRegister()' type="button">Creer</button>
            </div>

        </div>
    </form>
</body>

</html>