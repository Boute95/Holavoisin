<?php include("header.php"); ?>

<header class="container-fluid header-sous-page text-center">

    <h1>Rechercher un bien ou un service</h1>
    
</header>

<div class="container-fluid container-formulaire">
    <form class="row formulaire-sous-page text-center py-4">
	
	<div class="col-4 px-3">
	    <select class="my-auto">
		<option value="choix1">Choix 1</option>
		<option value="choix2">Choix 2</option>
		<option value="choix3">Choix 3</option>
		<option value="choix4">Choix 4</option>
	    </select>
	</div>

	<div class="col-4 px-3">
	    <input class="my-auto" type="text" name="ville" placeholder="Ville">
	</div>

	<div class="col-4 px-3">
	    <input type="submit" value="Chercher">
	</div>
	
    </form>
</div>



<?php include("footer.php"); ?>
