<?php
require '../../assets/setup/db.inc.php';

$park_id = $_POST['id'];
$sTime = $_POST['stime'];
$rTime = $_POST['rtime'];
$newStatus = "BUSY";
$user = $_POST['uid'];
$cnumber = $_POST['cnumber'];



$query = "UPDATE park SET parkStatus = '$newStatus', takenFrom = '$sTime', freeAt = '$rTime',
user_id = '$user' WHERE id = '$park_id'";
$changeStatus = mysqli_query($conn, $query);

if ($changeStatus) {
    $query2 = "INSERT INTO parkinghistory (carNumber, user_id, starTime, endTime) VALUES ('$cnumber', '$user', '$sTime', '$rTime')";
    $history = mysqli_query($conn, $query2);
    if ($history) {
        header("Location: ../myReserve.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}