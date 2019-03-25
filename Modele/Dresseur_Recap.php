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
$login =

$login = $_POST['starter'];
$_SESSION['starter'] = $login;
$starter = $_SESSION['starter'];

echo "Bienvenue, " . $starter;
