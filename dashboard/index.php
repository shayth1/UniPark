<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();

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
                                <th>From</th>
                                <th>To</th>
                                <th>Car Number</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM parkinghistory WHERE user_id = $_SESSION[id]";
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