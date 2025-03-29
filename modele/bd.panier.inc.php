<?php
include_once "bd.inc.php";

function recupererPanier($username) {

    $conn = connexionPDO();

    $req = $conn->prepare("SELECT * FROM reservations WHERE username = ?");
    $req->bindParam(1, $username);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function supprimerPanier($username) {

    $conn = connexionPDO();

    $req = $conn->prepare("DELETE FROM reservations WHERE username = ?");
    $req->bindParam(1, $username);
    $req->execute();
    return $req->rowCount() > 0;
}
?>