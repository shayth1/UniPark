<?php
require '../../assets/setup/db.inc.php';

$parking_id = $_GET['parking_id'];
$park_id = $_GET['park_id'];
$parkStatus = $_GET['parkStatus'];
$newStatus = "";
if ($parkStatus === "Avilable") {
    $newStatus = "BUSY";
} else {
    $newStatus = "Avilable";
}



$query = "UPDATE park SET parkStatus = '$newStatus', takenFrom = NULL, freeAt = NULL,user_id = NULL WHERE id = '$park_id'";
$changeStatus = mysqli_query($conn, $query);

if ($changeStatus) {
    header("Location: ../ariaDetails.php?id=$parking_id");
} else {
    header("Location: ../ariaDetails.php?id=$parking_id");
}