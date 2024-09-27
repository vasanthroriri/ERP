<!DOCTYPE php>
<php lang="en">
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
           
            <div class="row gy-4">
                <div class="col-lg-9">
                    <!-- Widgets Start -->
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">15/90</h4>
                                    <span class="text-gray-600">Available days</span>
                                    <div class="flex-between gap-8 mt-16">
                                        <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i class="ph-fill ph-book-open"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">3</h4>
                                    <span class="text-gray-600">Task Completed</span>
                                    <div class="flex-between gap-8 mt-16">
                                        <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i class="ph-fill ph-certificate"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">25+</h4>
                                    <span class="text-gray-600">Total Task</span>
                                    <div class="flex-between gap-8 mt-16">
                                        <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl"> <i class="ph-fill ph-graduation-cap"></i></span>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">PHP</h4>
                                    <span class="text-gray-600">Your Intern_Role</span>
                                    <div class="flex-between gap-8 mt-16">
                                        <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-warning-600 text-white text-2xl"><i class="ph-fill ph-users-three"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Widgets End -->
                    <!-- Top Course Start -->
                    <div class="card mt-24">
                        <div class="card-body">
                            <div class="mb-20 flex-between flex-wrap gap-8">
                                <h4 class="mb-0">Top Internship Pick for You</h4>
                                <a href="courses.php" class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                            </div>
                            
                            <div class="row g-20">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/fsd.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">Development</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">Full Stack</a></h5>

                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/ux.png" class="w-28 h-28 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Noble</a> </span>
                                                    </div>
                                                </div>
                                                <div class="flex-between gap-4 flex-wrap mt-24">
                                                    <div class="flex-align gap-4">
                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                    </div>
                                                    <a href="#" class="btn btn-outline-main rounded-pill py-9">Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/ux.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-warning-50 text-warning-600 mb-16">Design</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">Design System</a></h5>

                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img5.png" class="w-28 h-28 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Raj Kumar</a> </span>
                                                    </div>
                                                </div>
                                                <div class="flex-between gap-4 flex-wrap mt-24">
                                                    <div class="flex-align gap-4">
                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                    </div>
                                                    <a href="#" class="btn btn-outline-main rounded-pill py-9">Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card border border-gray-100">
                                        <div class="card-body p-8">
                                            <a href="#" class="bg-main-100 rounded-8 overflow-hidden text-center mb-8 h-164 flex-center p-8">
                                                <img src="assets/images/thumbs/react.png" alt="Course Image">
                                            </a>
                                            <div class="p-8">
                                                <span class="text-13 py-2 px-10 rounded-pill bg-danger-50 text-danger-600 mb-16">Frontend</span>
                                                <h5 class="mb-0"><a href="#" class="hover-text-main-600">React Native Courese</a></h5>

                                                <div class="flex-align gap-8 flex-wrap mt-16">
                                                    <img src="assets/images/thumbs/user-img6.png" class="w-28 h-28 rounded-circle object-fit-cover" alt="User Image">
                                                    <div>
                                                        <span class="text-gray-600 text-13">Created by <a href="profile.php" class="fw-semibold text-gray-700 hover-text-main-600 hover-text-decoration-underline">Vasanth</a> </span>
                                                    </div>
                                                </div>
                                                    <div class="flex-between gap-4 flex-wrap mt-24">
                                                    <div class="flex-align gap-4">
                                                        <span class="text-15 fw-bold text-warning-600 d-flex"><i class="ph-fill ph-star"></i></span>
                                                        <span class="text-13 fw-bold text-gray-600">4.9</span>
                                                        <span class="text-13 fw-bold text-gray-600">(12k)</span>
                                                    </div>
                                                    <a href="#" class="btn btn-outline-main rounded-pill py-9">Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Course End -->
                </div>

                <div class="col-lg-3">
                    <!-- Calendar Start -->
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar">
                                <div class="calendar__header">
                                    <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                                    <p class="display h6 mb-0">""</p>
                                    <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
                                </div>
                            
                                <div class="calendar__week week">
                                    <div class="calendar__week-text">Su</div>
                                    <div class="calendar__week-text">Mo</div>
                                    <div class="calendar__week-text">Tu</div>
                                    <div class="calendar__week-text">We</div>
                                    <div class="calendar__week-text">Th</div>
                                    <div class="calendar__week-text">Fr</div>
                                    <div class="calendar__week-text">Sa</div>
                                </div>
                                <div class="days"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Calendar End -->
                    
                    <!-- Assignment Start -->
                    <div class="card mt-24">
                        <div class="card-body">
                            <div class="mb-20 flex-between flex-wrap gap-8">
                                <h4 class="mb-0">Assignments</h4>
                                <a href="assignment.php" class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                            </div>
                            <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                <div class="flex-align flex-wrap gap-8">
                                    <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph-fill ph-graduation-cap"></i></span>
                                    <div>
                                        <h6 class="mb-0">Do The Research</h6>
                                    </div>
                                </div>
                                <a href="assignment.php" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                            </div>
                            <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                <div class="flex-align flex-wrap gap-8">
                                    <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-code"></i></span>
                                    <div>
                                        <h6 class="mb-0">PHP Dvelopment</h6>
                                    </div>
                                </div>
                                <a href="assignment.php" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                            </div>
                            <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1">
                                <div class="flex-align flex-wrap gap-8">
                                    <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-bezier-curve"></i></span>
                                    <div>
                                        <h6 class="mb-0">Graphic Design</h6>
                                    </div>
                                </div>
                                <a href="assignment.php" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Assignment End -->
                    
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
    function createCalendar(joiningDates ,color) {
        const calendarDaysContainer = document.querySelector('.days');

        function generateCalendar(year, month) {
            const date = new Date(year, month);
            const monthDays = new Date(year, month + 1, 0).getDate();

            calendarDaysContainer.innerHTML = ''; // Clear previous days

            for (let i = 1; i <= monthDays; i++) {
                const day = document.createElement('div');
                day.className = 'calendar__day';
                day.textContent = i;

                // Format date to check against joiningDates
                const currentDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;

                // Check if currentDate is in joiningDates
                if (joiningDates.includes(currentDate)) {
                    day.classList.add(color); // Add highlighted class
                }

                calendarDaysContainer.appendChild(day);
            }
        }

        // Call the function to generate the current month calendar
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth();
        generateCalendar(currentYear, currentMonth);
    }

    // Example usage of the createCalendar function
    const joiningDates = ['2024-09-15']; // Example joining dates
    const color = 'highlighted'; // Example joining dates
    const color_red = 'highlighted_red'; // Example joining dates
    createCalendar(joiningDates ,color_red);
