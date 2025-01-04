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
                document.getElementById("bac").classList.add("active");
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
                            <a href="#" data-id="" data-toggle="modal" data-target="#addBacFilesModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add BAC Files
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Files Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900" id="bacfilesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>Date Uploaded</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Material list -->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Downloadables -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseDownloadables" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseDownloadables">
                                    <h6 class="m-0 font-weight-bold text-primary">Invitation To Bid</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseDownloadables">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="downloadablesTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Title</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Materials -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseMaterials" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseMaterials">
                                    <h6 class="m-0 font-weight-bold text-primary">Procurement Files</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseMaterials">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="materialsTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Department</th> 
                                                        <th>Title</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    <?php include 'includes/modals/bacmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#bacfilesTable').DataTable({
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide':'true',
            'processing':'true',
            'paging':'true',
            'order':[],
            'ajax': {
                'url':'includes/fetchdata/bacfetch.php',
                'type':'post',
            },
            "columnDefs": [{
                'target':[0,12],
                'orderable' :false
            }]
        });
    });
    
    //add file
    $(document).on('submit','#addBacFiles',function(e){
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var bacfile_type = $('#bacfile_type').val();
        var file_title = $('#file_title').val();
        var file_link = $('#file_link').val();
        var file_department = $('#file_department').val();

        if(bacfile_type != '' && file_title != '' && file_link != ''){
            $.ajax({
                url:"includes/codes/baccode.php",
                type:"post",
                data:
                {
                    webID:webID,
                    webUsername:webUsername,
                    bacfile_type:bacfile_type,
                    file_title:file_title,
                    file_link:file_link,
                    file_department:file_department,
                    add: true
                },
                success:function(data){
                    var json = JSON.parse(data);
                    var addBacFileStatus = json.addBacFileStatus;
                    if(addBacFileStatus =='true'){
                        mytable =$('#bacfilesTable').DataTable();
                        mytable.draw();
                        mytable =$('#downloadablesTable').DataTable();
                        mytable.draw();
                        mytable =$('#materialsTable').DataTable();
                        mytable.draw();
                        $('#addBacFilesModal').modal('hide');
                        $('#addBacFiles')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(json.message);
                    }else if(addBacFileStatus == 'false'){
                        alertify.set('notifier','position', 'top-right');
            	        alertify.warning(json.message);
                    }else{
                        alert('Error communicating with the database');
                    }
                }
            });
        } else {
            alert('Fill all the required fields');
        }
    });

    // view Files for edit modal
    $('#bacfilesTable').on('click', '.editbacfilebtn ', function(event) {
        var table = $('#bacfilesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#editFilesModal').modal('show');

        // Fetch file details using AJAX
        $.ajax({
            url: "includes/codes/baccode.php",
            data: {
                id: id,
                view: true
            },
            type: 'post',
            success: function(data) {
                var json = JSON.parse(data);

                // Populate modal fields with data
                $('#_bacfile_type').val(json.type);
                $('#_file_title').val(json.title);
                $('#_file_link').val(json.link);
                $('#_file_department').val(json.department);
                $('#_id').val(id);
                $('#_trid').val(trid);

                // Disable/enable text areas based on initial _bacfile_type
                disableElementsBasedOnFileType(json.type);
            }
        });
    });

    // Handle change event of _bacfile_type dropdown
    $('#_bacfile_type').change(function() {
        disableElementsBasedOnFileType($(this).val());
    });

    //edit files
    $(document).on('submit', '#editFiles', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var bacfile_type = $('#_bacfile_type').val();
        var file_title = $('#_file_title').val();
        var file_link = $('#_file_link').val();
        var file_department = $('#_file_department').val();
        var id = $('#_id').val();
        var trid = $('#_trid').val();
        if (bacfile_type != '' && file_title != '' && file_link != '') {
        $.ajax({
            url: "includes/codes/baccode.php",
            type: "post",
            data: {
                webID:webID,
                webUsername:webUsername,
                id: id,
                bacfile_type:bacfile_type,
                file_title:file_title,
                file_link:file_link,
                file_department:file_department,
                update: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var editFileStatus = json.editFileStatus;
                if (editFileStatus == 'true') {
                    $('#bacfilesTable').DataTable().destroy();
                    mytable = $('#bacfilesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/bacfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 12],
                            'orderable': false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(json.message);
                    $('#editFilesModal').modal('hide');
                }else if(editFileStatus == 'false'){
                    alertify.set('notifier','position', 'top-right');
                    alertify.warning(json.message);
                }else{
                    alert('Error communicating with the database');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });


    //view issuance for delete modal
    $('#bacfilesTable').on('click', '.deletebacfilebtn ', function(event) {
        var table = $('#bacfilesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#deleteFilesModal').modal('show');

        $.ajax({
        url: "includes/codes/baccode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_bacfile_type_').val(json.type);
            $('#_file_title_').val(json.title);
            $('#_status_').val(json.status);
            $('#_id_').val(id);
            $('#_trid_').val(trid);
        }
        })
    });


    //delete File
    $(document).on('submit', '#deleteFiles', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var bacfile_type = $('#_bacfile_type_').val();
        var file_title = $('#_file_title_').val();
        var status= $('#_status_').val();
        var id = $('#_id_').val();
        var trid = $('#_trid_').val();
        if (bacfile_type != '' && file_title != '') {
        $.ajax({
            url: "includes/codes/baccode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                bacfile_type:bacfile_type,
                file_title:file_title,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var deleteFileStatus = json.deleteFileStatus;
                if (deleteFileStatus == 'true') {
                    $('#bacfilesTable').DataTable().destroy();
                    mytable = $('#bacfilesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/bacfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 12],
                            'orderable': false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.defaults.notifier.classes = 'custom-notifier';
                    alertify.success(json.message);
                    $('#deleteFilesModal').modal('hide');
                } else {
                    alert('Error communicating with the database');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });

    //clear modal add
    $('#addBacFilesModal').on('hidden.bs.modal', function() {
        $('#addBacFiles')[0].reset();
    });
    //clear modal edit
    $('#editFilesModal').on('hidden.bs.modal', function() {
        $('#editFiles')[0].reset();
    });
    //clear modal delete
    $('#deleteFilesModal').on('hidden.bs.modal', function() {
        $('#deleteFiles')[0].reset();
    });
</script>