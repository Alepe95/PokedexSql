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
        $query = 'SELECT * FROM ref_Pokemon';
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
        $res = $db->prepare("SELECT id,nom FROM ref_pokemon ");
        $res->execute();
        $res = $res->fetchAll();
        print_r($res);
        return $res;
}


function get_nombrePokemon(){
    $db = connectBDD();
    $res = $db->prepare("SELECT count(nom) FROM ref_pokemon");
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


    $res = $db->prepare("Delete FROM ref_pokemon where id = $id");
    $res->execute();
    $res = $res->fetchColumn();
    return $res;
}

function reload()
{
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./Liste_Pokemon.php">';
    exit;
}


function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function AjoutDresseur( $username, $password, $email, $starter_id){
    $db = connectBDD();
    $active = 1;
    $nbPiece = 5000;
    $res = $db->prepare("INSERT INTO trainer  VALUES (NULL,:username, :password, :email, :active,:nbPiece , :starter_id)");

    $query1 = "select max(id) as id from trainer";
    $prep = $db->query($query1)->fetch()['id'];


    $res->execute(array(
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'active' => $active,
        'nbPiece' => $nbPiece,
        'starter_id' => $starter_id
    ));
    $query2 = $db->prepare("insert into pokemon () VALUES(NULL,$starter_id, 'm',0,5,0,0,0,$prep)");


    $query2->execute();



}


function connexion(){
    if (isset($_POST['login']) && isset($_POST['mdp'])) {
        $bdd = ConnectBDD();
        $requete = "SELECT * FROM trainer WHERE email=? AND password=?";
        $resultat = $bdd->prepare($requete);
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        //$resultat ->fetchAll();



        $resultat->execute(array($login, $mdp));
        if ($resultat->rowCount() == 1) {
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['trainer'] = $resultat ->fetchAll();
            $id = $_SESSION['trainer'][0][0];
            $authOK = true;
        }
    }
    if (isset($authOK)) {
        echo "<p>Bonjour " . ($login) . " Vous êtes bien connectés à votre pokedex </p></br>";
        echo '<a href="../index.php">Poursuivre vers la page d\'accueil</a>';
    }
    else {
        echo "<p>Vous n'avez pas été reconnu(e)</p>";
        echo '<p><a href="../Vue/login.html">Nouvel essai</p>';
    }
}

function choixPokemonStarter(){
    $db = connectBDD();
    $query = 'SELECT * FROM ref_Pokemon where starter = 1';
    $arr = $db->query($query)->fetchAll();

    echo "Choix du starter :  <select name='starter'>";
    foreach ($arr as $key => $value) {
       echo "
            <option value=$value[0]>$value[1]</option>
             </tr>
             ";
    }
    echo "</select>";


    return $arr;
}


function PokemonTrainer($id){
    $db = connectBDD();
    echo "<tr >Les Pokémons présents dans le Pokédex sont : ";
    include('../Vue/tabTrainer.html');
    $query = "SELECT ref_pokemon.id,nom,niveau FROM ref_pokemon INNER JOIN pokemon ON ref_pokemon.id=pokemon.ref_pokemon_id AND pokemon.dresseur_id= '$id'";

    $arr = $db->query($query)->fetchAll();
    foreach ($arr as $key => $value) {
        echo "<tr >
                  <td>$value[0]</td>
                  <td>$value[1]</td>
                  <td>$value[2]</td>
                  <td><a href='./detail.php?id=$value[0]'>Details</a></td>

              </tr>";


    }


    return $arr;
}


function nombrePiece($id){

    $db = connectBDD();

    $res = $db->prepare("SELECT nb_pieces from trainer where id='$id'");
    $res->execute();
    $res = $res->fetchColumn();
    return $res;
}
?>
