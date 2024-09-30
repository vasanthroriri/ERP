<?php

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Fetch the 'id' from the query parameter
}else{
    $id =$_SESSION['user_id'];
}


$selQuery = "SELECT
`intern_id`
, `name`
, `phone`
, `email`
, `mode`
, `gender`
, `joining_date`
, `address`
, `image`
, `inte_cou_id`
, `duration`
, `payment`
, `username`
, `password`
FROM `internship_tbl` WHERE `status` ='Active'";
 
 $resQuery = mysqli_query($conn , $selQuery); 

 

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
        <?php include "formApplication.php"  ?>



        

        <div class="dashboard-body">



            <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">

                <!-- Breadcrumb Start -->

                <div class="breadcrumb mb-24">

                    <ul class="flex-align gap-4">

                        <li><a href="dashboard.php" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>

                        <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>

                        <li><span class="text-main-600 fw-normal text-15">Assignments</span></li>

                    </ul>

                </div>

                <!-- Breadcrumb End -->



            </div>

            

            <div class="d-flex justify-content-between mb-24">

                <!-- Back Button -->

                <div class="back-button">

                    <a href="http://stagingerp.inforiya.in/RoririSoftware/listOfInternship.php" class="btn btn-secondary">

                        <i class="ph ph-arrow-left"></i> Back

                    </a>

                </div>

        

                <!-- Add Button -->

                <div class="add-button">


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applicationModal">
                <i class="ph ph-plus"></i> Application
                 </button>

                </div>

            </div>

           

            <div class="card ">

                <div class="card-body p-0 overflow-x-auto">

                            <table id="studentTable" class="table table-lg table-striped w-100">

                                <thead>

                                    <tr>

                                        <th class="h6 text-gray-600 text-center">S.No</th>

                                        <th class="h6 text-gray-600 text-center">Date</th>

                                        <th class="h6 text-gray-600 text-center">Task</th>

                                        <th class="h6 text-gray-600 text-center">Description</th>

                                        <th class="h6 text-gray-600 text-center">Task Status</th>

                                        <th class="h6 text-gray-600 text-center">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td class="text-center">

                                            <span class="text-gray-600">1</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">28/09/2024</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">Create Web Page</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600 ">Basic</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-success-600 bg-success-100 py-2 px-10 rounded-pill">In Progress</span>

                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Edit</button>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td class="text-center">

                                            <span class="text-gray-600">Task 2</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">$250</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">06/22/2024</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-info-600 bg-info-100 py-2 px-10 rounded-pill">Unpaid</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">Professional</span>

                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Edit</button>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td class="text-center">

                                            <span class="text-gray-600">Task 3</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">$128</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">06/22/2024</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-success-600 bg-success-100 py-2 px-10 rounded-pill">Paid</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">Basic</span>

                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Edit</button>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td class="text-center">

                                            <span class="text-gray-600">Task 4</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">$132</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">06/22/2024</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-info-600 bg-info-100 py-2 px-10 rounded-pill">Unpaid</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">Basic</span>

                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Edit</button>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td class="text-center">

                                            <span class="text-gray-600">Task 5</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">$186</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">06/22/2024</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-success-600 bg-success-100 py-2 px-10 rounded-pill">Paid</span>

                                        </td>

                                        <td class="text-center">

                                            <span class="text-gray-600">Advance</span>

                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Edit</button>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                <!--<div class="card-footer flex-between flex-wrap">-->

                    

                <!--</div>-->

            </div>



            

        </div>

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

    <script>
    // Handle form submission via AJAX
    document.getElementById('submitFormBtn').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default button action

        // Get the form element
        const form = document.getElementById('applicationForm');

        // Validate the form before submitting
        if (!form.checkValidity()) {
            form.reportValidity(); // Show validation errors
            return;
        }

        // Create a FormData object to hold the form data
        let formData = new FormData(form);

        // Send the data via AJAX using Fetch API
        fetch('action/actApplication.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())  // Parse JSON response
        .then(result => {
            if (result.success) {
                // Display success message
                alert ('Application stored successfully!');
                
                // Reset form after successful submission
                form.reset();

                // Optionally, close modal or update UI
                $('#applicationModal').modal('hide'); // Assuming you're using Bootstrap
                // location.reload(); // Uncomment if you want to reload the page
            } else {
                alert ('Error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred while submitting the form.', 'danger');
        });
    });

   
</script>



<script>

    $(document).ready(function() {

        // Initialize DataTable on the studentTable

        var id = "<?php echo $id; ?>";
        $('#appli_id').val(id);

        $('#studentTable').DataTable({

            "paging": true,     // Enable pagination

            "searching": true,  // Enable search

            "ordering": true,   // Enable sorting

            "pageLength": 10,   // Number of entries per page

            "lengthChange": true,  // Option to change entries per page

            "language": {

                "search": "Search:",

                "lengthMenu": "Show _MENU_ entries"

            }

        });

    });

</script>



    </body>

</html>