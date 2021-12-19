<?php
require '../../assets/setup/db.inc.php';
$parking_id = $_POST['parking_id'];

$sql = "INSERT INTO park (parking_id) VALUES ('$parking_id')";

$addAria = mysqli_query($conn, $sql);

if ($addAria) {
    header("Location: ../ariaDetails.php?id=$parking_id");
} else {
    header("Location: ../ariaDetails.php?id=$parking_id");
}