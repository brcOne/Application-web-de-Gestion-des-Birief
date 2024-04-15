<?php
    session_start();
    require_once("../../config/db.php");
    require_once("../../model/formateur/formateur_BP_model.php");
    $conn=$database->getConnection();
    $brief= new brief($conn);
    $competences = $brief->getCompetence();    
    if(isset($_POST["creat"]) || isset($_POST["assigned"]) ){   
        if(isset($_POST["competence"]) &&  $_POST["title"]!="" ){
            // move_uploaded_file($_FILES["image"]["tmp_name"],"../../BP-IMAGE/".$_FILES["image"]["name"]);
            move_uploaded_file($_FILES["ayoub"]["tmp_name"],"../../BP-PDF/".$_FILES["ayoub"]["name"]);
            var_dump($_FILES["ayoub"]);
            $add = $brief->addBrief( $_SESSION["ID"], $_POST["title"], "piece_joint.bp-file", date("Y-m-d"));
            $lastBriefId = $brief->getLastBP($_SESSION["ID"]);
            foreach($_POST["competence"] as $compe){
                 $db = $conn->prepare("INSERT INTO concerne (ID_BRIEF,ID_COMPETENCE) VALUES (:ID_BRIEF,:ID_COMPETENCE)");
                 $db->bindParam(":ID_BRIEF",$lastBriefId);
                 $db->bindParam(":ID_COMPETENCE",$compe);
                 $db->execute();
             }
        if( isset($_POST["assigned"]) ){
            $brief->assignBP($lastBriefId,$_SESSION["ID_GROUPE"],"2024-04-14","2024-04-18",date("Y,m,d"));
            $brief->assignToGroup($lastBriefId,$_SESSION["ID_GROUPE"]);
        }
         }else{
        echo "chose skills";
         }
        
    }


?>