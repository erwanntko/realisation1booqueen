<?php
// Démarrez la session
session_start();

// Création de l'icon
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des BDD
include_once dirname(__DIR__)."/modele/bd.panier.inc.php";

// Vérification si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: logister.php');
    exit;
}

// Réception de la requête JSON pour supprimer le panier
$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true);
$usernamePanier = $data['username'];
supprimerPanier($usernamePanier);

// Récupération du panier pour la vue
$panier = recupererPanier($username);

// Inclusions des vues
include_once dirname(__DIR__)."/vue/vueNavbar.php";
include_once dirname(__DIR__)."/vue/vuePanier.php";
?>
