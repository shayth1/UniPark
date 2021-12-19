<?php

define('TITLE', "Reports");
include '../assets/layouts/header.php';
check_verified();
if ($_SESSION['userType'] != "admin") {
    header("Location:../logout");
}

?>


<div class="container mt-6 mb-12">
    <div class="col-lg-12 mt-12 mt-lg-0">
        <div class="row">
            <div class="row">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">

                        <br>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Date</th>
                                <th>By User</th>
                                <th>User Phone</th>
                                <th>Image</th>
                                <th>Reported Car</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT r.id, r.date, r.fromUser,  r.carNumber, r.text, r.photo,  u.first_name, u.last_name, u.headline
                            FROM reports r INNER JOIN users u ON r.fromUser = u.id";
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
                                <a href = "../assets/uploads/reports/' . $row['photo'] . '" target="_blank">Open Photo</a>
                                
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