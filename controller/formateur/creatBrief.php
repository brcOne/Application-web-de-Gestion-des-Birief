<?php

    require_once("../../config/db.php");
    require_once("../../model/formateur/formateur_BP_model.php");
    $conn=$database->getConnection();
    $brief= new brief($conn);
    $inProgress=$brief->getInProgresBP($_SESSION["GROUPE"]);
    $competences = $brief->getCompetence();    
    if(isset($_POST["creat"]) || isset($_POST["assigned"]) ){   
        if (isset($_POST['start']) && isset($_POST['end'])) {
            $dateStart = $_POST['start'];
            $dateEnd = $_POST['end'];
            $newdateStart = new DateTime($dateStart);
            $newdateEnd = new DateTime($dateEnd);
            $formattedStartDate = $newdateStart->format('Y-m-d');
            $formattedEndDate = $newdateEnd->format('Y-m-d');
        }
        if(isset($_POST["competence"]) &&  $_POST["title"]!="" ){
            move_uploaded_file($_FILES["image"]["tmp_name"],"../../BP-IMAGE/".$_FILES["image"]["name"]);
            move_uploaded_file($_FILES["pdf"]["tmp_name"],"../../BP-PDF/".$_FILES["pdf"]["name"]);
            $add = $brief->addBrief( $_SESSION["ID"], $_POST["title"],$_POST["description"],$_FILES['pdf']['name'], date("Y-m-d"),$_FILES["image"]["name"]);
            $lastBriefId = $brief->getLastBP($_SESSION["ID"]);
            foreach($_POST["competence"] as $compe){
                 $db = $conn->prepare("INSERT INTO concerne (ID_BRIEF,ID_COMPETENCE) VALUES (:ID_BRIEF,:ID_COMPETENCE)");
                 $db->bindParam(":ID_BRIEF",$lastBriefId);
                 $db->bindParam(":ID_COMPETENCE",$compe);
                 $db->execute();
             }
        if( isset($_POST["assigned"]) ){
            $brief->assignBP($lastBriefId,$_SESSION["ID_GROUPE"],$formattedStartDate,$formattedEndDate,date("Y,m,d"));
            $brief->assignToGroup($lastBriefId,$_SESSION["ID_GROUPE"]);
        }
         }else{
        echo "chose skills";
         }
        
        
    }


?>