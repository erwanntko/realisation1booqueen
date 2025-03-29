<?php
include_once "bd.inc.php";

function getCatalogueDirectorNames() {

    $conn = connexionPDO();

    $req = $conn->prepare("SELECT name FROM catalogueDirector");
    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function getCatalogueDirectorFileNames() {

    $conn = connexionPDO();

    $req = $conn->prepare("SELECT fileNameImages FROM catalogueDirector");
    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function getVoyagesParPays() {

    $conn = connexionPDO();

    $req = $conn->prepare("SELECT * FROM catalogue ORDER BY pays");
    
    $catalogueData = $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : [];

    return array_reduce($catalogueData, function($result, $data) {
        $result[$data['pays']][] = $data;
        return $result;
    }, []);
}

function ajouterReservation($username, $ville, $destination, $prix) {

    $conn = connexionPDO();
    $req = $conn->prepare("INSERT INTO reservations (username, ville, pays, prix) VALUES (?, ?, ?, ?)");

    $req->bindParam(1, $username);
    $req->bindParam(2, $ville);
    $req->bindParam(3, $destination);
    $req->bindParam(4, $prix);
    
    return $req->execute();
}
?>
