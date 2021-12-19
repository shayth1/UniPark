<?php

require '../../assets/setup/db.inc.php';

$status = "Avilable";
$sql = "SELECT  p.id , p.parking_id, p.parkStatus, a.parkingName FROM park p INNER JOIN parking a ON p.parking_id = a.id WHERE p.parkStatus ='$status'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?= $row['parkingName']; ?></td>
    <td><?= $row['id']; ?></td>
    <td><?= $row['parkStatus']; ?></td>
    <td><a href="takePark.php?id=<?= $row['id']; ?>" class="btn btn-success">Take</a>

</tr>
<?php
    }
} else {
    echo "No Parkings Avaliable";
}
mysqli_close($conn);
?>