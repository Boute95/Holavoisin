<?php

/**
 * @author Meriem Ameraoui
 *
 * Script qui effectue les requetes lors d'une utilisation d'une annonce.
 *
 */

include "header.php";
$id = $_GET['id'];
$type = $_GET['type'];
$idSeller = $_GET['idSeller'];
$prix = $_GET['prix'];
$idBuyer = $_GET['idBuyer'];


$resDelete = doQuery("UPDATE $type SET disponible = FALSE WHERE id = $id");
$resCagnotteUpdate = doQuery("UPDATE utilisateur SET cagnotte = cagnotte - $prix WHERE id = $idBuyer;");
$resCagnotteUpdate2 = doQuery("UPDATE utilisateur SET cagnotte = cagnotte + $prix WHERE id = $idSeller;");

header("location: chercher.php");

?>
