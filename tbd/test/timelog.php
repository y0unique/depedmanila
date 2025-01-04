<?php
    //include database
    include 'database/connection.php';
    session_start();
    //check if user is not logged in
    if(!isset($_SESSION['webID']) && !isset($_SESSION['webUsername'])){
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'includes/sidebar.php';
        echo '<script>
                document.getElementById("management").classList.add("active");
                document.getElementById("collapseUsers").classList.add("show");
                document.getElementById("atimelog").classList.add("active");
                document.getElementById("acollapseUsers").classList.remove("collapsed");
              </script>';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'includes/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Time Log</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <h6 class="m-0 font-weight-bold text-primary">Time Log Table</h6>
                            <?php
                                if($_SESSION['webType']== "superadmin"){?>
                                    <a href="#" data-id="" data-toggle="modal" data-target="#clearLogModal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash fa-sm text-white-50"></i> Clear Log
                                    </a>
                            <?php }?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900" id="timelogTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Action Taken</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- scripts -->
    <?php include 'includes/scripts.php'; ?>

    <!-- modals -->
    <?php include 'includes/modals/timelogmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#timelogTable').DataTable({
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide':'true',
            'processing':'true',
            'paging':'true',
            'order':[],
            'ajax': {
                'url':'includes/fetchdata/timelogfetch.php',
                'type':'post',
            },
            "columnDefs": [{
                'target':[0,5],
                'orderable' :false
            }]
        });
    } );

    //Clear Log
    $(document).on('submit', '#clearLog', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var status= $('#_status_').val();
        if (webID != '' && webUsername != '') {
        $.ajax({
            url: "includes/codes/timeLogcode.php",
            type: "post",
            data: {
                webID:webID,
                webUsername:webUsername,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var clearLogStatus = json.clearLogStatus;
                if (clearLogStatus == 'true') {
                    $('#timelogTable').DataTable().destroy();
                    mytable = $('#timelogTable').DataTable({
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/timelogfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.defaults.notifier.classes = 'custom-notifier';
                    alertify.success(json.message);
                    $('#clearLogModal').modal('hide');
                } else {
                    alert('Error communicating with the database');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });
</script>