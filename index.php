<?php
  // démarrage d'une session
require('./Modele/Requete.php');
$db = connectBDD();
// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];
    $id = $_SESSION['trainer'][0][0];
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
    echo "vous avez : ". nombrePiece($id)." pièces à depenser !</br>";
    echo '<a href="Controleur/Liste_Pokemon.php">Afficher la liste de tous les pokemons ?</a></br>';
    echo '<a href="Controleur/Dresseur_Recap.php">Afficher la liste de tous les pokemons vous appartenant ?</a>';
}
else { ?>
    <p>L'accès à cette page est réservé aux utilisateurs authentifiés</p>

    <p><a href="./Vue/login.html">Se connecter</a></p>
    <p><a href="./Vue/Formulaire_Inscription.php">Créer un compte ?</a></p>
<?php }

?>
</body>
</html>