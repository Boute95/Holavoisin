<?php include("header.php"); ?>

<?php

if(isset($_SESSION['identifiant'])) {
    header('location: accueil.php');
}


include("db-login.php");
if(isset($_POST['identifiant']))
    $identifiant = $_POST['identifiant'];
if(isset($_POST['password']))
    $password = md5($_POST['password']);
$isUser = false;

$req = "SELECT * FROM utilisateur WHERE nom = '$identifiant' AND mdp = '$password'";
$res = $dbh->query($req);

foreach ($res as $tuple) {
    $isUser = true;
}

if($isUser) {
    if(!isset($_SESSION['identifiant'])) {
	echo "OOOOOOOOOOOOOOOOOOKKKKK";
	$_SESSION['identifiant'] = $identifiant;
    }
    header("location: accueil.php?inscrit&{$_SESSION['identifiant']}");
}
?>

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
		<?php if((isset($_POST['identifiant']) || isset($_POST['password']))
			 && !$isUser){
		    echo "<p class='erreur-connexion'>Identifiant ou mot de passe incorrect</p>";
		}
		?>
		<input class="row mt-4 mx-auto form-accueil-bouton" type="submit" id="connection" value="Connection">
		
	    </form>
	    
	</div>

    </div>
    
</header>




<?php include("footer.php"); ?>
