<?php include("header.php"); ?>

<?php
session_start();
include("db-login.php");
?>

<header class="container-fluid header-accueil">

    <?php

    if(isset($_SESSION['identifiant'])) {

    ?>

	<div class="container">

	    <div class= "row my-auto">

        <div class="form-proposer formulaire mx-auto px-5 py-4 inscription-form" id="form-type">
			<div class="row">
			    <h2 class="mb-4">Que proposez-vous?</h2>
			</div>
			<div class="row">
			    <div class="col-6 text-center">
				<input type="radio" name="ObjetService" id="type-objet" checked />
				<label>Objet</label>
			    </div>
			    <div class="col-6 text-center">
				<input type="radio" name="ObjetService" id="type-service" />
				<label>Service</label><br/>
			    </div>
			</div>
			<div class="row">
			    <div id="continuer1" class="row mt-4 mx-auto button-holavoisin button-violet">
				Continuer  <i class="ml-2 fas fa-1x fa-angle-right"></i>
			    </div>
			</div>
		    </div>

		    <form class="form-proposer formulaire px-5 py-4 inscription-form" id="form-objet">
			<div class="row">
			    <h2 class="text-center mx-auto mb-3">Décrivez votre objet<h2>
			</div>
			<div class="container">
			    <div class="row mb-2">
				<label class="col-6">Nom de l'objet</label>
				<input class="col-6 mb-2" type="text" name="objet" placeholder="nom objet" required/>
			    </div>
			    <div class="row mb-2">
				<div class="col-6">
				    <label>Location</label>
				    <input type="radio" name="LocationVente" id="location" checked/>
				</div>
				<div class="col-6">
				    <label>Vente</label>
				    <input type="radio" name="LocationVente" id="vente" />
				</div>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Prix</label>
				<input class="col-6" type="text" name="prix" placeholder="prix" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Localisation</label>
				<input class="col-6" type="text" name="localisation" placeholder="Localisation" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Image(s)</label>
         <input type="file" name="image"/>
			    </div>

			    <div class="row mb-2">
				<div class="row mx-auto button-holavoisin button-violet retour">
				    <i class="mr-2 fas fa-1x fa-angle-left"></i> Retour
				</div>
				<button class="mx-auto button-holavoisin button-vert" type="submit" value="Valider">
				    Valider<i class="ml-2 fas fa-1x fa-check"></i>
				</button>
			    </div>

			</div>
    </form>

		    <form class="form-proposer formulaire px-5 py-4 inscription-form" id="form-service">
			<div class="row">
			    <h2 class="text-center mx-auto mb-3">Décrivez votre service<h2>
			</div>
			<div class="container">
			    <div class="row mb-2">
				<label class="col-6">Nom de du service</label>
				<input class="col-6 mb-2" type="text" name="objet" placeholder="Nom service" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Prix</label>
				<input class="col-6" type="text" name="prix" placeholder="Prix" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Localisation</label>
				<input class="col-6" type="text" name="localisation" placeholder="Localisation" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Image(s)</label>
        <input type="file" name="image"/>
			    </div>

			    <div class="row mb-2">
				<div class="row mx-auto button-holavoisin button-violet retour">
				    <i class="mr-2 fas fa-1x fa-angle-left"></i> Retour
				</div>
				<button class="mx-auto button-holavoisin button-vert" type="submit" value="Valider">
				    Valider<i class="ml-2 fas fa-1x fa-check"></i>
				</button>
			    </div>

			</div>
		    </div>

		</form>
	    </div>
	</div>

    <?php }
    else {
    ?>

	<div class="container">
	    <div id="msg-inscription-necessaire"
		 class="row mx-auto my-4 text-center fond-blanc">
		<div class="row m-0 mb-4">
		    Vous devez être inscrit pour pouvoir proposer un objet ou service
		</div>
		<div class="row w-100 mx-auto justify-content-around">
		    <a class="button-holavoisin button-vert" href="./inscription.php">
			Devenir membre
		    </a>
		    <a class="button-holavoisin button-violet" href="./connexion.php">
			Se connecter
		    </a>
		</div>

	    </div>
	</div>

    <?php } ?>

</header>


<?php



  $isObject = false;
  $isService = false;
  if(isset($_POST['objet']) {
    $isObject = true;
  }
  if(isset($_POST['service']) {
    $isService = true;
  }

  if($isObject) {
    $req = "INSERT INTO object (nom, prix, localisation)
    VALUES ($_POST['objet'], $_POST['prix'], $_POST['localisation']);
  }

 ?>

<?php include("footer.php") ?>
