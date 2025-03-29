<?php
//Démarrage de la session
session_start();

// Création de l'icon
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once dirname(__DIR__)."/modele/bd.accueil.inc.php";
include_once dirname(__DIR__)."/modele/bd.panier.inc.php";

//Initiation des variables
$catalogueDirectorName = getCatalogueDirectorNames();
$catalogueDirectorFileNames = getCatalogueDirectorFileNames();
$catalogueParPays = getVoyagesParPays();

// Récupère les données + envoie une requete pour le panier
$destination = $_POST['destination'];
$ville = $_POST['ville'];
$prix = $_POST['prix'];
$username = $_POST['username'];
ajouterReservation($username, $ville, $destination, $prix);

// Inclusions des vues
include_once dirname(__DIR__)."/vue/vueNavbar.php";
include_once dirname(__DIR__)."/vue/vueAccueil.php";
include_once dirname(__DIR__)."/vue/vueFooter.php";
?>
