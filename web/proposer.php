<?php include("header.php"); ?>

<?php
session_start();
?>

<header class="container-fluid header-accueil">

  <div class="container">

    <div class= "row my-auto">

      <form class="mx-auto" method="post">

        <div class="formulaire mx-auto px-5 py-4 inscription-form" id="form-type">
          <div class="row">
            <h1 class="mb-4">Que proposez-vous?</h1>
          </div>
          <div class="row">
            <div class="col-6 text-center">
              <input type="radio" name="ObjetService" id="objet" />
              <label>Objet</label>
            </div>
            <div class="col-6 text-center">
              <input type="radio" name="ObjetService" id="service" />
              <label>Service</label><br/>
            </div>
          </div>
          <div class="row">
            <button class="row mt-4 mx-auto form-accueil-bouton continuer">
              Continuer  <i class="ml-2 fas fa-2x fa-angle-right"></i>
            </button>
          </div>
        </div>

        <div class="formulaire mx-auto px-5 py-4 inscription-form" id="form-objet">
          <div class="row">
            <h2>Décrivez votre objet<h2>
            </div>
            <div class="row">
              <label class="row">Quel est l'objet que vous proposez?</label>
              <input class="row mb-2" type="text" name="objet" placeholder="nom objet">

              <div class="col-6 text-center">
                <input type="radio" name="LocationVente" id="location" />
                <label>Location</label>
              </div>

              <div class="col-6 text-center">
                <input type="radio" name="LocationVente" id="vente" />
                <label>Vente</label><br/>
              </div>
              <label class="row">Prix</label>
              <input class="row mb-2" type="text" name="prix" placeholder="prix">
            </div>
          </div>

          <div class="formulaire mx-auto px-5 py-4 inscription-form" id="form-service">
            <div class="row">
              <h2>Decrivez votre service<h2>
            </div>
            <div class="row">
                <label class="row">Quel est le service que vous proposez?</label>
                <input class="row mb-2" type="text" name="service" placeholder="nom service">
              </div>
              <label class="row">Prix</label>
              <input class="row mb-2" type="text" name="prix" placeholder="prix">
            </div>
          </form>
        </div>
      </div>
    </header>

    <?php include("footer.php") ?>
