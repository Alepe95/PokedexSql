<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-18
 * Time: 14:16
 */
require('../Controleur/Requete.php');


$nbPokemon =  get_nombrePokemon();
$db = connectBDD();

echo '<a href="../index.php">Retour accueil ? </a> <br>';
echo "voici le nombre de Pokémon présent dans le pokédex : ".get_nombrePokemon()."<br>";
echo get_informationPokemon(1);


include("../Vue/Tab.html");
get_allPokemon();
if(isset($_GET['id'])){
    $pokemon_id = $_GET['id'];
    drop_Pokemon($pokemon_id);
    reload();
}
?>


