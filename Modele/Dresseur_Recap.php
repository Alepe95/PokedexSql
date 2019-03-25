<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-24
 * Time: 23:40
 */

require('../Controleur/Requete.php');
include("../Vue/header.html");


$db = connectBDD();
$id = $_SESSION['trainer'][0][0];


PokemonTrainer($id);


if(isset($_GET['id'])){
    $pokemon_id = $_GET['id'];
    drop_Pokemon($pokemon_id);
    reload();
}

