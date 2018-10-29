<?php include("../login-db.php");

try {
$dbh = new PDO("mysql:host=localhost;dbname=holavoisin;charset=UTF8", $login, $pw);
}

catch ( PDOException $e ) {
die('Impossible de se connecter à la base de donnée');
}

?>
