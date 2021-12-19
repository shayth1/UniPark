<?php

define('TITLE', "Aria Details");
include '../assets/layouts/header.php';
check_verified();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: aria.php");
}
$sql = "SELECT * FROM parking WHERE id ='$id'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL ERROR');
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $parking = mysqli_fetch_assoc($result);
}
if ($_SESSION['userType'] != "admin") {
    header("Location:../logout");
}
?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-3">



        </div>
        <div class="col-sm-12">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 rounded box-shadow">
                <img class="mr-3" src="../assets/images/parking.jpg" alt="" width="48" height="48">
                <div class="">
                    <h6 class="mb-0 text-black lh-100"><?php echo $parking['parkingName']; ?></h6>

                </div>
            </div>

            <iframe class="d-flex align-items-center" src="<?php echo $parking['parkingMap']; ?>" width="1100"
                height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
    </div>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        Add New Park
    </button>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Parking ID</th>
                <th scope="col">Statuus</th>
                <th scope="col">Used By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = "SELECT * FROM park WHERE parking_id = $parking[id]";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                die('ERROR IN CONNECTION');
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
            <tr>
                <th scope="row">' . $row['id'] . '</th>
                <td>' . $row['parkStatus'] . '</td>
                <td>' . $row['user_id'] . '</td>
                <td>
                <a type="button" class="btn btn-warning" href="includes/changeParkStatus.php?park_id=' . $row['id'] . '&parkStatus=' . $row['parkStatus'] . '&parking_id=' . $row['parking_id'] . '">
                Change Status
                </a></td>
            </tr>
            
            ';
                }
            }
            ?>

        </tbody>
    </table>
</main>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure about adding new garage in this parking?
            </div>
            <form action="includes/addPark.php" method="POST">
                <input type="number" name="parking_id" value="<?php echo $parking['id']; ?>" style="display: none;">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php

include '../assets/layouts/footer.php'

?>