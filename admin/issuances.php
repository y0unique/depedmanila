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
        echo '<script>document.getElementById("issuances").classList.add("active");</script>';?>
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
                                <table class="table table-striped display compact text-gray-900 " id="issuancesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>Tracking Number</th>
                                            <th>Memo #</th>
                                            <th>Memo Type</th>
                                            <th>Memo Date</th>
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
          $(nRow).attr('id', aData[0]);
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
          'target':[0,5],
          'orderable' :false
        }]
      });
    } );

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
            }
            else {
            alert('Fill all the required fields');
        }
    });

    //view issuance for edit modal
    $('#issuancesTable').on('click', '.editissuancebtn ', function(event) {
        var table = $('#issuancesTable').DataTable();
        var id = $(this).data('id');
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
            $('#_issuances_type').val(json.type);
            $('#_issuances_title').val(json.title);
            $('#_issuances_link').val(json.link);
            $('#_issuances_number').val(json.number);
            $('#_issuances_date').val(json.date);
            $('#_id').val(id);
        }
        })
    });

    //edit issuances
    $(document).on('submit', '#editIssuances', function(e) {
        e.preventDefault();;
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var tracking_number = $('#_tracking_number').val();
        var issuances_type= $('#_issuances_type').val();
        var issuances_title= $('#_issuances_title').val();
        var issuances_link= $('#_issuances_link').val();
        var issuances_number= $('#_issuances_number').val();
        var issuances_date= $('#_issuances_date').val();
        var id = $('#_id').val();
        if (tracking_number != '' && issuances_type != '' && issuances_title != '' && issuances_link != '' && issuances_number != '' && issuances_date != '') {
        $.ajax({
            url: "includes/codes/issuancescode.php",
            type: "post",
            data: {
            webID:webID,
            id:id,
            webUsername:webUsername,
            tracking_number:tracking_number,
            issuances_type:issuances_type,
            issuances_title:issuances_title,
            issuances_link:issuances_link,
            issuances_number:issuances_number,
            issuances_date:issuances_date,
            update: true
            },
            success: function(data) {
            var json = JSON.parse(data);
            var editIssuanceStatus = json.editIssuanceStatus;
            if (editIssuanceStatus == 'true') {
                table = $('#issuancesTable').DataTable();
                var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editissuancebtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
                var row = table.row("[id='" + trid + "']");
                row.row("[id='" + trid + "']").data([id, tracking_number, issuances_type, issuances_title, issuances_link, issuances_number, issuances_date, button]);
                alertify.set('notifier','position', 'top-right');
                alertify.success(json.message);
                $('#editIssuancesModal').modal('hide');
            } else {
                alert('failed');
            }
            }
        });
        } else {
        alert('Fill all the required fields');
        }
    });
</script>