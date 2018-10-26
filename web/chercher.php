<?php include("header.php"); ?>

<header class="container-fluid header-chercher text-center">
    

    <h1>Rechercher un bien ou un service</h1>

    
    <form class="row formulaire-chercher text-center px-3 px-lg-5 py-4">
	
	<div class="col-4 px-4 m-auto">
	    <select class="form-chercher-item">
		<option value="choix1">Choix 1</option>
		<option value="choix2">Choix 2</option>
		<option value="choix3">Choix 3</option>
		<option value="choix4">Choix 4</option>
	    </select>
	</div>

	<div class="col-4 px-4 m-auto">
	    <input class="form-chercher-item" type="text" name="ville" placeholder="Ville">
	</div>

	<div class="col-4 px-4 m-auto">
	    <input id="form-chercher-bouton" class="form-chercher-item form-chercher-button" type="submit" value="Chercher">
	</div>
	
    </form>


</header>


<?php

include("../login-db.php");

try {
    $dbh = new PDO("mysql:host=localhost;dbname=holavoisin;charset=UTF8", $login, $pw);
}

catch ( PDOException $e ) {
    die('Impossible de se connecter à la base de donnée');
}

$req = 'SELECT * FROM services;';
$res = $dbh->query( $req );

?>

<div class="container">
    <div class="row my-5">
	<?php

	foreach ( $res as $tuple ) {
	?>
	    <div class="col-4">
		<a class="card" style="max-width: 21rem;" href="#">
  		    <img class="card-img-top" src="um.png" alt="image service">
  		    <div class="card-body">
			<h5 class="card-title"><?php echo $tuple['nom'];?></h5>
    			<p class="card-text"><?php echo $tuple['description'];?></p>
		    </div>
		</a>
	    </div>
	<?php  }?>
    </div>
</div>






<?php include("footer.php"); ?>
