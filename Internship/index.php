
<?php 
session_start();
// Check if the session variable for username is set
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect to dashboard
    exit(); // Ensure no further code is executed
}

if (isset($_REQUEST['logout'])) {
    session_destroy();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"  ?> 
<body>
    
<!--==================== Preloader Start ====================-->
  <div class="preloader">
    <div class="loader"></div>
  </div>
<!--==================== Preloader End ====================-->

<!--==================== Sidebar Overlay End ====================-->
<div class="side-overlay"></div>
<!--==================== Sidebar Overlay End ====================-->

    <section class="auth d-flex">
        <div class="auth-left bg-main-50 flex-center p-24">
            <img src="assets/images/thumbs/auth-img1.jpg" alt="">
        </div>
        <div class="auth-right py-40 px-24 flex-center flex-column">
            <div class="auth-right__inner mx-auto w-100">
                <a href="index.php" class="auth-right__logo">
                    <img src="assets/images/logo/logo.png" alt="Logo" class="img-fluid" style="width: 180px;">
                </a>
                <h2 class="mb-8">Welcome you Back! &#128075;</h2>
                <p class="text-gray-600 text-15 mb-32">Please log in to your account and kick things off with energy</p>

                <div id="message" class="alert alert-dismissible fade show" style="display: none;" role="alert">
                <strong id="message-title"></strong>
                <span id="message-text"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <form action="#">
                    <div class="mb-24">
                        <label for="fname" class="form-label mb-8 h6">Email or Username</label>
                        <div class="position-relative">
                            <input type="text" class="form-control py-11 ps-40" id="fname" placeholder="Type your username">
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-user"></i></span>
                        </div>
                    </div>
                    <div class="mb-24">
                        <label for="current-password" class="form-label mb-8 h6">Current Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control py-11 ps-40" id="current-password" placeholder="Enter Current Password">
                            <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash" id="#current-password"></span>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i class="ph ph-lock"></i></span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-main rounded-pill w-100" id="loginBtn">Sign in</button>
                </form>
            </div>
        </div>
    </section>

        <!-- Jquery js -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="assets/js/boostrap.bundle.min.js"></script>
    <!-- Phosphor Js -->
    <script src="assets/js/phosphor-icon.js"></script>
    <!-- file upload -->
    <script src="assets/js/file-upload.js"></script>
    <!-- file upload -->
    <script src="assets/js/plyr.js"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <!-- full calendar -->
    <script src="assets/js/full-calendar.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/editor-quill.js"></script>
    <!-- apex charts -->
    <script src="assets/js/apexcharts.min.js"></script>
    <!-- Calendar Js -->
    <script src="assets/js/calendar.js"></script>
    <!-- jvectormap Js -->
    <script src="assets/js/jquery-jvectormap-2.0.5.min.js"></script>
    <!-- jvectormap world Js -->
    <script src="assets/js/jquery-jvectormap-world-mill-en.js"></script>
    
    <!-- main js -->
    <script src="assets/js/main.js"></script>


    <script>
        $(document).ready(function () {
    $('#loginBtn').click(function (e) {
        e.preventDefault(); // Prevent default form submission

        // Gather form data
        var username = $('#fname').val();
        var password = $('#current-password').val();

        // Perform validation if necessary

            $.ajax({
        url: "action/actLogin.php",
        method: 'POST',
        data: {
            username: username,
            password: password
        },
        dataType: 'json',
        success: function(result) {
            // Show the message in the alert div
            $('#message-title').text(result.success ? 'Success!' : 'Error!');
            $('#message-text').text(result.message);
            $('#message').removeClass('alert-success alert-danger').addClass(result.success ? 'alert-success' : 'alert-danger').show();

            if (result.success) {

            
                    window.location.href = 'dashboard.php';
                
            }
        },
        error: function(xhr, status, error) {
            $('#message-title').text('Error!');
            $('#message-text').text('An error occurred. Please try again.');
            $('#message').removeClass('alert-success').addClass('alert-danger').show();
        }
    });
    });
});
    </script>



    </body>
</html>