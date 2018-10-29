<?php include("header.php"); ?>

<header class="container-fluid header-accueil">

    <div class="container">

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Inscrivez-vous pour echanger</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto inscription-form" method="post">

		<div class="row">

		    <div class="col-6">

			<label class="row">Identifiant</label>
			<input class ="row mb-2" type="text" name="identifiant" placeholder="Identifiant">

			<label class="row">Mot de passe</label>
			<input class="row mb-2" type="password" name="password" placeholder="Mot de passe">

			<label class="row">Adresse mail</label>
			<input class="row mb-2" type="mail" name="mail" placeholder="Mail">

		    </div>

		    <div class="col-6">

			<label class="row">Ville</label>
			<input class="row mb-2" type="text" name="ville" placeholder="Ville">

			<label class="row">Adresse</label>
			<input class="row mb-2" type="text" name="adresse" placeholder="Adresse">

		    </div>

		</div>
		
		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" id="inscription" value="S'inscrire">
		
	    </form>
	    
	</div>

    </div>
    
</header>
