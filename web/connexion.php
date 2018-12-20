<?php

/**
 * @author Meriem Ameraoui
 * @author Alexis Breton
 *
 * Page du formulaire de connection.
 *
 */


include("header.php");

if($isLogged) {
    header('location: accueil.php');
}

if (isset($_POST['nouveauMembre'])) {
    header('location: inscription.php');
}


$mail = "";
$password = "";
$idUser = "";

if(isset($_POST['mail']))
    $mail = $_POST['mail'];
if(isset($_POST['password']))
    $password = md5($_POST['password']);

$isUser = false;

$req = "SELECT * FROM utilisateur WHERE email = '$mail' AND mdp = '$password'";
$res = doQuery($req);


foreach($res as $tuple) {
    $isUser = true;
    $idUser = $tuple['id'];
}

if($isUser) {
    $_SESSION['idUser'] = $idUser;
    header("location: accueil.php?inscrit&{$res['prenom']}");
}

?>

<header class="container-fluid header-accueil">

    <div class="container">

	<div class="row mx-auto my-4 text-center">
	    <h1 class="mx-auto">Connectez-vous pour échanger</h1>
	</div>

	<div class= "row my-auto">

	    <form class="formulaire mx-auto connexion-form" method="post">

		<label class="row text-center">Adresse mail</label>
		<input class ="row mb-3 mx-auto" type="text" name="mail" placeholder="Mail">

		<label class="row text-center">Mot de passe</label>
		<input class="row mb-3 mx-auto" type="password" name="password" placeholder="Mot de passe">
		<?php if((isset($_POST['mail']) || isset($_POST['password']))
			 && !$isUser){
		    echo "<p class='erreur-connexion'>Mail ou mot de passe incorrect</p>";
		}
		?>
		<div class= "row mt-4">
		    <div class="col-6">
			<input class="mx-auto form-accueil-bouton" type="submit" id="connection" value="Connection">
		    </div>
		    <div class="col-6">
			<input class="mx-auto form-accueil-bouton" type="submit" name="nouveauMembre" id="nouveauMembre" value="Nouveau Membre?">
		    </div>
		</div>

	    </form>

	</div>

    </div>

</header>


<?php include("footer.php"); ?>
