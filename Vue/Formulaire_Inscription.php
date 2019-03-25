<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="connection.css">
</head>
<body>
<h1>Inscription utilisateur</h1>



<form action="../Controleur/inscription.php" method="post">

    <div class="container">
        <label for="username"><b>Login : </b></label>
        <input type="text" placeholder="Nom d'utilisateur " name="username" id="username" required>

        <label for="password"><b>Mot de Passe</b></label>
        <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password" required>

        <label for="email"><b>email : </b></label>
        <input type="text" placeholder="email : " name="email" id="email" required>




        <?php
            require('../Modele/Requete.php');
            $db = connectBDD();
            choixPokemonStarter();
        ?>

        <button type="submit">S'inscrire </button>
    </div>


</form>
</body>
</html>