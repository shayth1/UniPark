<?php
require '../../assets/setup/db.inc.php';

$user_id = $_GET['user_id'];

$newStatus = "Avilable";



$query = "UPDATE park SET parkStatus = '$newStatus', takenFrom = NULL, freeAt = NULL,user_id = NULL WHERE user_id = '$user_id'";
$changeStatus = mysqli_query($conn, $query);

if ($changeStatus) {
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}