<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-23
 * Time: 23:00
 */


require('../Modele/Requete.php');
$db = connectBDD();
include("../Vue/TabTrainer.html");
choixPokemonStarter();