<?php
session_start();
require_once ("../../config/db.php");
require_once ("../../model/formateur/formateur_statics.php");
$learnerId = isset($_GET['id']) ? $_GET['id'] : $_SESSION["ID"];;
if ($learnerId) {
    $conn = $database->getConnection();
    $statics = new statics($conn);
    $apprenant_static = $statics->get_learner_statics($learnerId);
    $NOT_DONE = $apprenant_static["NOT_DONE"] / $apprenant_static["TOTAL"] * 100;
    $DONE = $apprenant_static["DONE"] / $apprenant_static["TOTAL"] * 100;
    $TOTAL = $apprenant_static["TOTAL"] / $apprenant_static["TOTAL"] * 100;
}
?>