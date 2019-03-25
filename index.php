<?php
session_start();  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Accueil du site</title>
</head>
<body>
<?php
if (isset($login) && isset($mdp)) {
    echo "Bienvenue, " . $login . ". Votre mot de passe est " . $mdp . ".";
    echo "<h1>Accueil du site</h1>";
    echo '<a href="./Modele/Liste_Pokemon.php">Afficher la liste de tous les pokemons ?</a>';
}
else { ?>
    <p>L'accès à cette page est réservé aux utilisateurs authentifiés</p>
    <p><a href="./Vue/login.html">Se connecter</a></p>
    <p><a href="./Vue/inscription.html">Créer un compte ?</a></p>
<?php }

?>
</body>
</html>