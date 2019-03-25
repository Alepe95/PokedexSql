<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-24
 * Time: 23:40
 */

require('../Modele/Requete.php');
include("../Vue/header.html");

echo '<a href="../index.php">Retour accueil ? </a> <br>';
$db = connectBDD();
$id = $_SESSION['trainer'][0][0];


PokemonTrainer($id);


if(isset($_GET['id'])){
    $pokemon_id = $_GET['id'];
    drop_Pokemon($pokemon_id);
    reload();
}

