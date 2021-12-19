 <?php
    require '../../assets/setup/db.inc.php';

    $user = $_POST['username'];
    $bio = $_POST['bio'];
    $carNumber = $_POST['carNumber'];






    $FileNameNew = '_defaultReport.png';
    $file = $_FILES['avatar'];

    if (!empty($_FILES['avatar']['name'])) {

        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileError = $_FILES['avatar']['error'];
        $fileType = $_FILES['avatar']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

                if ($fileSize < 10000000) {

                    $FileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../../assets/uploads/reports/' . $FileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {

                    $_SESSION['ERRORS']['imageerror'] = 'image size should be less than 10MB';
                    header("Location: ../");
                    exit();
                }
            } else {

                $_SESSION['ERRORS']['imageerror'] = 'image upload failed, try again';
                header("Location: ../");
                exit();
            }
        } else {

            $_SESSION['ERRORS']['imageerror'] = 'invalid image type, try again';
            header("Location: ../");
            exit();
        }
    }

    $query2 = "INSERT INTO reports (fromUser, photo, carNumber, text) VALUES ('$user', '$FileNameNew', '$carNumber', '$bio')";
    $history = mysqli_query($conn, $query2);
    if ($history) {
        header("Location: ../myReserve.php");
    } else {
        header("Location: ../index.php");
    }