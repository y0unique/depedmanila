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
        echo '  <script>
                    document.getElementById("issuances").classList.add("active");
                    document.getElementById("collapseIssuances").classList.add("show");
                    document.getElementById("aIssuances").classList.add("active");
                    document.getElementById("acollapseIssuances").classList.remove("collapsed");
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
                        <h1 class="h3 mb-0 text-gray-800">Issuances</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="#" data-id="" data-toggle="modal" data-target="#addIssuancesModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add Issuance
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Issuances Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900 " id="issuancesTable" width="100%" cellspacing="0" table-layout="auto">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>Tracking Number</th>
                                            <th>Memo #</th>
                                            <th>Memo Type</th>
                                            <th>Memo Date</th>
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
    <?php include 'includes/modals/issuancesmodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#issuancesTable').DataTable({
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('issuances_id', aData[0]);
            },
            'serverSide':'true',
            'processing':'true',
            'paging':'true',
            'order':[],
            'ajax': {
                'url':'includes/fetchdata/issuancesfetch.php',
                'type':'post',
            },
            "columnDefs": [{
                'target':[0,6],
                'orderable' :false
            }]
        });
    });

    //add issuances
    $(document).on('submit','#addIssuances',function(e){
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var tracking_number= $('#tracking_number').val();
        var issuances_type= $('#issuances_type').val();
        var issuances_title= $('#issuances_title').val();
        var issuances_link= $('#issuances_link').val();
        var issuances_number= $('#issuances_number').val();
        var issuances_date= $('#issuances_date').val();

        if(tracking_number != '' && issuances_type != '' && issuances_title != ''&& issuances_link != '' && issuances_number != '' && issuances_date != ''){
            $.ajax({
                url:"includes/codes/issuancescode.php",
                type:"post",
                data:
                {
                    webID:webID,
                    webUsername:webUsername,
                    tracking_number:tracking_number,
                    issuances_type:issuances_type,
                    issuances_title:issuances_title,
                    issuances_link:issuances_link,
                    issuances_number:issuances_number,
                    issuances_date:issuances_date,
                    add: true
                },
                success:function(data){
                    var json = JSON.parse(data);
                    var addIssuanceStatus = json.addIssuanceStatus;
                    if(addIssuanceStatus =='true'){
                        mytable =$('#issuancesTable').DataTable();
                        mytable.draw();
                        $('#addIssuancesModal').modal('hide');
                        $('#addIssuances')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(json.message);
                    }else{
                        alert('failed');
                    }
                }
            });
        } else {
            alert('Fill all the required fields');
        }
    });

    //view issuance for edit modal
    $('#issuancesTable').on('click', '.editissuancebtn ', function(event) {
        var table = $('#issuancesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('issuances_id');
        $('#editIssuancesModal').modal('show');

        $.ajax({
        url: "includes/codes/issuancescode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_tracking_number').val(json.tracking_number);
            $('#_issuances_title').val(json.issuances_title);
            $('#_issuances_link').val(json.issuances_link);
            $('#_issuances_number').val(json.issuances_number);
            $('#_issuances_date').val(json.issuances_date);
            $('#_issuances_type').val(json.issuances_type);
            $('#_issuances_status').val(json.issuances_status).change();

            // Check if issuances_status is "active"
            if ($('#_issuances_status').val() == 'active') {
                // Show the issuance status container
                $('#issuanceStatusContainer').attr('hidden', 'hidden');
            } else {
                // Hide the issuance status container
                $('#issuanceStatusContainer').removeAttr('hidden');
            }


            $('#_id').val(id);
            $('#_trid').val(trid);
        }
        })
    });

    //edit issuances
    $(document).on('submit', '#editIssuances', function(e) {
        e.preventDefault();;
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var tracking_number = $('#_tracking_number').val();
        var issuances_title= $('#_issuances_title').val();
        var issuances_link= $('#_issuances_link').val();
        var issuances_number= $('#_issuances_number').val();
        var issuances_date= $('#_issuances_date').val();
        var issuances_type= $('#_issuances_type').val();
        var issuances_status= $('#_issuances_status').val();
        var id = $('#_id').val();
        var trid = $('#_trid').val();
        if (tracking_number != '' && issuances_title != '' && issuances_link != '' && issuances_number != '' && issuances_date != '' && issuances_type != '' && issuances_status != '') {
        $.ajax({
            url: "includes/codes/issuancescode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                tracking_number:tracking_number,
                issuances_title:issuances_title,
                issuances_link:issuances_link,
                issuances_number:issuances_number,
                issuances_date:issuances_date,
                issuances_type:issuances_type,
                issuances_status:issuances_status,
                update: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var editIssuanceStatus = json.editIssuanceStatus;
                if (editIssuanceStatus == 'true') {
                    $('#issuancesTable').DataTable().destroy();
                    mytable = $('#issuancesTable').DataTable({
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/issuancesfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(json.message);
                    $('#editIssuancesModal').modal('hide');
                } else if(editIssuanceStatus == 'false'){
                    alertify.set('notifier','position', 'top-right');
            	    alertify.error(json.message);
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
    $('#issuancesTable').on('click', '.deleteissuancebtn ', function(event) {
        var table = $('#issuancesTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('issuances_id');
        $('#deleteIssuancesModal').modal('show');

        $.ajax({
        url: "includes/codes/issuancescode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_tracking_number_').val(json.tracking_number);
            $('#_issuances_title_').val(json.issuances_title);
            $('#_status_').val(json.tracking_status);
            $('#_id_').val(id);
            $('#_trid_').val(trid);
        }
        })
    });

    //delete issuances
    $(document).on('submit', '#deleteIssuances', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var tracking_number = $('#_tracking_number_').val();
        var issuances_title = $('#_issuances_title_').val();
        var status= $('#_status_').val();
        var id = $('#_id_').val();
        var trid = $('#_trid_').val();
        if (tracking_number != '' && issuances_title != '') {
        $.ajax({
            url: "includes/codes/issuancescode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                tracking_number:tracking_number,
                issuances_title:issuances_title,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var deleteIssuanceStatus = json.deleteIssuanceStatus;
                if (deleteIssuanceStatus == 'true') {
                    $('#issuancesTable').DataTable().destroy();
                    mytable = $('#issuancesTable').DataTable({
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/issuancesfetch.php',
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
                    $('#deleteIssuancesModal').modal('hide');
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
    $('#addIssuancesModal').on('hidden.bs.modal', function() {
        $('#addIssuances')[0].reset();
    });
    //clear modal edit
    $('#editIssuancesModal').on('hidden.bs.modal', function() {
        $('#editIssuances')[0].reset();
    });
    //clear modal delete
    $('#deleteIssuancesModal').on('hidden.bs.modal', function() {
        $('#deleteIssuances')[0].reset();
    });
</script>