<?php
    session_start();
    require_once("../../config/db.php");
    require_once("../../model/formateur/formateur_BP_model.php");

    $briefId =isset($_GET['id']) ? $_GET['id'] : null;
    $conn=$database->getConnection();
    $brief = new brief($conn);

    if(isset($_POST["update"])){
        $addLink = $brief->updateRealiserLink($briefId,$_SESSION["ID"],$_POST["link"]);
        $updateEtat = $brief-> updateRealiserEtat($briefId,$_SESSION["ID"],"done");
    }





?>