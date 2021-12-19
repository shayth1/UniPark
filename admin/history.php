<?php

define('TITLE', "Park History");
include '../assets/layouts/header.php';
check_verified();
if ($_SESSION['userType'] != "admin") {
    header("Location:../logout");
}

?>


<div class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">

                        <br>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Date</th>
                                <th>By User</th>
                                <th>User Phone</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Car Number</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT h.id, h.starTime, h.date, h.user_id, h.endTime, h.carNumber, u.headline,  u.first_name, u.last_name
                            FROM parkinghistory h INNER JOIN users u ON h.user_id = u.id ; ";
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
                                ' . $row['id'] . '
                                </td>
                                <td>
                                ' . $row['date'] . ' 
                                </td>
                               
                                <td>
                                ' . $row['first_name'] . '  ' . $row['last_name'] . '
                                </td>
                                <td>
                                ' . $row['headline'] . ' 
                                </td>
                                <td>
                                ' . $row['starTime'] . '
                                </td>
                                <td>
                                ' . $row['endTime'] . '
                                </td>
                                
                                <td>
                                ' . $row['carNumber'] . '
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