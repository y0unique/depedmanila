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
                document.getElementById("files").classList.add("active");
                document.getElementById("collapseFiles").classList.add("show");
                document.getElementById("afiles").classList.add("active");
                document.getElementById("acollapseFiles").classList.remove("collapsed");
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
                        <h1 class="h3 mb-0 text-gray-800">Files</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="#" data-id="" data-toggle="modal" data-target="#addFilesModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add Files
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Files Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900" id="filesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Published Date</th>
                                            <th>Closing Date</th>
                                            <th>Awarded To</th>
                                            <th>Reference Number</th>
                                            <th>Procurement Mode</th>
                                            <th>Status</th>
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
    <?php include 'includes/modals/filesmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
      $('#filesTable').DataTable({
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/filesfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,10],
          'orderable' :false
        }]
      });
    } );

    //view Files for edit modal
    $('#filesTable').on('click', '.editfilebtn ', function(event) {
        var table = $('#filesTable').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#editFilesModal').modal('show');

        $.ajax({
        url: "includes/codes/filescode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);
            $('#_file_type').val(json.type);
            $('#_file_title').val(json.title);
            $('#_file_link').val(json.link);
            $('#_file_publishDate').val(json.publish_date);
            $('#_file_closingDate').val(json.closing_date);
            $('#_awarded_to').val(json.awarded_to);
            $('#_reference_number').val(json.reference_number);
            $('#_procurement_mode').val(json.procurement_mode);
            $('#_id').val(id);
            $('#_trid').val(trid);
        }
        })
    });
</script>