<?php

define('TITLE', "Add Aria");
include '../assets/layouts/header.php';
check_verified();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-lg-4">

            <form class="form-auth" action="includes/addAria.php" method="post" enctype="multipart/form-data">


                <h6 class="h3 mt-3 mb-3 font-weight-normal text-muted text-center">Add Aria</h6>

                <div class="form-group">
                    <label for="aria" class="sr-only">aria</label>
                    <input type="text" id="aria" name="aria" class="form-control" placeholder="aria" required autofocus>

                </div>

                <div class="form-group">
                    <label for="map" class="sr-only">map</label>
                    <input type="map" id="map" name="map" class="form-control" placeholder="map" required autofocus>

                </div>



                <button class="btn btn-lg btn-primary btn-block" type="submit">Add Aria</button>



            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>



<?php

include '../assets/layouts/footer.php'

?>