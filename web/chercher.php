<?php
include("header.php");
?>

<header class="container-fluid header-chercher text-center">
    

    <h1>Rechercher un bien ou un service</h1>

    
    <div class="row formulaire-chercher text-center px-3 px-lg-5 py-4">
	
	<div class="col-3 px-4 m-auto">
	    <select class="form-chercher-item">
		<option value="choix1">Choix 1</option>
		<option value="choix2">Choix 2</option>
		<option value="choix3">Choix 3</option>
		<option value="choix4">Choix 4</option>
	    </select>
	</div>

	<div class="col-3 px-4 m-auto">
	    <input id="ville" class="form-chercher-item" type="text" placeholder="Ville">
	</div>

	<div class="col-3 px-4 m-auto">
	    <input id="search" class="form-chercher-item" type="text" placeholder="Nom, mot-clef ...">
	</div>	

	<div class="col-3 px-4 m-auto">
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
     printAds();
 })
</script>
