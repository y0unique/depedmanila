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
                    document.getElementById("schools").classList.add("active");
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
                        <h1 class="h3 mb-0 text-gray-800">List of all Schools</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <a href="#" data-id="" data-toggle="modal" data-target="#addSchoolModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Add a School
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Schools Table</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped display compact text-gray-900" id="schoolTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>ID</th>
                                            <th>School ID</th>
                                            <th>Disctrict</th>
                                            <th>School</th>
                                            <th>Address</th>
                                            <th>Principal</th>
                                            <th>Contact</th>
                                            <th>Link</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>SHS Availability</th>
                                            <th>SPED Availability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Schools list -->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Elementary -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseElementary" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseElementary">
                                    <h6 class="m-0 font-weight-bold text-primary">Elementary Schools</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseElementary">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="elemschoolTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>School ID</th>
                                                        <th>Disctrict</th>
                                                        <th>School</th> 
                                                        <th>Address</th>
                                                        <th>Principal</th>
                                                        <th>Contact</th>
                                                        <th>Link</th>
                                                        <th>Email</th>
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
                            <!-- Junior High School -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseJHS" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseJHS">
                                    <h6 class="m-0 font-weight-bold text-primary">Junior High Schools</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseJHS">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="jhschoolTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>School ID</th>
                                                        <th>Disctrict</th>
                                                        <th>School</th> 
                                                        <th>Address</th>
                                                        <th>Principal</th>
                                                        <th>Contact</th>
                                                        <th>Link</th>
                                                        <th>Email</th>
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
                            <!-- Senior High School -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseSHS" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseSHS">
                                    <h6 class="m-0 font-weight-bold text-primary">Senior High Schools</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseSHS">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="shschoolTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>School ID</th>
                                                        <th>Disctrict</th>
                                                        <th>School</th> 
                                                        <th>Address</th>
                                                        <th>Principal</th>
                                                        <th>Contact</th>
                                                        <th>Link</th>
                                                        <th>Email</th>
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
                            <!-- Special Education -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseSpecialEducation" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseSpecialEducation">
                                    <h6 class="m-0 font-weight-bold text-primary">Special Education Centers</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseSpecialEducation">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped display compact text-gray-900" id="spedschoolTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>School ID</th>
                                                        <th>Disctrict</th>
                                                        <th>School</th> 
                                                        <th>Address</th>
                                                        <th>Principal</th>
                                                        <th>Contact</th>
                                                        <th>Link</th>
                                                        <th>Email</th>
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
    <?php include 'includes/modals/schoolsmodal.php'; ?>
</body>

</html>

