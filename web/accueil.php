<?php

/**
 * @author Meriem Ameraoui
 * @author Alexis Breton
 *
 * Page d'accueil du site
 *
 */

include("header.php");

?>

<header class="container-fluid header-accueil">

    <div class="container">

	<div class= "row my-auto">

	    <div class="col-12 col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
		<h1>Le coup de pouce du quotidien !</h1>
		<p>500 000 voisins échangent au quotidien partout en France.</p>
	    </div>

	    <div class="col-12 col-lg-6">
		<div class="formulaire mx-auto">
		    <form method="get" action="chercher.php">
			<label class="row">Ville</label>
			<input class="row mb-2 form-accueil-item" type="text" name="ville" placeholder="Ville">

			<label class="row">Mot-clef</label>
			<input class="row mb-2 form-accueil-item" type="text" name="mot-clef" placeholder="Nom, catégorie, ...">

			<div class= "row mt-4">
			    <input class="col-12 mx-auto form-accueil-bouton" type="submit" id="chercher" value="Chercher">
			</div>

			<div class="row mt-4 text-dark justify-content-center">Ou</div>
			
			<div class="row mt-4">
			    <a class="col-12 mx-auto button-holavoisin button-violet text-center" id="proposer" href="./proposer.php">
				Proposer
			    </a>
			</div>
			
		    </form>
		</div>

	    </div>

	</div>
    </div>

</header>


<div id="bg-accueil-assombri"></div>

<div id="message-user-inscrit" class="msg-accueil p-5">
    <div class="row text-center mb-3">
	<p>Bonjour, cela fait plaisir de vous retrouver !</p>
    </div>
    <div class="row">
	<button class="px-3 py-2 mx-auto" onclick="enleverMsg()">Continuer</button>
    </div>
</div>

<div id="message-proposition" class="msg-accueil p-5">
    <div class="row text-center mb-3">
	<p>Merci ! Votre proposition a bien été enregistrée !</p>
    </div>
    <div class="row">
	<button class="px-3 py-2 mx-auto" onclick="enleverMsg()">Continuer</button>
    </div>
</div>


<?php include("footer.php"); ?>
