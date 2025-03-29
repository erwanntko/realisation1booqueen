<?php
include  dirname(__FILE__)."/controleur/controleurPrincipal.php";

if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "defaut";
}

include dirname(__FILE__)."/controleur/".controleurPrincipal($action);
?>