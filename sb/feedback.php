<?php
include 'topbar.php';
include 'db.php';

if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO `feedback` (`id`, `email`, `msg`) VALUES (NULL, '$user', '$msg')";
    $result = $conn->query($sql);
    if ($result) {
        ?><div class="alert alert-success">
            <strong>Successfully added!</strong> Thank you for your feedback.
         </div>
         <?php
    }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <h3><b> Feedbacks</b></h3>
    <!-- 404 Error Text -->
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Type Message</label>
            <textarea name="msg" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>