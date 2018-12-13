<?php

$dbh;

function connectToDb() {
    try {
	include("../login-db.php");
	global $dbh;
	$dbh = new PDO("mysql:host=localhost;dbname=holavoisin;charset=UTF8", $login, $pw);
    }
    catch ( PDOException $e ) {
	die('Impossible de se connecter à la base de donnée');
    }
}


function doQuery($sql) {
    global $dbh;
    if($dbh) {
	return $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>
