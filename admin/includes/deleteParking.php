<?php
require '../../assets/setup/db.inc.php';
$park_id = $_GET['id'];

$sql="DELETE FROM parking WHERE id = $park_id";

$deleteParking = mysqli_query($conn, $sql);

if ($deleteParking) {
    header("Location: ../aria.php");
} else {
    header("Location: ../aria.php");
}