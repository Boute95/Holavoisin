<?php

include("header.php");

if(!isset($_SESSION['identifiant'])) {
    header('location: accueil.php');
}

$req = "SELECT * FROM utilisateur WHERE nom='{$_SESSION['identifiant']}'";
$res = doQuery($req);
$mdp;
$email;
$prenom;
$nom;
$imagePath;
foreach($res as $tuple) {
    $mdp = $tuple['mdp'];
    $email = $tuple['email'];
    $prenom = $tuple['prenom'];
    $nom = $tuple['nom'];
    $imagePath = $tuple['imagePath'];
}

$ancienMdpSet = md5($_POST['ancienPassword']);
$mdpSet = md5($_POST['password']);
$emailSet = $_POST['mail'];

if(stristr($ancienMdpSet, $mdp) && !empty($mdpSet)) {
    $reqModifMdp = "UPDATE utilisateur SET mdp='$mdpSet' WHERE nom = '{$_SESSION['identifiant']}'";
    $resModifMdp = doQuery($reqModifMdp);
}

if(!empty($email)) {
    $reqModifEmail = "UPDATE utilisateur SET email='$emailSet' WHERE nom = '{$_SESSION['identifiant']}'";
    $resModifEmail = doQuery($reqModifEmail);
}

?>

<header class="container-fluid header-accueil">

    <div class="container">

      <div class="row mx-auto my-4 text-center">
    	    <h1 class="mx-auto"><?php echo "$prenom $nom" ?></h1>
    	</div>

      <div class="row mx-auto my-4 text-center">
        <img src="<?php echo $imagePath ?>">
    	</div>

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Editez votre profil</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto inscription-form" method="post">

		<div class="row">

		    <div class="col-6">

			<label class="row">Ancien mot de passe</label>
			<input class="row mb-2" type="password" name="ancienPassword" placeholder="Mot de passe">

			<label class="row">Mot de passe</label>
			<input class="row mb-2" type="password" name="password" placeholder="Mot de passe">

			<label class="row">Adresse mail</label>
			<input class="row mb-2" type="mail" name="mail" placeholder="Mail" value="<?php echo $email; ?>">

		    </div>

		    <div class="col-6">

			<label class="row">Ville</label>
			<input class="row mb-2" type="text" name="ville" placeholder="Ville" value="">

			<label class="row">Adresse</label>
			<input class="row mb-2" type="text" name="adresse" placeholder="Adresse" value="">

		    </div>

		</div>

		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" name="inscription" id="inscription" value="Mettre à jour">

	    </form>

	</div>

    </div>

</header>

<?php include("footer.php"); ?>
