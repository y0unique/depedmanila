<?php 
    // include 'admin/headers/permission_policy_config.php';
    include 'admin/database/home/connection.php';
    include 'admin/database/home/code.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Resources | Deped Manila</title>
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

        <link rel="stylesheet" href="admin/datatables/dataTables.bootstrap5.min.css">
        <script defer src="admin/datatables/jquery-3.7.0.js"></script>
		<script defer src="admin/datatables/jquery.dataTables.min.js"></script>
		<script defer src="admin/datatables/dataTables.bootstrap5.min.js"></script>
		<script defer src="admin/datatables/dataTables.fixedColumns.min.js"></script>

        <script defer src="admin/js/home/script.js"></script>

        <script>
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault();
            });
            document.addEventListener('keydown', function (e) {
                if (e.code === 'KeyU' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                }
            });
        </script>
    </head>

    <?php include 'admin/includes/home/preloader.php'; ?>
    <body>
        <!-- Navbar Start -->
        <?php 
            include 'admin/includes/home/navbar.php'; 
            echo '<script>document.getElementById("resources").classList.add("active");</script>';
        ?>
        <!-- Navbar End -->
        
        <!-- Resources Start -->
        <section class="section" id="resources">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title text-uppercase mb-4">Resources</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                
                <div class="row mt-4">
                    <div class="col-12">
                    <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                            <?php
                                $filestype1 = array(
                                    "downloadables" => array("mdi mdi-file", "DOWNLOADABLES"),
                                    "materials" => array("mdi mdi-file-alert", "MATERIALS"),
                                );
                                foreach ($filestype1 as $tabId => $tabInfo) {
                                    $iconClass = $tabInfo[0];
                                    $title = $tabInfo[1];
                                    $isActive = ($tabId === "downloadables") ? "active" : "";
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
                                foreach ($filestype1 as $tabId => $tabInfo) {
                                    echo "<script>console.log('" . $tabInfo[1] . "');</script>";
                                    $isActive = ($tabId === "downloadables") ? "show active" : "";
                                    echo '<div class="tab-pane fade ' . $isActive . '" id="' . $tabId . '" role="tabpanel" aria-labelledby="' . $tabId . '-tab">';
                                    echo '<div class="capabilities-content border rounded p-4">';
                                    echo '<div class="row align-items-center">';
                                    echo '<div class="col-md-12">';
                                    echo '<h4 class="title">' . $tabInfo[1] . '</h4>';
                                    echo '<table id="' . $tabId . '-table" class="table table-striped" style="width:100%">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th>Date</th> ';
                                    if($tabId=='downloadables'){
                                        echo '<th style="display:none;">Department</th>  ';
                                    }else{
                                        echo '<th>Department</th>  ';
                                    }
                                    echo '<th>Title</th> ';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    $files = "SELECT * FROM filesvw WHERE status = 'active'AND type = '" . $tabInfo[1] . "' ORDER BY date DESC";
                                    $files1 = mysqli_query($con, $files);
                                    while($row = mysqli_fetch_array($files1)){
                                        echo '<tr>';
                                        echo '<td>'.$row['date'].'</td>';
                                        if($tabId=='downloadables'){
                                            echo '<td style="display:none;">'.$row['department'].'</td>';
                                        }else{
                                            echo '<td>'.$row['department'].'</td>';
                                        }
                                        echo '<td><a class="text-primary" href="'.$row['link'].'" target="_blank">'.$row['title'].'</a></td>';
                                        echo '</tr>';
                                    }
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
        <!-- Resources End -->

        <!-- Seals Start -->
        <?php include 'admin/includes/home/seals.php'; ?>
        <!-- Seals End -->

        <!-- Footer Start -->
        <?php include 'admin/includes/home/footer.php'; ?>
        <!-- Footer End -->
        <!-- Scripts -->
        <?php include 'admin/includes/home/scripts.php'; ?>

                
    </body>

</html>
<style>
/* Ensure that the demo table scrolls */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
        overflow-x: scroll;
    }
 
    tr { height: 50px; }
</style>