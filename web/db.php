<?php

/**
 * @author Alexis Breton
 *
 * Script contenant quelques fonctions utiles liées à la BDD.
 *
 */


$dbh;

/**
 * Se connecte a la BDD.
 */
function connectToDb($login, $pw) {
    try {
	global $dbh;
	$dbh = new PDO("mysql:host=localhost;dbname=holavoisin;charset=UTF8", $login, $pw);
    }
    catch ( PDOException $e ) {
	die('Impossible de se connecter à la base de donnée');
    }
}

/**
 * Effectue une requete.
 * @param sql Requete SQL sous forme de chaine de caractères.
 * @return Tableau associatif du résultat de la requete.
 */
function doQuery($sql) {
    global $dbh;
    if($dbh) {
	$res = $dbh->query($sql);
	if($res) {
	    return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	return $res;
    }
}


?>
