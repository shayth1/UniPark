<?php

define('TITLE', "Users");
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Last Login</th>
                                <th>Join Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM users";
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
                                ' . $row['first_name'] . ' ' . $row['last_name'] . ' 
                                </td>
                                <td>
                                ' . $row['email'] . '
                                </td>
                                <td>
                                ' . $row['headline'] . '
                                </td>
                                <td class="text-center">';
                                    if ($row['gender'] == 'm') {
                                        echo ' <i class="fa fa-male"></i>';
                                    } else {
                                        echo ' <i class="fa fa-female"></i>';
                                    }
                                    echo '
                                </td>
                                <td>
                                ' . $row['last_login_at'] . '
                                </td>
                                <td>
                                ' . $row['created_at'] . '
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