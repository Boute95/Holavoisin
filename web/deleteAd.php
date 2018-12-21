<?php

/**
 * @author Alexis Breton
 *
 * Script qui supprime une annonce de la base de données.
 *
 */

include "header.php";
$id = $_GET['id'];
$type = $_GET['type'];

$resDelete = doQuery("DELETE FROM $type WHERE id = $id");

header("location: chercher.php");

?>
