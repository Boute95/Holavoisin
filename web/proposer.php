<?php include("header.php"); ?>

<?php
session_start();
?>

<header class="container-fluid header-accueil">

    <div class="container">

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Proposez un objet ou un service à vos voisins</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto inscription-form" method="post">

		<div class="row">

		    <div class="col-12">

      <input type="radio" name="ObjetService" id="objet" />
      <label>Objet</label>

      <input type="radio" name="ObjetService" id="cervice" />
      <label>Service</label><br/>

			<label class="row">quel est l'objet ou le services que vous proposer?</label>
			<input class="row mb-2" type="text" name="nomOS" placeholder="Adresse">

      <label class="row">Prix</label>
      <input type="range" value="15" max="50" min="0" step="1">
		    </div>

		</div>

		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" name="inscription" id="inscription" value="S'inscrire">

	    </form>

	</div>

    </div>

</header>

<?php include("footer.php") ?>
