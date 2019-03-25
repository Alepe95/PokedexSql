<?php session_start();
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-18
 * Time: 10:39
 */



function ConnectBDD(){
    $user = "pokegame";
    $password = "pokegame";

    try{
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=pokegame', $user, $password);
    }
    catch(Exception $e){
        echo "Échec : " . $e->getMessage();
    }
    return $db;
}



function get_allPokemon(){
    $db = connectBDD();

        $query = 'SELECT * FROM pokemon_type';
        $arr = $db->query($query)->fetchAll();
    foreach ($arr as $key => $value) {
        echo "<tr >
                  <td>#$value[0]</td>
                  <td>$value[1]</td>
                   <td><a href='./detail.php?id=$value[0]'>Details</a></td>
                   <td><a href='./Liste_Pokemon.php?id=$value[0]'>Supprimer</a></td>
              </tr>";
    }
        return $arr;
}

function get_nomPokemon(){
    $db = connectBDD();

        $res = $db->prepare("SELECT id,nom FROM pokemon_type ");
        $res->execute();
        $res = $res->fetchAll();
        print_r($res);
        return $res;

}


function get_nombrePokemon(){
    $db = connectBDD();

    $res = $db->prepare("SELECT count(nom) FROM pokemon_type");
    $res->execute();
    $res = $res->fetchColumn();
    return $res;

}

function get_informationPokemon($id){
    $db = connectBDD();

    $res = $db->prepare("SELECT * FROM elementary_type where id = $id");
    $res->execute();
    $res = $res->fetchColumn();
    return $res;

}

function drop_Pokemon($id){
    $db = connectBDD();


    $res = $db->prepare("Delete FROM pokemon_type where id = $id");
    $res->execute();
    $res = $res->fetchColumn();
    return $res;
}

function reload()
{
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./Liste_Pokemon.php">';
    exit;
}


/**
 * Nettoie une valeur insérée dans une page HTML
 * Doit être utilisée à chaque insertion de données dynamique dans une page HTML
 * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
 * @param string $valeur Valeur à nettoyer
 * @return string Valeur nettoyée
 */
function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function AjoutDresseur($id, $username, $password, $email, $Is_active, $nb_piece, $starter_id){
    $db = connectBDD();

    $query = 'INSERT INTO trainer (id, username, password, email, is_active, nb_pieces, starter_id) VALUES ($id, $username, $password, $email, $Is_active, $nb_piece, $starter_id)';

}
function choixPokemonStarter(){
    $db = connectBDD();

    $query = 'SELECT * FROM ref_Pokemon where starter = 1';
    $arr = $db->query($query)->fetchAll();

    foreach ($arr as $key => $value) {
        echo "
            
            <tr >
                  <td>#$value[0]</td>
                  <td>$value[1]</td>
                  <td><input type='radio' id='starter' name='starter' value='starter'> <label for='starter'>Starter ?</label></td>   
            </tr>";
    }
    echo " </table>";
    echo "<a href='./dresseur.php?id=$value[0]'>OK</a>";


    return $arr;
}
?>
