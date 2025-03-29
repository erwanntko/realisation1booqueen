<?php
// Démarrez la session
session_start();

//Inclusions des bdd
include_once dirname(__DIR__)."/modele/bd.modifierUtilisateur.inc.php";

// Récupération formulaire pour lancer une fonction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];
    $role = $_POST['role'];

    $result = mettreAJourUtilisateur($id, $username, $firstName, $lastName, $phoneNumber, $address, $postalCode, $role);

    if ($result) {
        header('Location: panel.php');
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $user = obtenirUtilisateurParId($id);

    if ($user) {
        include_once dirname(__DIR__)."/vue/vueModifierUtilisateur.php";
    }
}
?>