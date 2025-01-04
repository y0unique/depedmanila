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
                                            <th>Department</th>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Downloadable Files</h6>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Material Files</h6>
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
    <?php include 'includes/modals/filesmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#filesTable').DataTable({
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
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
                'target':[0,6],
                'orderable' :false
            }]
        });
    });
    $(document).ready(function() {
      $('#downloadablesTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/downloadablesfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,2],
          'orderable' :false
        }]
      });
    } );
    $(document).ready(function() {
      $('#materialsTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/materialsfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,3],
          'orderable' :false
        }]
      });
    } );
    //add file
    $(document).on('submit','#addFiles',function(e){
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var file_type = $('#file_type').val();
        var file_title = $('#file_title').val();
        var file_link = $('#file_link').val();
        var file_department = $('#file_department').val();

        if(file_type != '' && file_title != '' && file_link != ''){
            $.ajax({
                url:"includes/codes/filescode.php",
                type:"post",
                data:
                {
                    webID:webID,
                    webUsername:webUsername,
                    file_type:file_type,
                    file_title:file_title,
                    file_link:file_link,
                    file_department:file_department,
                    add: true
                },
                success:function(data){
                    var json = JSON.parse(data);
                    var addFileStatus = json.addFileStatus;
                    if(addFileStatus =='true'){
                        mytable =$('#filesTable').DataTable();
                        mytable.draw();
                        mytable =$('#downloadablesTable').DataTable();
                        mytable.draw();
                        mytable =$('#materialsTable').DataTable();
                        mytable.draw();
                        $('#addFilesModal').modal('hide');
                        $('#addFiles')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(json.message);
                    }else if(addFileStatus == 'false'){
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
    $('#filesTable').on('click', '.editfilebtn ', function(event) {
        var table = $('#filesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#editFilesModal').modal('show');

        // Fetch file details using AJAX
        $.ajax({
            url: "includes/codes/filescode.php",
            data: {
                id: id,
                view: true
            },
            type: 'post',
            success: function(data) {
                var json = JSON.parse(data);

                // Populate modal fields with data
                $('#_file_type').val(json.type);
                $('#_file_title').val(json.title);
                $('#_file_link').val(json.link);
                $('#_file_department').val(json.department);
                $('#_id').val(id);
                $('#_trid').val(trid);

                // Disable/enable text areas based on initial _file_type
                disableElementsBasedOnFileType(json.type);
            }
        });
    });

    // Handle change event of _file_type dropdown
    $('#_file_type').change(function() {
        disableElementsBasedOnFileType($(this).val());
    });

    //edit files
    $(document).on('submit', '#editFiles', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var file_type = $('#_file_type').val();
        var file_title = $('#_file_title').val();
        var file_link = $('#_file_link').val();
        var file_department = $('#_file_department').val();
        var id = $('#_id').val();
        var trid = $('#_trid').val();
        if (file_type != '' && file_title != '' && file_link != '') {
        $.ajax({
            url: "includes/codes/filescode.php",
            type: "post",
            data: {
                webID:webID,
                webUsername:webUsername,
                id: id,
                file_type:file_type,
                file_title:file_title,
                file_link:file_link,
                file_department:file_department,
                update: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var editFileStatus = json.editFileStatus;
                if (editFileStatus == 'true') {
                    $('#filesTable').DataTable().destroy();
                    mytable = $('#filesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/filesfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    $('#downloadablesTable').DataTable().destroy();
                    $('#downloadablesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/downloadablesfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,2],
                        'orderable' :false
                        }]
                    });
                    $('#materialsTable').DataTable().destroy();
                    $('#materialsTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/materialsfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,3],
                        'orderable' :false
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
    $('#filesTable').on('click', '.deletefilebtn ', function(event) {
        var table = $('#filesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#deleteFilesModal').modal('show');

        $.ajax({
        url: "includes/codes/filescode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_file_type_').val(json.type);
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
        var file_type = $('#_file_type_').val();
        var file_title = $('#_file_title_').val();
        var status= $('#_status_').val();
        var id = $('#_id_').val();
        var trid = $('#_trid_').val();
        if (file_type != '' && file_title != '') {
        $.ajax({
            url: "includes/codes/filescode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                file_type:file_type,
                file_title:file_title,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var deleteFileStatus = json.deleteFileStatus;
                if (deleteFileStatus == 'true') {
                    $('#filesTable').DataTable().destroy();
                    mytable = $('#filesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/filesfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    $('#downloadablesTable').DataTable().destroy();
                    $('#downloadablesTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/downloadablesfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,2],
                        'orderable' :false
                        }]
                    });
                    $('#materialsTable').DataTable().destroy();
                    $('#materialsTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/materialsfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,3],
                        'orderable' :false
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
    $('#addFilesModal').on('hidden.bs.modal', function() {
        $('#addFiles')[0].reset();
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