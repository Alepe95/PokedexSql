<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-25
 * Time: 13:20
 */

require '../Controleur/Requete.php';
$login = $_POST['username'];
$mdp = $_POST['password'];
$mail = $_POST['email'];

$starter = $_POST['starter'];
echo ('Bonjour '.$login . ' votre compte est bien créer');
AjoutDresseur($login, $mdp, $mail, $starter);
