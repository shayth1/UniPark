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
</main>

<?php

include '../assets/layouts/footer.php'

?>