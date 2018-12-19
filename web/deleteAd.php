<?php

include "header.php";
$id = $_GET['id'];
$type = $_GET['type'];

$resDelete = doQuery("DELETE FROM $type WHERE id = $id");

header("location: chercher.php");

?>
