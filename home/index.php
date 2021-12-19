<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();

?>


<main role="main" class="container">

    <div class="row">
        <div class="col-sm-3">

            <?php include('../assets/layouts/profile-card.php'); ?>

        </div>
        <div class="col-sm-9">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Hey there, <?php echo $_SESSION['username']; ?></h6>
                    <small>Last logged in at <?php echo date("m-d-Y", strtotime($_SESSION['last_login_at'])); ?></small>
                </div>
            </div>
            <?php
            $sql = "SELECT user_id FROM park WHERE user_id = $_SESSION[id]";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die('SQL ERROR');
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_assoc($result);
                error_reporting(0);
                if ($user['user_id'] != NULL) {
                    echo '
                        <a type="button" href="myReserve.php" class="btn btn-success"> Show My Park</a>
                        ';
                } elseif ($user['user_id'] === NULL) {
                    echo ' <div class="my-3 p-3 bg-white rounded box-shadow">
                        <h6 class="mb-0">Avilable Parks</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Location</th>
                                    <th scope="col">Parking Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="getPark"></tbody>
        
                        </table>
        
        
                        </small>
                    </div>';
                }
            }

            ?>



        </div>
    </div>


</main>
<script>
$('document').ready(function() {
    setInterval(function() {
        getParkData()

    }, 1000);

});

function getParkData() {
    $.ajax({
        url: "includes/getPark.inc.php",
        type: "post",
        data: 'json',

        cache: false,
        success: function(data) {
            $('#getPark').html(data);
        }
    });
};
</script>






<?php

include '../assets/layouts/footer.php'

?>