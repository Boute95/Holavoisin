<?php

/**
 * @author Alexis Breton
 *
 * Script qui déconnecte l'utilisateur en supprimant la session.
 *
 */

session_start();
session_destroy();
header('location: accueil.php');
?>
