
<?php
session_start();
include("../db/dbConnection.php");
include("../url.php");
// Fetch course count from the database
$query_count = "SELECT COUNT(*) AS total_courses FROM inter_course_tbl WHERE status = 'Active'";
$result_count = mysqli_query($conn, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_courses = $row_count['total_courses'];

// Fetch course data from the database
$query = "SELECT intern_course_name, course_logo FROM inter_course_tbl WHERE status = 'Active'";
$result = mysqli_query($conn, $query);

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

    <!-- ============================ Sidebar Start ============================ -->

    <?php include "left.php"  ?>   
<!-- ============================ Sidebar End  ============================ -->

    <div class="dashboard-main-wrapper">
        <?php include "top.php"  ?>

        
        <div class="dashboard-body">
            <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
    <ul class="flex-align gap-4">
        <li><a href="dashboard.php" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
        <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
        <li><span class="text-main-600 fw-normal text-15">Student Courses</span></li>
    </ul>
</div>
<!-- Breadcrumb End -->

            <!-- Course Tab Start -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-24">
                        <ul class="nav nav-pills common-tab gap-20" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-onGoing-tab" data-bs-toggle="pill" data-bs-target="#pills-onGoing" type="button" role="tab" aria-controls="pills-onGoing" aria-selected="true">All Courses (<?php echo $total_courses; ?>)</button>
                            </li>
                            <!--<li class="nav-item" role="presentation">-->
                            <!--  <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false">Completed (10)</button>-->
                            <!--</li>-->
                            <!--<li class="nav-item" role="presentation">-->
                            <!--  <button class="nav-link" id="pills-saved-tab" data-bs-toggle="pill" data-bs-target="#pills-saved" type="button" role="tab" aria-controls="pills-saved" aria-selected="false">Saved (12)</button>-->
                            <!--</li>-->
                            <!--<li class="nav-item" role="presentation">-->
                            <!--  <button class="nav-link" id="pills-favourite-tab" data-bs-toggle="pill" data-bs-target="#pills-favourite" type="button" role="tab" aria-controls="pills-favourite" aria-selected="false">Favorite (25)</button>-->
                            <!--</li>-->
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-onGoing" role="tabpanel" aria-labelledby="pills-onGoing-tab" tabindex="0">
                            <div class="row g-20">
                                <?php
                                // Check if there are any courses
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="card border border-gray-100">
                                                <div class="card-body p-8">
                                                    <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                        <img src="https://asset.inforiya.in/ERP/ERP_image/InternCourse/<?php echo $row['course_logo']; ?>" alt="Course Image">
                                                    </a>
                                                    <div class="p-8">
                                                        <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">
                                                            Development
                                                        </span>
                                                        <h5 class="mb-0">
                                                            <a href="#" class="hover-text-main-600"><?php echo $row['intern_course_name']; ?></a>
                                                        </h5>

                                                        <div class="flex-between gap-4 flex-wrap mt-24">
                                                            <div class="flex-align gap-4">
                                                                <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                                <span class="text-13 fw-bold text-gray-600">4.8</span>
                                                                <span class="text-13 fw-bold text-gray-600">(1.2k)</span>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-main rounded-pill py-9">Request</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "<p>No courses found</p>";
                                }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Course Tab End -->
             
        </div>
        <br>
        <div class="dashboard-footer">
    <?php include "footer.php"  ?>
</div>
    </div>
    
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


    </body>
</html>