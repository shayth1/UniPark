<?php if (isset($_SESSION['auth'])) { ?>

</body>

<!-- <footer id="myFooter">

    <div class="footer-copyright">
        <p>
            <a href="#" target="_blank">#</a> |
            <a href="#" target="_blank">#</a> |
            <a href="#" target="_blank">#</a>
        </p>
    </div>
</footer> -->

<?php } ?>


<script src="../assets/vendor/js/jquery-3.4.1.min.js"></script>
<script src="../assets/vendor/js/popper.min.js"></script>
<script src="../assets/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>

<?php if (isset($_SESSION['auth'])) { ?>

<script src="../assets/js/check_inactive.js"></script>

<?php } ?>


</body>

</html>

<?php

if (isset($_SESSION['ERRORS']))
    $_SESSION['ERRORS'] = NULL;
if (isset($_SESSION['STATUS']))
    $_SESSION['STATUS'] = NULL;

?>