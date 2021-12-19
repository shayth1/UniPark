<?php

define('TITLE', "Aria");
include '../assets/layouts/header.php';
check_verified();
if ($_SESSION['userType'] != "admin") {
    header("Location:../logout");
}
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<link rel="stylesheet" href="style/aria.css">
<div class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <a href="addAria.php" type="button" class="btn btn-success">Add Aria</a>
                        <br>
                        <thead>
                            <tr>
                                <!-- <th class="text-center">Image</th>
                                <th>Name</th>

                                <th class="action text-right">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM parking";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $query)) {
                                die('ERROR IN CONNECTION');
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                <tr class="candidates-list">
                                <td>
                                    <div class="thumb">
                                        <img class="img-fluid" src="../assets/images/parking.jpg" alt="">
                                    </div>
                                </td>
                                <td class="title">


                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0"><a href="#">' . $row['parkingName'] . '</a></h5>
                                            </div>

                                        </div>
                                    </div>


                                </td>

                                <td>
                                    <a href="ariaDetails.php?id=' . $row['id'] . '" type="button" class="btn btn-primary">Open</a>
                                    <a href="includes/deleteParking.php?id=' . $row['id'] . '" type="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                                
                                ';
                                }
                            }


                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

include '../assets/layouts/footer.php'

?>