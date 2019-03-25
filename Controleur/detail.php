<?php

/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 2019-03-19
 * Time: 00:55
 */


require('../Modele/Requete.php');
include("../Vue/header.html");
$db = connectBDD();
$pokemon_id = $_GET['id'];

?>





</html>
<table class='table table-secondary'>
    <thead class="thead-dark">
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>evolution</th>
        <th>Starter</th>
        <th>Experience</th>
    </tr>
    </thead>

    <?php
    $query = "SELECT * FROM ref_pokemon where id = $pokemon_id";
    $arr = $db->query($query)->fetch();

        echo "<tr >
                  <td>$arr[0]</td>
                   <td>$arr[1]</td>
                    <td>$arr[2]</td>
                     <td>$arr[3]</td>
                      <td>$arr[4]</td>
                  
              </tr>";

    ?>

    <a href="../index.php">Poursuivre vers la page d'accueil</a>
</table>

