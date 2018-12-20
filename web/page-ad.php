<?php

include("header.php");

// Gets ad data
$id = $_GET['id'];
$type = $_GET['type'];
$res = doQuery("SELECT idVois, $type.nom AS nomAd, utilisateur.nom, utilisateur.imagePath, $type.imagePath AS imgAd, description, prenom, prix  FROM $type, utilisateur WHERE idVois = utilisateur.id AND $type.id = $id");
$adData = $res[0];

// Test if the user is the same as the creator of the ad
$isSameAuthor = false;
if($isLogged && $adData['idVois'] == $_SESSION['idUser']) {
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
		<h2 class="text-center mb-3"><?php echo $adData["nomAd"]; ?></h2>
		<img class=" mb-5 d-block mx-auto border" height="250" src="<?php echo $adData['imgAd']; ?>" alt="" />
		<div class="text-center mx-auto mb-3"><?php echo $adData['prix']; ?>€</div>
		<div class="row mb-3 justify-content-center">
		    <?php if($isLogged) { ?>
			<a class="mx-2 button-holavoisin button-vert" href="<?php echo "applications/useAd.php?type=$type&id=$id&idSeller={$adData['idVois']}&prix={$adData['prix']}&idBuyer={$_SESSION['idUser']}";?>">
			    <?php
			    if($type == 'objet')
				echo "Louer";
			    else
				echo "Demander le service";
			    ?>
			</a>
		    <?php  } else { ?>
			Vous devez etre connecté pour pouvoir répondre à une annonce
		    <?php } if($isSameAuthor) { ?>
			<a class="mx-2 button-holavoisin button-rouge" href="<?php echo "applications/deleteAd.php?type=$type&id=$id"; ?>">Supprimer l'annonce</a>
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
		<div class="page-ad-img-voisin mr-3" style="background-image: url('<?php echo $adData['imagePath']; ?>')"></div>
		<div class="page-ad-voisin-name my-auto">
		    <a href="#"><?php echo $adData['prenom'] . ' ' . $adData['nom']; ?></a>
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
