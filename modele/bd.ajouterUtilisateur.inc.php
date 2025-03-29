<?php
include_once 'bd.inc.php';

function creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode, $role) {

    $conn = connexionPDO();

    $req = $conn->prepare("INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $req->bindParam(1, $username);
    $req->bindParam(2, $hashedPassword);
    $req->bindParam(3, $firstName);
    $req->bindParam(4, $lastName);
    $req->bindParam(5, $address);
    $req->bindParam(6, $phoneNumber);
    $req->bindParam(7, $postalCode);
    $req->bindParam(8, $role);
    return $req->execute();
}

function utilisateurExiste($username) {

    $conn = connexionPDO();

    $req = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $req->bindParam(1, $username);
    $req->execute();
    
    $count = $req->fetchColumn();
    return $count > 0;
}
?>