<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
define('TITLE', 'My Reservations');
include '../assets/layouts/header.php';
check_verified();

$sql = "SELECT * FROM park WHERE user_id ='$_SESSION[id]'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die('SQL ERROR');
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $mypark = mysqli_fetch_assoc($result);
}

// getMap Data
$sql = "SELECT * FROM parking WHERE id ='$mypark[parking_id]'";

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
        <br>
        <div class="col-sm-4">
            <a type="button" href="report.php" class="btn btn-danger">
                Report a Problem</a>
        </div>
        <?php

        if ($parking === NULL) {
            echo '<h6 class="mb-0">You Dont have any active reservations !</h6>';
        } else {
            echo '
            <div class="col-md-12">



            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="mb-0">Your Park Location</h6>
                <iframe class="d-flex align-items-center" src="';
            echo $parking['parkingMap'];
            echo '" width="1100"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </small>
            </div>
            <div class="row">
                <div class="col-sm-4">

                </div>
                
                <div class="col-sm-4">

                </div>
            </div>

        </div>
            
            
            ';
        }
        ?>
        <div class="col-sm-4">

        </div>


        <div class="col-sm-4">
            <h6 class="h3 mb-3 font-weight-normal text-muted text-center">You Must Leave in</h6>
        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>

        <div class="col-sm-4">
            <h6 id="remainTime" class="h3 mb-3 font-weight-normal text-muted text-center"></h6>
        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
    </div>

    <div class="col-sm-4">
        <a type="button" href="includes/turnin.php?user_id=<?php echo $_SESSION['id']; ?>" class="btn btn-success"> Turn
            in Park Now</a>
    </div>
    </div>


</main>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo date("M d,Y"); ?> <?php echo $mypark['freeAt'] ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("remainTime").innerHTML = hours + "h " +
        minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        window.location = 'index.php';
    }
}, 1000);
</script>