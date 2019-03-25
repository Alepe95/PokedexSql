<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-23
 * Time: 23:00
 */


require('../Controleur/Requete.php');
$db = connectBDD();
include("../Vue/TabTrainer.html");
choixPokemonStarter();