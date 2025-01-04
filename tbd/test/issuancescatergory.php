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
                    document.getElementById("aIssuancesCatergories").classList.add("active");
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
                        <h1 class="h3 mb-0 text-gray-800">Issuances Category</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="#" data-id="" data-toggle="modal" data-target="#addIssuanceCategoryModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add Category
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900 " id="categoryTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Type</th>
                                            <th>Display Name</th>
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
    <?php include 'includes/modals/issuancescategorymodal.php'; ?>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#categoryTable').DataTable({
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide':'true',
            'processing':'true',
            'paging':'true',
            'order':[],
            'ajax': {
                'url':'includes/fetchdata/issuancescategoryfetch.php',
                'type':'post',
            },
            "columnDefs": [{
                'target':[0,3],
                'orderable' :false
            }]
        });
    });

    //add category
    $(document).on('submit','#addIssuanceCategory',function(e){
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var issuancecategory_type = $('#issuancecategory_type').val();
        var issuancecategory_name = $('#issuancecategory_name').val();

        if(issuancecategory_type != '' && issuancecategory_name != ''){
            $.ajax({
                url:"includes/codes/issuancescategorycode.php",
                type:"post",
                data:
                {
                    webID:webID,
                    webUsername:webUsername,
                    issuancecategory_type:issuancecategory_type,
                    issuancecategory_name:issuancecategory_name,
                    add: true
                },
                success:function(data){
                    var json = JSON.parse(data);
                    var addIssuanceCategoryStatus = json.addIssuanceCategoryStatus;
                    if(addIssuanceCategoryStatus =='true'){
                        mytable =$('#categoryTable').DataTable();
                        mytable.draw();
                        $('#addIssuanceCategoryModal').modal('hide');
                        $('#addIssuanceCategory')[0].reset();
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
    $('#categoryTable').on('click', '.editissuancecategorybtn ', function(event) {
        var table = $('#categoryTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#editIssuanceCategoryModal').modal('show');

        $.ajax({
        url: "includes/codes/issuancescategorycode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_issuancecategory_type').val(json.type);
            $('#_issuancecategory_name').val(json.name);
            $('#_id').val(id);
            $('#_trid').val(trid);
        }
        })
    });

    //edit issuances
    $(document).on('submit', '#editIssuanceCategory', function(e) {
        e.preventDefault();
        var id = $('#_id').val();
        var trid = $('#_trid').val();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var issuancecategory_type = $('#_issuancecategory_type').val();
        var issuancecategory_name = $('#_issuancecategory_name').val();
        if (issuancecategory_type != '' && issuancecategory_name != '') {
        $.ajax({
            url: "includes/codes/issuancescategorycode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                issuancecategory_type:issuancecategory_type,
                issuancecategory_name:issuancecategory_name,
                update: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var editIssuanceCategoryStatus = json.editIssuanceCategoryStatus;
                if (editIssuanceCategoryStatus == 'true') {
                    $('#categoryTable').DataTable().destroy();
                    mytable = $('#categoryTable').DataTable({
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/issuancescategoryfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 3],
                            'orderable': false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(json.message);
                    $('#editIssuanceCategoryModal').modal('hide');
                } else {
                    alert('failed');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });

    //view issuance for delete modal
    $('#categoryTable').on('click', '.deleteissuancecategorybtn ', function(event) {
        var table = $('#categoryTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#deleteIssuancesCategoryModal').modal('show');

        $.ajax({
        url: "includes/codes/issuancescategorycode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_issuancecategory_type_').val(json.type);
            $('#_issuancecategory_name_').val(json.name);
            $('#_status_').val(json.status);
            $('#_id_').val(id);
            $('#_trid_').val(trid);
        }
        })
    });

    //delete issuances
    $(document).on('submit', '#deleteIssuancesCategory', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var issuancecategory_type = $('#_issuancecategory_type_').val();
        var issuancecategory_name = $('#_issuancecategory_name_').val();
        var status= $('#_status_').val();
        var id = $('#_id_').val();
        var trid = $('#_trid_').val();
        if (issuancecategory_type != '' && issuancecategory_name != '') {
        $.ajax({
            url: "includes/codes/issuancescategorycode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                issuancecategory_type:issuancecategory_type,
                issuancecategory_name:issuancecategory_name,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var deleteIssuanceCategoryStatus = json.deleteIssuanceCategoryStatus;
                if (deleteIssuanceCategoryStatus == 'true') {
                    $('#categoryTable').DataTable().destroy();
                    mytable = $('#categoryTable').DataTable({
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/issuancescategoryfetch.php',
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
                    $('#deleteIssuancesCategoryModal').modal('hide');
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