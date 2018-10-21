<?php include("header.php"); ?>

<header class="container-fluid header-accueil">

    <div class="container">

    <div class= "row">
	<div class="col-6">
	    <h1>Le coup de pouce du quotidien !</h1>
	    <p>500 000 voisins échangent au quotidien partout en France.</p>
	</div>

	<div class="col-6">
		<div class="formulaire mx-auto">
		<form method="post" action="">
		    <label class="row">Ville</label>
		    <select class="row mb-2" type="text" id="ville" name="ville" placeholder="">
		    	<option value="montpellier">Montpellier</option>
		    	<option value="paris">Paris</option>
		    	<option value="nice">Nice</option>
		    </select>

		    <label class="row">Catégorie</label>
		    <select class="row mb-2" type="text" id="catégorie" name="catégorie" placeholder="???">
		    	<option value="montpellier">Montpellier</option>
		    	<option value="paris">Paris</option>
		    	<option value="nice">Nice</option>
		    </select>

		    <div class= "row mt-4">
		    	<div class="col-6">
			    	<input class="mx-auto" type="submit" id="chercher" value="Chercher">
				</div>
				<div class="col-6">
			  		<input class="mx-auto" type="submit" id="proposer" value="Proposer">
				</div>
			</div>
		</form>
	</div>
	</div>
	
	</div>
    </div>

</header>

<?php include("footer.php"); ?>
