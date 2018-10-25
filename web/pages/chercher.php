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

use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;

$entityManager = $this->getDoctrine()->getManager();

echo 'TEST';

?>



<?php include("footer.php"); ?>
