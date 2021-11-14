<?php
require '../../assets/setup/db.inc.php';
$name = $_POST['aria'];
$map = $_POST['map'];

$sql = "INSERT INTO parking (parkingName, parkingMap) VALUES ('$name', '$map')";

$addAria = mysqli_query($conn, $sql);

if ($addAria) {
    header("Location: ../aria.php");
} else {
    header("Location: ../addAria.php");
}