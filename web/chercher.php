<?php
include("header.php");
?>

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

$req = 'SELECT * FROM objet;';
$res = doQuery($req);

?>

<div class="container">
    <div class="row my-5">
	<?php

	foreach ( $res as $tuple ) {
	?>
	    <div class="col-12 col-lg-4 mb-5">
		<a class="card mx-auto" style="max-width: 24rem;" href="#">
  		    <div class="card-img-top">
			<div class="card-img-top-child"
			     style="background-image: url(<?php echo $tuple['imagePath'] ?>);">
			</div>
		    </div>
  		    <div class="card-body">
			<h5 class="card-title"><?php echo $tuple['nom'];?></h5>
    			<p class="card-text">
			<?php echo $tuple['description'];?>
			<div class="row">
			    <p class="mx-auto mt-1 mb-0 card-prix"><?php echo $tuple['prix'];?>€</p>
			</div>
			</p>
		    </div>
		</a>
	    </div>
	<?php  }?>
    </div>
</div>






<?php include("footer.php"); ?>
