files modal
<script>
    // add modal
    // //disable and hide
    // $(document).ready(function() {
    //     $('#file_type').change(function() {
    //         if ($(this).val() == 'procurement'){
    //             $('#file_department').prop('disabled', true);
    //             $('#file_publishDate').prop('disabled', true);
    //             $('#file_closingDate').prop('disabled', true);
    //             $('#awarded_to').prop('disabled', true);
    //             $('#reference_number').prop('disabled', true);
    //             $('#procurement_mode').prop('disabled', true);
    //             $('#procurement_type').prop('disabled', false);
    //             $('#procurement_year').prop('disabled', false);
    //             $('#procurement_div').prop('hidden', false);
    //             $('#transparencies_div').prop('hidden', true);
    //             $('#transparencies_div1').prop('hidden', true);
    //             $('#transparencies_div2').prop('hidden', true);
    //             $('#department_div').prop('hidden', true);
    //         }
    //         else if ($(this).val() == 'downloadable') {
    //             $('#file_department').prop('disabled', true);
    //             $('#file_publishDate').prop('disabled', true);
    //             $('#file_closingDate').prop('disabled', true);
    //             $('#awarded_to').prop('disabled', true);
    //             $('#reference_number').prop('disabled', true);
    //             $('#procurement_mode').prop('disabled', true);
    //             $('#procurement_type').prop('disabled', true);
    //             $('#procurement_year').prop('disabled', true);
    //             $('#procurement_div').prop('hidden', true);
    //             $('#transparencies_div').prop('hidden', true);
    //             $('#transparencies_div1').prop('hidden', true);
    //             $('#transparencies_div2').prop('hidden', true);
    //             $('#department_div').prop('hidden', true);
    //         } 
    //         else if($(this).val() == 'material') {
    //             $('#file_department').prop('disabled', false);
    //             $('#file_publishDate').prop('disabled', true);
    //             $('#file_closingDate').prop('disabled', true);
    //             $('#awarded_to').prop('disabled', true);
    //             $('#reference_number').prop('disabled', true);
    //             $('#procurement_mode').prop('disabled', true);
    //             $('#procurement_type').prop('disabled', true);
    //             $('#procurement_year').prop('disabled', true);
    //             $('#procurement_div').prop('hidden', true);
    //             $('#transparencies_div').prop('hidden', true);
    //             $('#transparencies_div1').prop('hidden', true);
    //             $('#transparencies_div2').prop('hidden', true);
    //             $('#department_div').prop('hidden', false);
    //         }
    //         else {
    //             $('#file_department').prop('disabled', true);
    //             $('#file_publishDate').prop('disabled', false);
    //             $('#file_closingDate').prop('disabled', false);
    //             $('#awarded_to').prop('disabled', false);
    //             $('#reference_number').prop('disabled', false);
    //             $('#procurement_mode').prop('disabled', false);
    //             $('#procurement_type').prop('disabled', true);
    //             $('#procurement_year').prop('disabled', true);
    //             $('#procurement_div').prop('hidden', true);
    //             $('#transparencies_div').prop('hidden', false);
    //             $('#transparencies_div1').prop('hidden', false);
    //             $('#transparencies_div2').prop('hidden', false);
    //             $('#department_div').prop('hidden', true);
    //         }
    //     });
    // });
    
    // edit modal

    //disable _file_publishDate, _file_closingDate, _awarded_to, _reference_number, _procurement_mode if _file_type is downloadable on load of editFilesModal
    // $(document).ready(function() {
    //     $('#_file_type').change(function() {
    //         if ($(this).val() == 'downloadable') {
    //             $('#_file_department').prop('disabled', true);
    //             $('#_file_publishDate').prop('disabled', true);
    //             $('#_file_closingDate').prop('disabled', true);
    //             $('#_awarded_to').prop('disabled', true);
    //             $('#_reference_number').prop('disabled', true);
    //             $('#_procurement_mode').prop('disabled', true);
    //         } 
    //         else if($(this).val() == 'material') {
    //             $('#_file_department').prop('disabled', false);
    //             $('#_file_publishDate').prop('disabled', true);
    //             $('#_file_closingDate').prop('disabled', true);
    //             $('#_awarded_to').prop('disabled', true);
    //             $('#_reference_number').prop('disabled', true);
    //             $('#_procurement_mode').prop('disabled', true);
    //         } 
    //         else {
    //             $('#_file_department').prop('disabled', true);
    //             $('#_file_publishDate').prop('disabled', false);
    //             $('#_file_closingDate').prop('disabled', false);
    //             $('#_awarded_to').prop('disabled', false);
    //             $('#_reference_number').prop('disabled', false);
    //             $('#_procurement_mode').prop('disabled', false);
    //         }
    //     });
    // });


    // Disable textareas based on the initial value of _file_type on load
    // $(document).ready(function() {
    //     disableTextareas($('#_file_type').val());

    //     // Handle change event of _file_type dropdown
    //     $('#_file_type').change(function() {
    //         disableTextareas($(this).val());
    //     });
    // });

    // // Function to disable or enable textareas based on the selected _file_type
    // function disableTextareas(fileType) {
    //     if (fileType == 'downloadable') {
    //         $('#_file_publishDate, #_file_closingDate, #_awarded_to, #_reference_number, #_procurement_mode, #_file_department').prop('disabled', true);
    //     } else if (fileType == 'material') {
    //         $('#_file_publishDate, #_file_closingDate, #_awarded_to, #_reference_number, #_procurement_mode').prop('disabled', true);
    //         $('#_file_department').prop('disabled', false);
    //     } else {
    //         $('#_file_publishDate, #_file_closingDate, #_awarded_to, #_reference_number, #_procurement_mode').prop('disabled', false);
    //         $('#_file_department').prop('disabled', true);
    //     }
    // }

    

