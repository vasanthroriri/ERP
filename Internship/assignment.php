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

                <!-- Breadcrumb Right Start -->
                <div class="flex-align gap-8 flex-wrap">
                    <div class="position-relative text-gray-500 flex-align gap-4 text-13">
                        <span class="text-inherit">Sort by: </span>
                        <div class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                            <span class="text-lg"><i class="ph ph-funnel-simple"></i></span>
                            <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                                <option value="1" selected>Popular</option>
                                <option value="1">Latest</option>
                                <option value="1">Trending</option>
                                <option value="1">Matches</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                        <span class="text-lg"><i class="ph ph-layout"></i></span>
                        <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center" id="exportOptions">
                            <option value="" selected disabled>Export</option>
                            <option value="csv">CSV</option>
                            <option value="json">JSON</option>
                        </select>
                    </div>
                </div>
                <!-- Breadcrumb Right End -->
            </div>
           
            <div class="card overflow-hidden">
                <div class="card-body p-0 overflow-x-auto">
                            <table id="studentTable" class="table table-lg table-striped w-100">
                                <thead>
                                    <tr>
                                        <th class="h6 text-gray-600 text-center">Task</th>
                                        <th class="h6 text-gray-600 text-center">Amount</th>
                                        <th class="h6 text-gray-600 text-center">Dates</th>
                                        <th class="h6 text-gray-600 text-center">Status</th>
                                        <th class="h6 text-gray-600 text-center">Plan</th>
                                        <th class="h6 text-gray-600 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <span class="text-gray-600">Task 1</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-gray-600">$180</span>
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
                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Download</button>
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
                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Download</button>
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
                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Download</button>
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
                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Download</button>
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
                                            <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-12">Download</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                <div class="card-footer flex-between flex-wrap">
                    <span class="text-gray-900">Showing 1 to 10 of 12 entries</span>
                    <ul class="pagination flex-align flex-wrap">
                        <li class="page-item active">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">8</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">9</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link h-44 w-44 flex-center text-15 rounded-8 fw-medium" href="#">10</a>
                        </li>
                    </ul>
                </div>
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

// ========================== Export Js Start ==============================
        document.getElementById('exportOptions').addEventListener('change', function() {
            const format = this.value;
            const table = document.getElementById('assignmentTable');
            let data = [];
            const headers = [];
            
            // Get the table headers
            table.querySelectorAll('thead th').forEach(th => {
                headers.push(th.innerText.trim());
            });

            // Get the table rows
            table.querySelectorAll('tbody tr').forEach(tr => {
                const row = {};
                tr.querySelectorAll('td').forEach((td, index) => {
                    row[headers[index]] = td.innerText.trim();
                });
                data.push(row);
            });

            if (format === 'csv') {
                downloadCSV(data);
            } else if (format === 'json') {
                downloadJSON(data);
            }
        });

        function downloadCSV(data) {
            const csv = data.map(row => Object.values(row).join(',')).join('\n');
            const blob = new Blob([csv], { type: 'text/csv' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'students.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function downloadJSON(data) {
            const json = JSON.stringify(data, null, 2);
            const blob = new Blob([json], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'students.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
        // ========================== Export Js End ==============================
    
        // Table Header Checkbox checked all js Start
        $('#selectAll').on('change', function () {
            $('.form-check .form-check-input').prop('checked', $(this).prop('checked')); 
        }); 
    
        // Data Tables
        new DataTable('#assignmentTable', {
            searching: false,
            lengthChange: false,
            info: false,   // Bottom Left Text => Showing 1 to 10 of 12 entries
            paging: false,
            "columnDefs": [
                { "orderable": false, "targets": [0, 6] } // Disables sorting on the 7th column (index 6)
            ]
        });
    </script>

    </body>
</html>