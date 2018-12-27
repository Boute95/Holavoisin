<?php

include("header.php");


/**
 * @author Meriem Ameraoui
 * @author Alexis Breton
 *
 * Page de recherche d'annonce.
 *
 */

?>

<header class="container-fluid header-chercher text-center">

    <h1>Rechercher un bien ou un service</h1>
    
    <div class="row formulaire-chercher text-center px-3 px-lg-5 py-4">
	
	<div class="col-12 col-sm-6 col-lg-3 px-4 mx-auto mb-2 m-sm-auto">
	    <div class="row">
		<div class="col-6">
		    <label class="w-100 mb-0">Objet</label>
		    <input type="radio" name="type" value="objet" checked>
		</div>
		<div class="col-6">
		    <label class="w-100 mb-0">Service</label>
		    <input type="radio" name="type" value="service">
		</div>
	    </div>
	</div>

	<div class="col-12 col-sm-6 col-lg-3 px-4 mx-auto mb-2 m-sm-auto">
	    <input id="ville" class="form-chercher-item" type="text" placeholder="Ville">
	</div>

	<div class="col-12 col-sm-6 col-lg-3 px-4 mx-auto mb-2 m-sm-auto">
	    <input id="search" class="form-chercher-item" type="text" placeholder="Nom, mot-clef ...">
	</div>	

	<div class="col-12 col-sm-6 col-lg-3 px-4 mx-auto mb-2 m-sm-auto">
	    <button id="form-chercher-bouton" class="button-holavoisin button-violet form-chercher-item" onclick="printAds()">Chercher</button>
	</div>
	
    </div>


</header>


<div class="container">
    <div id="container-ads" class="row my-5"></div>
</div>


<?php include("footer.php"); ?>


<script>

 $(document).ready(function() {
     
     let urlParams = new URLSearchParams(window.location.search);
     if(urlParams.has('ville')) {
	 $('#ville').val(urlParams.get('ville'));
     }

     if(urlParams.has('mot-clef')) {
	 $('#search').val(urlParams.get('mot-clef'));
     }
     
     printAds();
     
 })
</script>