</script>


setTimeout(runAfterThirty, 3000);

    function runAfterThirty() {
        $(body).on('mousemove keydown', function() {
            runAfterThirty(); // restart timeout
        });
        alert("Hello <?php echo strtoupper($_SESSION['webUsername']);?>. you've been inactive for a while");
        location.reload(); 
    }


    (function() {
        var timeout;
        
        $(function() {
            startRefresh();
        });
    
        function startRefresh() {
            clearTimeout(timeout); // stop previous timeout
            timeout = setTimeout(startRefresh, 30000);
            $.get('modules/berichten.php', function(data) {
                $('#content').html(data);    
            });
        }
    
        
    }())



    setTimeout(runAfterThirty, 3000);

    function runAfterThirty() {
        $(body).on('mousemove keydown', function() {
            runAfterThirty(); // restart timeout
        });
        alert("Hello <?php echo strtoupper($_SESSION['webUsername']);?>. you've been inactive for a while");
        location.reload(); 
    }

    

    var idleTime = 0;
    $(document).ready(function () {
        // Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        // Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 19) { // 20 minutes
            window.location.reload();
        }
    }



setTimeout(runAfterThirty, 3000);
//reset setTimeout when event.mouse, event.keydown, event.click
$(body).on('mousemove keydown', function() {
    clearTimeou(setTimeout); // restart timeout
});

function runAfterThirty() {
    if(runAfterThirty == 3000){
       location.reload(); 
    }
}









// $sql = "INSERT INTO filestbl (file_type, file_title, file_link, file_date, file_department, file_publishDate, file_closingDate, file_awardedTo, file_referenceNum, file_procurementMode, file_procurementYear, file_procurementType, file_status) 
    //                           values ('$file_type','$file_title', '$file_link', NOW(), '$file_department' , '$file_publishDate', '$file_closingDate', '$awarded_to', '$reference_number', '$procurement_mode', '$procurement_year', '$procurement_type', 'active')";
    // $query= mysqli_query($con,$sql);
    // $lastId = mysqli_insert_id($con);

    // if($query){
    //     $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
    //                                    values ('$webID', 'Added Issuance $file_type',  NOW(), NOW())";
    //     $query1= mysqli_query($con,$inserttime);
    //     $query2 = mysqli_insert_id($con);
    //     if ($query1)
    //     {
    //         $data = array
    //         (
    //             'addFileStatus'=>'true',
    //             'message' => 'Added Successfully' 
    //         );
    //         echo json_encode($data);
    //         return;
    //     }
    //     else
    //     {
    //         $data = array(
    //             'addFileStatus'=>'false',
    //         );
    //         echo json_encode($data);
    //     }
    // }
    // else
    // {
    //     $data = array(
    //         'addFileStatus'=>'false',
    //     );
    //     echo json_encode($data);
    // }