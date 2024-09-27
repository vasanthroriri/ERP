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
                              <button class="nav-link active" id="pills-onGoing-tab" data-bs-toggle="pill" data-bs-target="#pills-onGoing" type="button" role="tab" aria-controls="pills-onGoing" aria-selected="true">Ongoing (08)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false">Completed (10)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-saved-tab" data-bs-toggle="pill" data-bs-target="#pills-saved" type="button" role="tab" aria-controls="pills-saved" aria-selected="false">Saved (12)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-favourite-tab" data-bs-toggle="pill" data-bs-target="#pills-favourite" type="button" role="tab" aria-controls="pills-favourite" aria-selected="false">Favorite (25)</button>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-onGoing" role="tabpanel" aria-labelledby="pills-onGoing-tab" tabindex="0">
                            <div class="row g-20">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/fsd.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">Development</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">Full Stack</a></h5>

                                                <div class="flex-align gap-8 mt-12">
                                                    <span class="text-main-600 flex-shrink-0 text-13 fw-medium">32%</span>
                                                    <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 32%"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img1.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Noble</a> </span>
                                                        <div class="flex-align gap-4">
                                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                            <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                            <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/ux.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-warning-50 text-warning-600 mb-16">Design</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">UI/UX Design Course</a></h5>

                                                <div class="flex-align gap-8 mt-12">
                                                    <span class="text-main-600 flex-shrink-0 text-13 fw-medium">20%</span>
                                                    <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 20%"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img2.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">SriRam</a> </span>
                                                        <div class="flex-align gap-4">
                                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                            <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                            <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/react.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-danger-50 text-danger-600 mb-16">Frontend</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">React Native Courese</a></h5>

                                                <div class="flex-align gap-8 mt-12">
                                                    <span class="text-main-600 flex-shrink-0 text-13 fw-medium">45%</span>
                                                    <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 45%"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img3.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Sridharan</a> </span>
                                                        <div class="flex-align gap-4">
                                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                            <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                            <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Request</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/ma.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-info-50 text-info-600 mb-16">App</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">Mobile App</a></h5>

                                                <div class="flex-align gap-8 mt-12">
                                                    <span class="text-main-600 flex-shrink-0 text-13 fw-medium">10%</span>
                                                    <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar bg-main-600 rounded-pill" style="width: 10%"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img4.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Albert James</a> </span>
                                                        <div class="flex-align gap-4">
                                                            <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                            <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                            <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Continue Watching</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-onGoing" role="tabpanel" aria-labelledby="pills-onGoing-tab" tabindex="0">
                                        <div class="row g-20">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="card border border-gray-100">
                                                    <div class="card-body p-8">
                                                        <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                            <img src="assets/images/thumbs/fsd.png" alt="Course Image">
                                                        </a>
                                                        <div class="p-8">
                                                            <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">Development</span>
                                                            <h5 class="mb-0"><a href="#" class="hover-text-main-600">Full Stack</a></h5>
            
                                                            <div class="flex-align gap-8 mt-12">
                                                                <span class="text-main-600 flex-shrink-0 text-13 fw-medium">32%</span>
                                                                <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 32%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                                <img src="assets/images/thumbs/user-img1.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                                <div>
                                                                    <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Noble</a> </span>
                                                                    <div class="flex-align gap-4">
                                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="card border border-gray-100">
                                                    <div class="card-body p-8">
                                                        <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                            <img src="assets/images/thumbs/ux.png" alt="Course Image">
                                                        </a>
                                                        <div class="p-8">
                                                            <span class="text-13 py-2 px-10 rounded-pill bg-warning-50 text-warning-600 mb-16">Design</span>
                                                            <h5 class="mb-0"><a href="#" class="hover-text-main-600">UI/UX Design Course</a></h5>
            
                                                            <div class="flex-align gap-8 mt-12">
                                                                <span class="text-main-600 flex-shrink-0 text-13 fw-medium">20%</span>
                                                                <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 20%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                                <img src="assets/images/thumbs/user-img2.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                                <div>
                                                                    <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">SriRam</a> </span>
                                                                    <div class="flex-align gap-4">
                                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Register</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="card border border-gray-100">
                                                    <div class="card-body p-8">
                                                        <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                            <img src="assets/images/thumbs/react.png" alt="Course Image">
                                                        </a>
                                                        <div class="p-8">
                                                            <span class="text-13 py-2 px-10 rounded-pill bg-danger-50 text-danger-600 mb-16">Frontend</span>
                                                            <h5 class="mb-0"><a href="#" class="hover-text-main-600">React Native Courese</a></h5>
            
                                                            <div class="flex-align gap-8 mt-12">
                                                                <span class="text-main-600 flex-shrink-0 text-13 fw-medium">45%</span>
                                                                <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 45%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                                <img src="assets/images/thumbs/user-img3.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                                <div>
                                                                    <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Sridharan</a> </span>
                                                                    <div class="flex-align gap-4">
                                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Request</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="card border border-gray-100">
                                                    <div class="card-body p-8">
                                                        <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                            <img src="assets/images/thumbs/ma.png" alt="Course Image">
                                                        </a>
                                                        <div class="p-8">
                                                            <span class="text-13 py-2 px-10 rounded-pill bg-info-50 text-info-600 mb-16">HR</span>
                                                            <h5 class="mb-0"><a href="#" class="hover-text-main-600">HR Intern</a></h5>
            
                                                            <div class="flex-align gap-8 mt-12">
                                                                <span class="text-main-600 flex-shrink-0 text-13 fw-medium">10%</span>
                                                                <div class="progress w-100  bg-main-100 rounded-pill h-8" role="progressbar" aria-label="Basic example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="progress-bar bg-main-600 rounded-pill" style="width: 10%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-align gap-8 flex-wrap mt-16">
                                                                <img src="assets/images/thumbs/user-img4.png" class="w-32 h-32 rounded-circle object-fit-cover" alt="User Image">
                                                                <div>
                                                                    <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Albert James</a> </span>
                                                                    <div class="flex-align gap-4">
                                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="btn btn-outline-main rounded-pill py-9 w-100 mt-24">Continue Watching</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
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