</script>



    <script>
        function createChart(chartId, chartColor) {

            let currentYear = new Date().getFullYear();

            var options = {
            series: [
                {
                    name: 'series1',
                    data: [18, 25, 22, 40, 34, 55, 50, 60, 55, 65],
                },
            ],
            chart: {
                type: 'area',
                width: 80,
                height: 42,
                sparkline: {
                    enabled: true // Remove whitespace
                },

                toolbar: {
                    show: false
                },
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 1,
                colors: [chartColor],
                lineCap: 'round'
            },
            grid: {
                show: true,
                borderColor: 'transparent',
                strokeDashArray: 0,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },   
                yaxis: {
                    lines: {
                        show: false
                    }
                },  
                row: {
                    colors: undefined,
                    opacity: 0.5
                },  
                column: {
                    colors: undefined,
                    opacity: 0.5
                },  
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },  
            },
            fill: {
                type: 'gradient',
                colors: [chartColor], // Set the starting color (top color) here
                gradient: {
                    shade: 'light', // Gradient shading type
                    type: 'vertical',  // Gradient direction (vertical)
                    shadeIntensity: 0.5, // Intensity of the gradient shading
                    gradientToColors: [`${chartColor}00`], // Bottom gradient color (with transparency)
                    inverseColors: false, // Do not invert colors
                    opacityFrom: .5, // Starting opacity
                    opacityTo: 0.3,  // Ending opacity
                    stops: [0, 100],
                },
            },
            // Customize the circle marker color on hover
            markers: {
                colors: [chartColor],
                strokeWidth: 2,
                size: 0,
                hover: {
                    size: 8
                }
            },
            xaxis: {
                labels: {
                    show: false
                },
                categories: [`Jan ${currentYear}`, `Feb ${currentYear}`, `Mar ${currentYear}`, `Apr ${currentYear}`, `May ${currentYear}`, `Jun ${currentYear}`, `Jul ${currentYear}`, `Aug ${currentYear}`, `Sep ${currentYear}`, `Oct ${currentYear}`, `Nov ${currentYear}`, `Dec ${currentYear}`],
                tooltip: {
                    enabled: false,
                },
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        // Call the function for each chart with the desired ID and color
        createChart('complete-course', '#2FB2AB');
        createChart('earned-certificate', '#27CFA7');
        createChart('course-progress', '#6142FF');
        createChart('community-support', '#FA902F');


        // =========================== Double Line Chart Start ===============================
        function createLineChart(chartId, chartColor) {
            var options = {
            series: [
                {
                    name: 'Study',
                    data: [8, 15, 9, 20, 10, 33, 13, 22, 8, 17, 10, 15],
                },
                {
                    name: 'Test',
                    data: [8, 24, 18, 40, 18, 48, 22, 38, 18, 30, 20, 28],
                },
            ],
            chart: {
                type: 'area',
                width: '100%',
                height: 300,
                sparkline: {
                    enabled: false // Remove whitespace
                },
                toolbar: {
                    show: false
                },
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            colors: ['#3D7FF9', chartColor],  // Set the color of the series
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
                width: 1,
                colors: ["#3D7FF9", chartColor],
                lineCap: 'round',
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.9,  // Decrease this value to reduce opacity
                    opacityTo: 0.2,    // Decrease this value to reduce opacity
                    stops: [0, 100]
                }
            },
            grid: {
                show: true,
                borderColor: '#E6E6E6',
                strokeDashArray: 3,
                position: 'back',
                xaxis: {
                    lines: {
                        show: false
                    }
                },   
                yaxis: {
                    lines: {
                        show: true
                    }
                },  
                row: {
                    colors: undefined,
                    opacity: 0.5
                },  
                column: {
                    colors: undefined,
                    opacity: 0.5
                },  
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },  
            },
            // Customize the circle marker color on hover
            markers: {
                colors: ["#3D7FF9", chartColor],
                strokeWidth: 3,
                size: 0,
                hover: {
                    size: 8
                }
            },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: [`Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`],
                    tooltip: {
                        enabled: false,        
                    },
                    labels: {
                        formatter: function (value) {
                            return value;
                        },
                        style: {
                            fontSize: "14px"
                        }
                    },
                },
                yaxis: {
                        labels: {
                            formatter: function (value) {
                                return "$" + value + "Hr";
                            },
                            style: {
                                fontSize: "14px"
                            }
                        },
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetX: -10,
                    offsetY: -0
                }
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }
        createLineChart('doubleLineChart', '#27CFA7');
        // =========================== Double Line Chart End ===============================

        // ================================= Multiple Radial Bar Chart Start =============================
        var options = {
            series: [100, 60, 25],
            chart: {
                height: 172,
                type: 'radialBar',
            },
            colors: ['#3D7FF9', '#27CFA7', '#020203'], 
            stroke: {
                lineCap: 'round',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '30%',  // Adjust this value to control the bar width
                    },
                    dataLabels: {
                        name: {
                            fontSize: '16px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            formatter: function (w) {
                                return '82%'
                            }
                        }
                    }
                }
            },
            labels: ['Completed', 'In Progress', 'Not Started'],
        };

        var chart = new ApexCharts(document.querySelector("#radialMultipleBar"), options);
        chart.render();
        // ================================= Multiple Radial Bar Chart End =============================

        // ========================== Export Js Start ==============================
        document.getElementById('exportOptions').addEventListener('change', function() {
            const format = this.value;
            const table = document.getElementById('studentTable');
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
        
    </script>
    
    
    </body>
</php>