<?php

include("header.php");

// Gets ad data
$id = $_GET['id'];
$adData = doQuery("SELECT * FROM objet WHERE id = $id");

$isSameAuthor = false;
if($isLogged && $adData['idVois'] == $_SESSION['utilisateur']) {
    $isSameAuthor = true;
}

?>


<style> body { background-color: #f2f2f2; }</style>

<header class="container-fluid header-annonces text-center">
    <h1 class="my-auto">Détails de l'annonce</h1>
</header>

<div class="container">
    
    <div class="mt-4 p-5 rounded bg-white">

	<div class="row m-3 mb-4">
	    
	    <div class="col-12 col-lg-7 justify-content-center">
		<h2 class="text-center mb-3">Titre annonce</h2>
		<img class=" mb-5 d-block mx-auto border" height="250" src="./uploads/propositions/objets/1.jpg" alt="" />
		<div class="row justify-content-center">
		    <button class="mx-2 button-holavoisin button-vert">Demander</button>
		    <?php if($isSameAuthor) { ?>
			<button class="mx-2 button-holavoisin button-violet">Supprimer l'annonce</button>
		    <?php } ?>
		</div>
	    </div>

	    <div class="col-12 col-lg-5 justify-content-center">
		<img class="d-block mx-auto w-100 h-100" src="./resources/img/map.jpeg" alt="" />
	    </div>

	</div>

	<div class="p-3 mt-4">
	    <div class="row">
		<h2>Qui propose ?</h2>
	    </div>
	    <div class="row mt-2 page-ad-voisin">
		<div class="page-ad-img-voisin mr-3" style="background-image: url('./uploads/utilisateurs/leonardo-dicaprio.jpg')"></div>
		<div class="page-ad-voisin-name my-auto">
		    <a href="#">Nom voisin</a>
		</div>
	    </div>
	</div>

	<div class="row p-3 mt-4">
	    <h2>Description</h2>
	    <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
	</div>
	
    </div>
</div>

<?php
include("footer.php");
?>
