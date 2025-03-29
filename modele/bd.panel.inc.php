<?php
include_once "bd.inc.php";

function recupererTousLesUtilisateurs() {
    $conn = connexionPDO();
    $req = $conn->prepare("SELECT * FROM users");
    
    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function supprimerUtilisateur($id) {
    $conn = connexionPDO();

    $req = $conn->prepare("DELETE FROM reservations WHERE username = (SELECT username FROM users WHERE id = ?)");
    $req->bindParam(1, $id, PDO::PARAM_INT);
    $req->execute();

    $req = $conn->prepare("DELETE FROM users WHERE id = ?");
    $req->bindParam(1, $id, PDO::PARAM_INT);
    $req->execute();
}
?>