<script type="text/javascript">
    // table initilization
    $(document).ready(function() {
      $('#schoolTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/schoolsfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,11],
          'orderable' :false
        }]
        });
    });
    $(document).ready(function() {
      $('#elemschoolTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/elemschoolfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,7],
          'orderable' :false
        }]
      });
    } );
    $(document).ready(function() {
      $('#jhschoolTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/jhschoolfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,7],
          'orderable' :false
        }]
      });
    } );
    $(document).ready(function() {
      $('#shschoolTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/shschoolfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,7],
          'orderable' :false
        }]
      });
    } );
    $(document).ready(function() {
      $('#spedschoolTable').DataTable({
        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'includes/fetchdata/spedschoolfetch.php',
          'type':'post',
        },
        "columnDefs": [{
          'target':[0,7],
          'orderable' :false
        }]
      });
    } );

    //add school
    $(document).on('submit','#addSchool',function(e){
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var school_id = $('#school_id').val();
        var school_district = $('#school_district').val();
        var school_name = $('#school_name').val();
        var school_principal = $('#school_principal').val();
        var school_address = $('#school_address').val();
        var school_contact = $('#school_contact').val();
        var school_email = $('#school_email').val();
        var school_link = $('#school_link').val();
        var school_type = $('#school_type').val();
        var school_shsAvailability = $('#school_shsAvailability').val();
        var school_spedAvailablity = $('#school_spedAvailablity').val();

        if(school_id != '' && school_district != '' && school_name != ''&& school_principal != '' && school_address != '' && school_contact != '' && school_email != '' && school_link != '' && school_type != '' && school_shsAvailability != '' && school_spedAvailablity != ''){
            $.ajax({
                url:"includes/codes/schoolscode.php",
                type:"post",
                data:
                {
                    webID:webID,
                    webUsername:webUsername,
                    school_id:school_id,
                    school_district:school_district,
                    school_name:school_name,
                    school_principal:school_principal,
                    school_address:school_address,
                    school_contact:school_contact,
                    school_email:school_email,
                    school_link:school_link,
                    school_type:school_type,
                    school_shsAvailability:school_shsAvailability,
                    school_spedAvailablity:school_spedAvailablity,
                    add: true
                },
                success:function(data){
                    var json = JSON.parse(data);
                    var addSchoolStatus = json.addSchoolStatus;
                    if(addSchoolStatus == 'true'){
                        mytable =$('#schoolTable').DataTable();
                        mytable.draw();
                        mytable =$('#elemschoolTable').DataTable();
                        mytable.draw();
                        mytable =$('#jhschoolTable').DataTable();
                        mytable.draw();
                        mytable =$('#shschoolTable').DataTable();
                        mytable.draw();
                        mytable =$('#spedschoolTable').DataTable();
                        mytable.draw();
                        $('#addSchoolModal').modal('hide');
                        $('#addSchool')[0].reset();
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

    //view schools for edit modal
    $('#schoolTable').on('click', '.editschoolbtn ', function(event) {
        var table = $('#schoolTable').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#editSchoolModal').modal('show');

        $.ajax({
        url: "includes/codes/schoolscode.php",
        data: {
            id: id,
            view: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_schooltbl_id').val(json.school_id);
            $('#_school_id').val(json.id);
            $('#_school_district').val(json.district);
            $('#_school_name').val(json.name);
            $('#_school_principal').val(json.principal);
            $('#_school_address').val(json.address);
            $('#_school_contact').val(json.contact);
            $('#_school_email').val(json.email);
            $('#_school_link').val(json.link);
            $('#_school_type').val(json.type);
            $('#_school_shsAvailability').val(json.shs_availability);
            $('#_school_spedAvailablity').val(json.sped_availability);
            $('#_id').val(id);
            $('#_trid').val(trid);
        }
        })
    });

    //edit Schools
    $(document).on('submit', '#editSchool', function(e) {
        e.preventDefault();;
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var school_id = $('#_school_id').val();
        var school_district = $('#_school_district').val();
        var school_name = $('#_school_name').val();
        var school_principal = $('#_school_principal').val();
        var school_address = $('#_school_address').val();
        var school_contact = $('#_school_contact').val();
        var school_email = $('#_school_email').val();
        var school_link = $('#_school_link').val();
        var school_type = $('#_school_type').val();
        var school_shsAvailability = $('#_school_shsAvailability').val();
        var school_spedAvailablity = $('#_school_spedAvailablity').val();
        var id = $('#_id').val();
        var trid = $('#_trid').val();
        if(school_id != '' && school_district != '' && school_name != ''&& school_principal != '' && school_address != '' && school_contact != '' && school_email != '' && school_link != '' && school_type != '' && school_shsAvailability != '' && school_spedAvailablity != ''){
        $.ajax({
            url: "includes/codes/schoolscode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                school_id:school_id,
                school_district:school_district,
                school_name:school_name,
                school_principal:school_principal,
                school_address:school_address,
                school_contact:school_contact,
                school_email:school_email,
                school_link:school_link,
                school_type:school_type,
                school_shsAvailability:school_shsAvailability,
                school_spedAvailablity:school_spedAvailablity,
                update: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var editSchoolStatus = json.editSchoolStatus;
                if (editSchoolStatus == 'true') {
                    $('#schoolTable').DataTable().destroy();
                    $('#elemschoolTable').DataTable().destroy();
                    $('#jhschoolTable').DataTable().destroy();
                    $('#shschoolTable').DataTable().destroy();
                    $('#spedschoolTable').DataTable().destroy();
                    mytable = $('#schoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/schoolsfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    $('#elemschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/elemschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#jhschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/jhschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#shschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/shschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#spedschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/spedschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(json.message);
                    $('#editSchoolModal').modal('hide');
                } else {
                    alert('failed');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });

    //view school for delete modal
    $('#schoolTable').on('click', '.deleteschoolbtn ', function(event) {
        var table = $('#schoolTable').DataTable();
        var id = $(this).data('id');
        var trid = $(this).closest('tr').attr('id');
        $('#deleteSchoolsModal').modal('show');

        $.ajax({
        url: "includes/codes/schoolscode.php",
        data: {
            id: id,
            deleteview: true
        },
        type: 'post',
        success: function(data) {
            var json = JSON.parse(data);

            $('#_school_id_').val(json.id);
            $('#_school_name_').val(json.name);
            $('#_status_').val(json.status);
            $('#_id_').val(id);
            $('#_trid_').val(trid);
        }
        })
    });

    //delete School
    $(document).on('submit', '#deleteSchools', function(e) {
        e.preventDefault();
        var webID = $('#webID').val();
        var webUsername = $('#webUsername').val();
        var school_id = $('#_school_id_').val();
        var school_name = $('#_school_name_').val();
        var status= $('#_status_').val();
        var id = $('#_id_').val();
        var trid = $('#_trid_').val();
        if (school_id != '' && school_name != '') {
        $.ajax({
            url: "includes/codes/schoolscode.php",
            type: "post",
            data: {
                id:id,
                webID:webID,
                webUsername:webUsername,
                school_id:school_id,
                school_name:school_name,
                status:status,
                delete: true
            },
            success: function(data) {
                var json = JSON.parse(data);
                var deleteSchoolStatus = json.deleteSchoolStatus;
                if (deleteSchoolStatus == 'true') {
                    $('#schoolTable').DataTable().destroy();
                    $('#elemschoolTable').DataTable().destroy();
                    $('#jhschoolTable').DataTable().destroy();
                    $('#shschoolTable').DataTable().destroy();
                    $('#spedschoolTable').DataTable().destroy();
                    mytable = $('#schoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function(nRow, aData, iDataIndex) {
                            $(nRow).attr('id', aData[0]);
                        },
                        'serverSide': 'true',
                        'processing': 'true',
                        'paging': 'true',
                        'order': [],
                        'ajax': {
                            'url': 'includes/fetchdata/schoolsfetch.php',
                            'type': 'post',
                        },
                        "columnDefs": [{
                            'target': [0, 6],
                            'orderable': false
                        }]
                    });
                    $('#elemschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/elemschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#jhschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/jhschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#shschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/shschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    $('#spedschoolTable').DataTable({
                        "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData[0]);
                        },
                        'serverSide':'true',
                        'processing':'true',
                        'paging':'true',
                        'order':[],
                        'ajax': {
                        'url':'includes/fetchdata/spedschoolfetch.php',
                        'type':'post',
                        },
                        "columnDefs": [{
                        'target':[0,7],
                        'orderable' :false
                        }]
                    });
                    
                    
                    alertify.set('notifier','position', 'top-right');
                    alertify.defaults.notifier.classes = 'custom-notifier';
                    alertify.success(json.message);
                    $('#deleteSchoolsModal').modal('hide');
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
    $('#addSchoolModal').on('hidden.bs.modal', function() {
        $('#addSchool')[0].reset();
    });
    //clear modal edit
    $('#editSchoolModal').on('hidden.bs.modal', function() {
        $('#editSchool')[0].reset();
    });
    //clear modal delete
    $('#deleteSchoolsModal').on('hidden.bs.modal', function() {
        $('#deleteschool')[0].reset();
    });
</script>