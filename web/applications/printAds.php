<?php

include "../db.php";
include "../../login-db.php";
connectToDb($login, $pw);
$type = $_GET['type'];
$s = $_GET['s'];
$ville = $_GET['v'];
$ads;

    $ads = doQuery("SELECT * FROM $type WHERE disponible AND (nom LIKE '%$s%' OR description LIKE '%$s%') AND (localisation LIKE '%$ville%');");

echo json_encode($ads);

?>
