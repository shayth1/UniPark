<?php

define('TITLE', "Report");
include '../assets/layouts/header.php';
?>


<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-lg-4">

            <form class="form-auth" action="includes/report.inc.php" method="post" enctype="multipart/form-data">



                <div class="picCard text-center">
                    <div class="avatar-upload">
                        <div class="avatar-preview text-center">
                            <div id="imagePreview"
                                style="background-image: url( ../assets/uploads/users/_defaultUser.png );"></div>
                        </div>
                        <div class="avatar-edit">
                            <input name='avatar' id="avatar" class="fas fa-pencil" type='file' />
                            <label for="avatar"></label>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <sub class="text-danger">
                        <?php
                        if (isset($_SESSION['ERRORS']['imageerror']))
                            echo $_SESSION['ERRORS']['imageerror'];

                        ?>
                    </sub>
                </div>

                <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Report a Problem</h6>

                <div class="text-center mb-3">
                    <small class="text-success font-weight-bold">
                        <?php
                        if (isset($_SESSION['STATUS']['signupstatus']))
                            echo $_SESSION['STATUS']['signupstatus'];

                        ?>
                    </small>
                </div>

                <div class="form-group" style="display: none;">
                    <label for=" username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $_SESSION['id'] ?>"
                        class="form-control" placeholder="Username" required autofocus>
                </div>

                <div class="form-group">
                    <label for="carNumber" class="sr-only"> Reported Car Number</label>
                    <input type="text" id="carNumber" name="carNumber" class="form-control"
                        placeholder="Reported Car Number" required autofocus>
                </div>



                <div class="form-group">
                    <label for="bio" class="sr-only">Details</label>
                    <textarea type="text" id="bio" name="bio" class="form-control"
                        placeholder="Tell us More..."></textarea>
                </div>



                <button class="btn btn-lg btn-danger btn-block" type="submit">Report</button>



            </form>

        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>



<?php

include '../assets/layouts/footer.php'

?>

<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);

        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar").change(function() {
    console.log("here");
    readURL(this);
});
</script>