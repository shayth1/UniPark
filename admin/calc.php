<?php

define('TITLE', "Statistics");
include '../assets/layouts/header.php';
check_verified();
if ($_SESSION['userType'] != "admin") {
    header("Location:../logout");
}

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="style/calc.css">
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Users</h6>
                    <h2 class="text-right"><i class="fa fa-user f-left"></i><span>
                            <?php $query1 = mysqli_query($conn, "SELECT count(*) AS 'countU' FROM users");
                            $row = mysqli_fetch_array($query1);
                            $count_U = $row["countU"];
                            echo $row["countU"];
                            ?>

                        </span></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Parkings</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>
                            <?php $query2 = mysqli_query($conn, "SELECT count(*) AS 'countP' FROM park");
                            $row = mysqli_fetch_array($query2);
                            $count_P = $row["countP"];
                            echo $row["countP"];
                            ?>
                        </span></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Free Parks Now</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>
                            <?php $query3 = mysqli_query($conn, "SELECT count(*) AS 'countFP' FROM park WHERE user_id is NULL");
                            $row = mysqli_fetch_array($query3);
                            $count_FP = $row["countFP"];
                            echo $row["countFP"];
                            ?>
                        </span></h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Reserved Parks Now</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>
                            <?php $query4 = mysqli_query($conn, "SELECT count(*) AS 'countRP' FROM park WHERE user_id IS NOT NULL");
                            $row = mysqli_fetch_array($query4);
                            $count_RP = $row["countRP"];
                            echo $row["countRP"];
                            ?>
                        </span></h2>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../assets/layouts/footer.php'

?>