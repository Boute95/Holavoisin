<?php include("header.php"); ?>

<?php
include("db-login.php");
?>

<header class="container-fluid header-accueil">

    <?php

    if(isset($_SESSION['identifiant'])) {

      $isObject = false;
      $isService = false;
      $req;
      $isSent = false;

      if(isset($_POST['objet'])) {
        $isObject = true;
      }
      if(isset($_POST['service'])) {
        $isService = true;
      }

      if($isObject) {
        $req = "INSERT INTO objet (nom, prix, localisation)
        VALUES ('{$_POST['objet']}', {$_POST['prix']}, '{$_POST['localisation']}');";
      }
      if($isService) {
        $req = "INSERT INTO service (nom, prix, localisation)
        VALUES ('{$_POST['service']}', {$_POST['prix']}, '{$_POST['localisation']}');";
      }
      if (isset($req)) {
        $res = $dbh->query($req);
        $isSent = true;
      }

      $strObjetOrService = "";
      $target_dir = "../uploads/propositions/";
      if ($isObject) {
        $target_dir .= "objets/";
        $strObjetOrService = "objet";
      }
      if ($isService) {
        $target_dir .= "services/";
        $strObjetOrService = "service";
      }
      $idproposition = -1;
      $req="SELECT id FROM $strObjetOrService WHERE id >= all(SELECT id FROM $strObjetOrService)";
      $res = $dbh->query($req);
      foreach($res as $tuple) {
        $idproposition = $tuple["id"];
      }

      $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
      $target_file = $target_dir . $idproposition . "." . $imageFileType;
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
            $req="UPDATE $strObjetOrService SET imagePath = '$target_file' WHERE id = $idproposition";
            $res = $dbh->query($req);
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
      if ($isSent) {
        header("location: accueil.php?proposition");
      }

    ?>

	<div class="container">

	    <div class= "row my-auto">

        <div class="form-proposer formulaire mx-auto px-5 py-4 inscription-form" id="form-type" method="post">
			<div class="row">
			    <h2 class="mb-4">Que proposez-vous?</h2>
			</div>
			<div class="row">
			    <div class="col-6 text-center">
				<input type="radio" name="ObjetService" id="type-objet" checked />
				<label>Objet</label>
			    </div>
			    <div class="col-6 text-center">
				<input type="radio" name="ObjetService" id="type-service" />
				<label>Service</label><br/>
			    </div>
			</div>
			<div class="row">
			    <div id="continuer1" class="row mt-4 mx-auto button-holavoisin button-violet">
				Continuer  <i class="ml-2 fas fa-1x fa-angle-right"></i>
			    </div>
			</div>
		    </div>

		    <form class="form-proposer formulaire px-5 py-4 inscription-form"
        id="form-objet" method="POST" enctype="multipart/form-data">
			<div class="row">
			    <h2 class="text-center mx-auto mb-3">Décrivez votre objet<h2>
			</div>
			<div class="container">
			    <div class="row mb-2">
				<label class="col-6">Nom de l'objet</label>
				<input class="col-6 mb-2" type="text" name="objet" placeholder="nom objet" required/>
			    </div>
			    <div class="row mb-2">
				<div class="col-6">
				    <label>Location</label>
				    <input type="radio" name="LocationVente" id="location" checked/>
				</div>
				<div class="col-6">
				    <label>Vente</label>
				    <input type="radio" name="LocationVente" id="vente" />
				</div>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Prix</label>
				<input class="col-6" type="text" name="prix" placeholder="prix" pattern="[0-9]+" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Localisation</label>
				<input class="col-6" type="text" name="localisation" placeholder="Localisation" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Image(s)</label>
         <input type="file" name="image"/>
			    </div>

			    <div class="row mb-2">
				<div class="row mx-auto button-holavoisin button-violet retour">
				    <i class="mr-2 fas fa-1x fa-angle-left"></i> Retour
				</div>
				<button class="mx-auto button-holavoisin button-vert" name="submit" type="submit" value="Valider">
				    Valider<i class="ml-2 fas fa-1x fa-check"></i>
				</button>
			    </div>

			</div>
    </form>

		    <form class="form-proposer formulaire px-5 py-4 inscription-form"
        id="form-service" method="POST" enctype="multipart/form-data">
			<div class="row">
			    <h2 class="text-center mx-auto mb-3">Décrivez votre service<h2>
			</div>
			<div class="container">
			    <div class="row mb-2">
				<label class="col-6">Nom de du service</label>
				<input class="col-6 mb-2" type="text" name="service" placeholder="Nom service" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Prix</label>
				<input class="col-6" type="text" name="prix" placeholder="Prix" pattern="[0-9]+" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Localisation</label>
				<input class="col-6" type="text" name="localisation" placeholder="Localisation" required/>
			    </div>

			    <div class="row mb-2">
				<label class="col-6">Image(s)</label>
        <input type="file" name="image"/>
			    </div>

			    <div class="row mb-2">
				<div class="row mx-auto button-holavoisin button-violet retour">
				    <i class="mr-2 fas fa-1x fa-angle-left"></i> Retour
				</div>
				<button class="mx-auto button-holavoisin button-vert" name="submit" type="submit" value="Valider">
				    Valider<i class="ml-2 fas fa-1x fa-check"></i>
				</button>
			    </div>

			</div>
		    </div>

		</form>
	    </div>
	</div>

    <?php }
    else {
    ?>

	<div class="container">
	    <div id="msg-inscription-necessaire"
		 class="row mx-auto my-4 text-center fond-blanc">
		<div class="row m-0 mb-4">
		    Vous devez être inscrit pour pouvoir proposer un objet ou service
		</div>
		<div class="row w-100 mx-auto justify-content-around">
		    <a class="button-holavoisin button-vert" href="./inscription.php">
			Devenir membre
		    </a>
		    <a class="button-holavoisin button-violet" href="./connexion.php">
			Se connecter
		    </a>
		</div>

	    </div>
	</div>

    <?php } ?>

</header>


<?php include("footer.php") ?>
