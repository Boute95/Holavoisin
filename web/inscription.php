<?php

include("header.php");

if(isset($_POST['nom']))
    $nom = $_POST['nom'];
if(isset($_POST['password']))
    $password = md5($_POST['password']);
if(isset($_POST['mail']))
    $mail = $_POST['mail'];
if(isset($_POST['ville']))
    $ville = $_POST['ville'];
if(isset($_POST['adresse']))
    $adresse = $_POST['adresse'];
$isUser = false;
$inscriptionOk = false;

if (isset($_POST["inscription"])
    && !empty($nom)
    && !empty($password)
    && !empty($mail)
    && !empty($ville)) {
    $inscriptionOk = true;
}

$reqtest = "SELECT * FROM utilisateur WHERE email='$mail'; ";
$restest = doQuery($reqtest);

foreach($restest as $tuple){
    $isUser = true;
}

if(!$isUser && $inscriptionOk){
    $req = "INSERT INTO utilisateur(nom,mdp,email) values ('$nom','$password','$mail');";
    $res = doQuery($req);
    header('location: accueil.php?inscrit');

}

?>


<header class="container-fluid header-accueil">

    <div class="container">

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Inscrivez-vous pour échanger</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto inscription-form" method="post">

		<?php
		if(isset($_POST["inscription"]) && !$inscriptionOk) {
		    echo "<p class='erreur-connexion text-center'>Veuillez entrer tous les champs obligatoires</p>";
		}

		if($isUser) {
		    echo "<p class='erreur-connexion text-center'>Utilisateur ou mail déja existant !</p>";
		}

		?>

		<div class="row">

		    <div class="col-6">

			<label class="row">Nom*</label>
			<input class ="row mb-2" type="text" name="nom" placeholder="Nom">

			<label class="row">Mot de passe*</label>
			<input class="row mb-2" type="password" name="password" placeholder="Mot de passe">

			<label class="row">Adresse mail*</label>
			<input class="row mb-2" type="mail" name="mail" placeholder="Mail">

		    </div>

		    <div class="col-6">

			<label class="row">Ville*</label>
			<input class="row mb-2" type="text" name="ville" placeholder="Ville">

			<label class="row">Adresse</label>
			<input class="row mb-2" type="text" name="adresse" placeholder="Adresse">

		    </div>

		</div>

		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" name="inscription" id="inscription" value="S'inscrire">

	    </form>

	</div>

    </div>

</header>

<?php include("footer.php") ?>
