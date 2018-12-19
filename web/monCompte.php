<!---------------------------------------------------------------------------->
<!--                               SCRIPT PHP                              -->
<!---------------------------------------------------------------------------->

<?php

include("header.php");

if(!$isLogged) {
    header('location: accueil.php');
}

// Informations utilisateur //////////////////////////////////////////
$idUser = $_SESSION['idUser'];
$req = "SELECT * FROM utilisateur WHERE id='{$_SESSION['idUser']}'";
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

// Annonces proposées ///////////////////////////////////////////////
$userAds;
$userAds['service'] = doQuery("SELECT * FROM services WHERE idVois = $idUser AND disponible = FALSE");
$userAds['objet'] = doQuery("SELECT * FROM objet WHERE idVois = $idUser AND disponible = FALSE");
print_r($userAds['objet']);

// Modification mot de passe ////////////////////////////////////////
if(isset($_POST['ancienPassword']) && isset($_POST['password'])) {
    $ancienMdpSet = md5($_POST['ancienPassword']);
    $mdpSet = md5($_POST['password']);
    if(stristr($ancienMdpSet, $mdp)) {
	$reqModifMdp = "UPDATE utilisateur SET mdp='$mdpSet' WHERE id = $idUser'";
	$resModifMdp = doQuery($reqModifMdp);
    }

}

// Modification du mail ///////////////////////////////////////////
if(isset($_POST['mail'])) {
    
    $emailSet = $_POST['mail'];
    $reqModifEmail = "UPDATE utilisateur SET email='$emailSet' WHERE nom = id = $idUser'";
    $resModifEmail = doQuery($reqModifEmail);
    
}

// Modification de l'image ////////////////////////////////////////
/* if(isset($_POST['image'])) {
 *     
 *     $imageSet = $_FILES["image"];
 *     print($_FILES['image']);
 *     $target_dir = "../web/uploads/utilisateurs/";
 *     $imageFileType = strtolower(pathinfo(basename($imageSet["name"]),PATHINFO_EXTENSION));
 *     $target_file = $target_dir . $idUser . "." . $imageFileType;
 *     $uploadOk = 1;
 *     // Check if image file is an actual image or fake image
 *     if(isset($_POST["submit"])) {
 * 	$check = getimagesize($imageSet["tmp_name"]);
 * 	if($check !== false) {
 * 	    $uploadOk = 1;
 * 	} else {
 * 	    $uploadOk = 0;
 * 	}
 * 	// Check if file already exists
 * 	if (file_exists($target_file)) {
 * 	    echo "Sorry, file already exists.";
 * 	    $uploadOk = 0;
 * 	}
 * 	// Check file size
 * 	if ($imageSet["size"] > 500000) {
 * 	    echo "Sorry, your file is too large.";
 * 	    $uploadOk = 0;
 * 	}
 * 	// Allow certain file formats
 * 	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 * 	   && $imageFileType != "gif" ) {
 * 	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 * 	    $uploadOk = 0;
 * 	}
 * 
 * 	if ($uploadOk == 0) {
 * 	    echo "Sorry, your file was not uploaded.";
 * 	    // if everything is ok, try to upload file
 * 	} else {
 * 	    if (move_uploaded_file($imageSet["tmp_name"], $target_file)) {
 * 		echo "The file ". $target_file . " has been uploaded.";
 * 		$req="UPDATE utilisateur SET imagePath = '$target_file' WHERE id = $idUser";
 * 		$res = doQuery($req);
 * 	    } else {
 * 		echo "Sorry, there was an error uploading your file.";
 * 	    }
 * 	}
 *     }
 * 
 * }
 *  */




?>

<!---------------------------------------------------------------------------->
<!--                                  HTML                                 -->
<!---------------------------------------------------------------------------->

<header class="container-fluid pt-5 header-monCompte">

    <div class="row m-auto text-center justify-content-center">
    	<h2 class="nomUtilisateur my-auto mr-5"><?php echo "$prenom $nom" ?></h2>
        <div class="photoProfile ml-5"
             style="background-image: url('<?php echo $imagePath ?>')"></div>
    </div>

