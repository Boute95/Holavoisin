<?php include("header.php"); ?>

<header class="container-fluid header-accueil">

    <div class="container">

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Connectez-vous pour echanger</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto connexion-form" method="post">

		<label class="row">Identifiant ou adresse mail</label>
		<input class ="row mb-2" type="text" name="identifiant" placeholder="Identifiant ou mail">

		<label class="row">Mot de passe</label>
		<input class="row mb-2" type="password" name="password" placeholder="Mot de passe">

		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" id="connection" value="Connection">
		
	    </form>
	    
	</div>

    </div>
    
</header>
    

<?php include("footer.php"); ?>
