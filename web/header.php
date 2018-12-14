<?php

session_start();
include('db.php');
include('../login-db.php');
connectToDb($login, $pw);


?>



<!DOCTYPE html>
<html>

    <head>

	<title>¡HolaVoisin!</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Niramit:400,400i,700,700i|Annie+Use+Your+Telescope" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">

    </head>




    <body>



	<nav class="navbar navbar-expand-md navbar-dark"
	     data-0="background-color: #ffffff20 !important;"
	     data-200="background-color: #555;">
	    <div class="container">
		<a class="navbar-brand" href="#">¡HolaVoisin!</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">

			<li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'accueil.php')){ echo 'active'; }?>" >
			    <a class="nav-link" href="accueil.php">Accueil</a>
			</li>

			<li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'chercher.php')){ echo 'active'; }?>">
			    <a class="nav-link" href="chercher.php">Chercher</a>
			</li>

			<li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'proposer.php')){ echo 'active'; }?>">
			    <a class="nav-link" href="proposer.php">Proposer</a>
			</li>
			<?php if(!isset($_SESSION['identifiant'])){ ?>
			    <li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'connexion.php')){ echo 'active'; }?>">
				<a class="nav-link" href="connexion.php">Connexion</a>
			    </li>

			    <li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'inscription.php')){ echo 'active'; }?>">
				<a class="nav-link" href="inscription.php">Inscription</a>
			    </li>

			<?php }else{ ?>
			    <li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'monCompte.php')){ echo 'active'; }?>">
				<a class="nav-link" href="monCompte.php">Mon Compte</a>
			    </li>

			    <li class="nav-item <?php if( stristr(basename($_SERVER['REQUEST_URI']),'deconnexion.php')){ echo 'active'; }?>">
				<a class="nav-link" href="deconnexion.php">Deconnexion</a>
			    </li>

			<?php } ?>

		    </ul>
		</div>
	    </div>
	</nav>