</header>


<div class="container">

    <div class="row mt-3">
	<h2>Services proposées en cours d'utilisation</h2>
    </div>

    <div class="row mt-3">
	
	<?php foreach($userAds['service'] as $tuple) { ?>
	    <div class='col-12 col-lg-4 mb-5'>
		<a class='card mx-auto' style='max-width: 24rem;'
		   href='<?php echo "page-ad.php?type=service&id={$tuple['id']}"; ?>'>
  		    <div class='card-img-top'>
			<div class='card-img-top-child'
			     style='background-image:url(<?php echo $tuple['imagePath'];?>)'>
			</div>
		    </div>
  		    <div class='card-body'>
			<h5 class='card-title'><?php echo $tuple['nom']; ?></h5>
    			<div class='card-text'>
			    <div class='row mb-2 font-italic pb-2 border-bottom border-secondary'>
				<div class='col-6'><?php echo $tuple['date']; ?></div>
				<div class='col-6'><?php echo $tuple['localisation'];?></div>
			    </div>
			    <div class='row'>
				<div class='mx-auto mt-2 mb-0 card-prix'>
				    <?php echo $tuple['prix']; ?>€</div>
			    </div>
			</div>
		    </div>
		</a>
	    </div>
	<?php }	?>
	
    </div>

    <div class="row mt-3">
	<h2>Objets proposées en cours de location</h2>
    </div>

    <div class="row mt-3">
	
	<?php foreach($userAds['objet'] as $tuple) { ?>
	    <div class='col-12 col-lg-4 mb-5'>
		<a class='card mx-auto' style='max-width: 24rem;'
		   href='<?php echo "page-ad.php?type=objet&id={$tuple['id']}"; ?>'>
  		    <div class='card-img-top'>
			<div class='card-img-top-child'
			     style='background-image:url(<?php echo $tuple['imagePath'];?>)'>
			</div>
		    </div>
  		    <div class='card-body'>
			<h5 class='card-title'><?php echo $tuple['nom']; ?></h5>
    			<div class='card-text'>
			    <div class='row mb-2 font-italic pb-2 border-bottom border-secondary'>
				<div class='col-6'><?php echo $tuple['date']; ?></div>
				<div class='col-6'><?php echo $tuple['localisation'];?></div>
			    </div>
			    <div class='row'>
				<div class='mx-auto mt-2 mb-0 card-prix'>
				    <?php echo $tuple['prix']; ?>€</div>
			    </div>
			</div>
		    </div>
		</a>
	    </div>
	<?php }	?>
	
    </div>
    
    <div class= "row mt-3">
	<form class="form-monCompte" method="post">

	    <div class="row my-3">
		<h2>Editez votre profil</h2>
	    </div>
	    
	    <div class="row my-3 align-items-center">
		<div class="col-6">
		    <label>Ancien mot de passe</label>
		    <input  type="password" name="ancienPassword" placeholder="Mot de passe">
		</div>
		<div class="col-6">
		    <label>Mot de passe</label>
		    <input type="password" name="password" placeholder="Mot de passe">
		</div>
	    </div>

	    <div class="row my-3  align-items-center">
		<label>Adresse mail</label>
		<input type="mail" name="mail" placeholder="Mail" value="<?php echo $email; ?>">
	    </div>
	    
	    <div class="row my-3  align-items-center">
		<div class="col-6">
		    <label>Ville</label>
		    <input  type="text" name="ville" placeholder="Ville" value="">
		</div>
		<div class="col-6">
		    <label>Adresse</label>
		    <input type="text" name="adresse" placeholder="Adresse" value="">
		</div>
	    </div>

	    <!-- <div class="row my-3  align-items-center">
		 <label>Image(s)</label>
		 <input type="file" name="image"/>
		 </div> -->

	    <div class="row my-3">
		<input class="form-accueil-bouton" type="submit" name="submit" id="inscription" value="Mettre à jour">
	    </div>
	    
	</form>
    </div>
</div>

<?php include("footer.php"); ?>
