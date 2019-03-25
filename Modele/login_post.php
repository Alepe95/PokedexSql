<?php
  // démarrage d'une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    require '../Controleur/Requete.php';
    $bdd = ConnectBDD();
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM trainer WHERE email=? AND password=?";
    $resultat = $bdd->prepare($requete);
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $resultat->execute(array($login, $mdp));
    if ($resultat->rowCount() == 1) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        // cette variable indique que l'authentification a réussi
        $authOK = true;
    }
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de l'authentification</title>
</head>
<body>

<h1>Résultat de l'authentification</h1>
<?php
if (isset($authOK)) {

    echo "<p>Vous êtes bien connectés à votre pokedex " . ($login) . "</p>";
    echo '<a href="../index.php">Poursuivre vers la page d\'accueil</a>';
    include('./Liste_Pokemon.php');
}
else { ?>
    <p>Vous n'avez pas été reconnu(e)</p>
    <p><a href="../Vue/login.html">Nouvel essai</p>
<?php } ?>
</body>
</html>