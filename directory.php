<?php 
    // include 'admin/headers/permission_policy_config.php';
    include 'admin/database/connection.php';
    include 'admin/database/code.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Directory of Schools | Deped Manila</title>
        <meta name="viewport"    content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Department of Education Manila" />
        <meta name="keywords"    content="DepEd, Manila, Schools Division, Division of City Schools, Website of DepEd Manila, Official Website" />
        <meta name="author"      content="zeraphm"  />
        <!-- favicon -->
        <link rel="shortcut icon" href="admin/images/logo/favicon.ico">
        <!-- Magnific -->
        <link href="admin/css/home/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- css -->
        <link href="admin/css/home/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/css/home/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="admin/css/home/style.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->        
        <link rel="stylesheet" href="admin/css/home/slick-theme.css"/>
        <link rel="stylesheet" href="admin/css/home/slick.css"/>
        
        <!-- Data Table -->
        <link rel="stylesheet" href="admin/datatables/dataTables.bootstrap5.min.css">
		<script defer src="admin/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- Scripts -->
        <script defer src="admin/js/home/script.js"></script>
    </head>

    <?php include 'admin/includes/home/preloader.php'; ?>
    <body>
        <!-- Navbar Start -->
        <?php 
            include 'admin/includes/home/navbar.php'; 
            echo '<script>document.getElementById("aboutus").classList.add("active");</script>';
        ?>
        <!-- Navbar End -->
        
        <!-- Directory of Schools Start -->
        <section class="section bg-light" id="directory">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-custom" href="index.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">About Us</li>
                        <li class="breadcrumb-item active" aria-current="page">Directory</li>
                    </ol>
                </nav>

                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title text-uppercase mb-4">Directory of Schools</h4>
                            <p class="text-danger mx-auto para-desc mb-0" style="font-style: italic;"> *To look for a school, please use the search field to filter the table.*</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                
                <div class="row mt-4">
                    <div class="col-12">
                        <!-- Tab navigation -->
                        <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                            <?php
                                // Array containing issuance types and their corresponding icons
                                $schoolstype1 = array(
                                    "elementary-school" => array("mdi-chair-school", "ELEMENTARY SCHOOLS"),
                                    "junior-high-school" => array("mdi mdi-bus-school", "JUNIOR HIGH SCHOOLS"),
                                    "senior-high-school" => array("mdi-school", "SENIOR HIGH SCHOOLS"),
                                    "special-education" => array("mdi-star-outline", "SPECIAL EDUCATION CENTERS"),
                                );
                                // Iterate through the issuance types array to generate tabs
                                foreach ($schoolstype1 as $tabId => $tabInfo) {
                                    $iconClass = $tabInfo[0];
                                    $title = $tabInfo[1];
                                    $isActive = ($tabId === "elementary-school") ? "active" : "";
                                    echo '<li class="nav-item mb-4 pt-2">';
                                    echo '<a class="nav-link ' . $isActive . '" id="' . $tabId . '-tab" data-toggle="pill" href="#' . $tabId . '" role="tab" aria-controls="' . $tabId . '" aria-selected="false">';
                                    echo '<div class="capabilities text-center rounded pt-2 pb-2">';
                                    echo '<div class="icon bg-custom mb-3">';
                                    echo '<i class="mdi ' . $iconClass . ' text-white"></i>';
                                    echo '</div>';
                                    echo '<h4 class="title font-weight-normal mb-0">' . $title . '</h4>';
                                    echo '</div>';
                                    echo '</a><!--end nav link-->';
                                    echo '</li><!--end nav item-->';
                                }
                            ?>
                        </ul><!--end nav pills-->

                        <!-- Tab content -->
                        <div class="tab-content mt-3" id="pills-tabContent">
                            <?php
                                // Iterate through the issuance types array to generate tab content
                                foreach ($schoolstype1 as $tabId => $tabInfo) {
                                    $isActive = ($tabId === "elementary-school") ? "show active" : "";
                                    echo '<div class="tab-pane fade ' . $isActive . '" id="' . $tabId . '" role="tabpanel" aria-labelledby="' . $tabId . '-tab">';
                                    echo '<div class="capabilities-content border rounded p-4">';
                                    echo '<div class="row align-items-center">';
                                    echo '<div class="col-md-12">';
                                    echo '<h4 class="title">' . $tabInfo[1] . '</h4>';
                                    echo '<table id="' . $tabId . '-table" class="table table-striped" style="width:100%">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th>District</th>';
                                            echo '<th>School ID</th>';
                                            echo '<th>School</th>';
                                            echo '<th>School Address</th>';
                                            echo '<th>Principal</th>';
                                            echo '<th>Contact #</th>';
                                            echo '<th>Email</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    
                                    echo '</tbody>';
                                    echo '</table>';
                                    echo '</div><!--end col-->';
                                    echo '</div><!--end row-->';
                                    echo '</div>';
                                    echo '</div><!--end teb pane-->';
                                }
                            ?>
                        </div><!--end tab content-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Directory of Schools End -->

        <!-- Seals Start -->
        <?php include 'admin/includes/home/seals.php'; ?>
        <!-- Seals End -->

        <!-- Footer Start -->
        <?php include 'admin/includes/home/footer.php'; ?>
        <!-- Footer End -->
        <!-- Scripts -->
        <?php include 'admin/includes/home/scripts.php'; ?>     
    </body>
    
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</html>
<!-- style for table -->
<style>
/* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
        overflow-x: scroll;
    }
 
    tr { height: 50px; }
    /* table{ 
        width: 100% !important;
        table-layout: fixed;
    } */
</style>
<!-- script for fetchdata -->
<script>
$(document).ready(function() {
    // Function to initialize DataTables
    function initializeDataTables() {
        $('#elementary-school-table').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide': 'true',
            'processing': 'true',
            'paging': 'true',
            'order': [],
            'ajax': {
                'url': 'admin/includes/fetchdata/elemschoolfetch.php',
                'type': 'post',
            },
            "columnDefs": [{
                'target': [0, 7],
                'orderable': false
            }]
        });

        $('#junior-high-school-table').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide': 'true',
            'processing': 'true',
            'paging': 'true',
            'order': [],
            'ajax': {
                'url': 'admin/includes/fetchdata/jhschoolfetch.php',
                'type': 'post',
            },
            "columnDefs": [{
                'target': [0, 7],
                'orderable': false
            }]
        });

        $('#senior-high-school-table').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide': 'true',
            'processing': 'true',
            'paging': 'true',
            'order': [],
            'ajax': {
                'url': 'admin/includes/fetchdata/shschoolfetch.php',
                'type': 'post',
            },
            "columnDefs": [{
                'target': [0, 7],
                'orderable': false
            }]
        });

        $('#special-education-table').DataTable({
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide': 'true',
            'processing': 'true',
            'paging': 'true',
            'order': [],
            'ajax': {
                'url': 'admin/includes/fetchdata/spedschoolfetch.php',
                'type': 'post',
            },
            "columnDefs": [{
                'target': [0, 7],
                'orderable': false
            }]
        });
    }

    // Call the function initially
    initializeDataTables();

    // Refresh the DataTables every 5 seconds
    setInterval(function() {
        // Destroy existing DataTables instances
        $('#elementary-school-table').DataTable().destroy();
        $('#junior-high-school-table').DataTable().destroy();
        $('#senior-high-school-table').DataTable().destroy();
        $('#special-education-table').DataTable().destroy();

        // Re-initialize DataTables
        initializeDataTables();
    }, 100000); // 10000 milliseconds = 10 mins
});
</script>