<?php
define('TITLE', 'Take Park');
include '../assets/layouts/header.php';
check_verified();
if (isset($_GET['id'])) {
    $parkid = $_GET['id'];
} else {
    header("Location: index.php");
}
$sql = "SELECT * FROM park WHERE id ='$parkid'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL ERROR');
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $park = mysqli_fetch_assoc($result);
}

// getMap Data
$sql = "SELECT * FROM parking WHERE id ='$park[parking_id]'";
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

        <div class="col-md-12">



            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="mb-0">Park Location</h6>
                <iframe class="d-flex align-items-center" src="<?php echo $parking['parkingMap']; ?>" width="1100"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </small>
            </div>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <form class="form-auth" action="includes/reserve.php" method="post">

                        <h6 class="h3 mb-3 font-weight-normal text-muted text-center">Reservation Details</h6>

                        <input type="number" value="<?php echo $park['id']; ?>" id="id" name="id" required
                            style="display: none;">
                        <input type="number" value="<?php echo $_SESSION['id']; ?>" id="uid" name="uid" required
                            style="display: none;">
                        <h6 class="h6 mb-3 font-weight-normal text-muted text-left">Starting Time</h6>
                        <div class="form-group">


                            <input type="time" min="<?php echo date("h:i:A"); ?>" id="stime" name="stime"
                                class="form-control" placeholder="Starting Time" required autofocus>

                        </div>
                        <h6 class="h6 mb-3 font-weight-normal text-muted text-left">Return Time</h6>
                        <div class="form-group">

                            <input type="time" min="<?php echo date("h:i:A"); ?>" id="rtime" name="rtime"
                                class="form-control" placeholder="Return Time" required>

                        </div>
                        <h6 class="h6 mb-3 font-weight-normal text-muted text-left">Your car number</h6>
                        <div class="form-group">

                            <input type="text" id="cnumber" name="cnumber" class="form-control"
                                placeholder="ex: 40-505050" required>

                        </div>

                        <button class="btn btn-lg btn-success btn-block" type="submit">Submit</button>





                    </form>
                </div>
                <div class="col-sm-4">

                </div>
            </div>

        </div>
    </div>


</main>