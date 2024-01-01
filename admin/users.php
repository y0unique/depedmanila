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
                document.getElementById("ausers").classList.add("active");
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
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="#" data-id="" data-toggle="modal" data-target="#addUserModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add Users
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900" id="usersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>User Type</th>
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
    <?php include 'includes/modals/usersmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
      $('#usersTable').DataTable({
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/usersfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,4],
          'orderable' :false
        }]
      });
    } );

    //view user for edit modal
    $('#usersTable').on('click', '.edituserbtn ', function(event) {
        var table = $('#usersTable').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#editUserModal').modal('show');

        $.ajax({
        url: "includes/codes/userscode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_user_id').val(json.id);
            $('#_user_username').val(json.username);
            $('#_user_email').val(json.email);
            $('#_user_type').val(json.type);
            $('#_user_password').val(json.password);
            $('#_user_status').val(json.status);
            $('#_id').val(id);
            $('#_trid').val(trid);
        }
        })
    });
</script>