<!---------------------------------------------------------------------------->
<!--                               SCRIPT PHP                              -->
<!---------------------------------------------------------------------------->

<?php

include("header.php");

if(!isset($_SESSION['identifiant'])) {
    header('location: accueil.php');
}

$req = "SELECT * FROM utilisateur WHERE nom='{$_SESSION['identifiant']}'";
$res = doQuery($req);
$idutilisateur = -1;
$mdp;
$email;
$prenom;
$nom;
$imagePath;
foreach($res as $tuple) {
    $idutilisateur = $tuple["id"];
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

$target_dir = "../web/uploads/utilisateurs/";
$imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
$target_file = $target_dir . $nom . $idutilisateur . "." . $imageFileType;
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
	$uploadOk = 1;
    } else {
	$uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
    }

    if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
    } else {
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
	    echo "The file ". $target_file . " has been uploaded.";
	    $req="UPDATE utilisateur SET imagePath = '$target_file' WHERE id = $idutilisateur";
	    $res = doQuery($req);
	} else {
	    echo "Sorry, there was an error uploading your file.";
	}
    }
}

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
    <div class= "row my-auto">
	<form class="mx-auto form-monCompte" method="post">

	    <div class="row mx-auto my-4 text-center">
		<h1 class="mx-auto">Editez votre profil</h1>
	    </div>
	    
	    <div class="row my-3 justify-content-center align-items-center">
		<div class="col-6">
		    <label>Ancien mot de passe</label>
		    <input  type="password" name="ancienPassword" placeholder="Mot de passe">
		</div>
		<div class="col-6">
		    <label>Mot de passe</label>
		    <input type="password" name="password" placeholder="Mot de passe">
		</div>
	    </div>

	    <div class="row my-3 justify-content-center align-items-center">
		<label>Adresse mail</label>
		<input type="mail" name="mail" placeholder="Mail" value="<?php echo $email; ?>">
	    </div>
	    
	    <div class="row my-3 justify-content-center align-items-center">
		<div class="col-6">
		    <label>Ville</label>
		    <input  type="text" name="ville" placeholder="Ville" value="">
		</div>
		<div class="col-6">
		    <label>Adresse</label>
		    <input type="text" name="adresse" placeholder="Adresse" value="">
		</div>
	    </div>

	    <div class="row my-3 justify-content-center align-items-center">
		<label>Image(s)</label>
		<input type="file" name="image"/>
	    </div>

	    <div class="row my-3 justify-content-center">
		<input class="mx-auto form-accueil-bouton" type="submit" name="inscription" id="inscription" value="Mettre à jour">
	    </div>
	    
	</form>
    </div>
</div>

    <?php include("footer.php"); ?>
