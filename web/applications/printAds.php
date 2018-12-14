<?php

include "../db.php";
include "../../login-db.php";
connectToDb($login, $pw);
$type = $_GET['type'];
$search = $_GET['s'];
$ads;

if($search == "") {
    $ads = doQuery("SELECT * FROM $type");
}
else {
    $ads = doQuery("SELECT * FROM $type WHERE nom LIKE '%$search%' OR description LIKE '%$search%' OR categorie LIKE '%$search%';");
}

echo json_encode($ads);


?>
