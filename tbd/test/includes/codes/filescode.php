<?php
include "../../database/connection.php";

//Add File
if(isset($_POST['add'])){

    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $file_type = $_POST['file_type'];
    $file_title = mysqli_real_escape_string($con, $_POST['file_title']);
    $file_link = $_POST['file_link'];
    $file_department = $_POST['file_department'];
    $file_publishDate = $_POST['file_publishDate'];
    $file_closingDate = $_POST['file_closingDate'];
    $awarded_to = $_POST['awarded_to'];
    $reference_number = $_POST['reference_number'];
    $procurement_mode = $_POST['procurement_mode'];
    $procurement_year = $_POST['procurement_year'];
    $procurement_type = $_POST['procurement_type'];
    
    if($file_type == 'downloadable'){
        $sql = "INSERT INTO filestbl (file_type, file_title, file_link, file_date, file_status) 
                                values ('$file_type','$file_title', '$file_link', NOW(), 'active')";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Added $file_type File $file_title', NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'addFileStatus'=>'true',
                    'message' => 'Added Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'addFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'addFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'procurement'){
        $sql = "INSERT INTO filestbl (file_type, file_title, file_link, file_date, file_procurementYear, file_procurementType,  file_status) 
                                values ('$file_type','$file_title', '$file_link', NOW(), $procurement_year, '$procurement_type','active')";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Added $file_type File $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'addFileStatus'=>'true',
                    'message' => 'Added Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'addFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'addFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'material'){
        $sql = "INSERT INTO filestbl (file_type, file_title, file_link, file_date, file_department, file_status) 
                                values ('$file_type','$file_title', '$file_link', NOW(), '$file_department','active')";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Added $file_type File $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'addFileStatus'=>'true',
                    'message' => 'Added Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'addFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'addFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'transparency'){
        $sql = "INSERT INTO filestbl (file_type, file_title, file_link, file_date, file_publishDate, file_closingDate, file_awardedTo, 	file_referenceNum, 	file_procurementMode, file_status) 
                                values ('$file_type','$file_title', '$file_link', NOW(), '$file_publishDate', '$file_closingDate' , '$awarded_to', '$reference_number', '$procurement_mode', 'active')";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Added $file_type File $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'addFileStatus'=>'true',
                    'message' => 'Added Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'addFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'addFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else{
        $data = array(
            'addFileStatus'=>'false',
        );
        echo json_encode($data);
    }
}

//View File
if(isset($_POST['view'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM filesvw WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Edit File
if(isset($_POST['update'])){
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $id = $_POST['id'];
    $file_type = $_POST['file_type'];
    $file_title = mysqli_real_escape_string($con, $_POST['file_title']);
    $file_link = $_POST['file_link'];
    $file_department = $_POST['file_department'];
    $file_publishDate = $_POST['file_publishDate'];
    $file_closingDate = $_POST['file_closingDate'];
    $awarded_to = $_POST['awarded_to'];
    $reference_number = $_POST['reference_number'];
    $procurement_mode = $_POST['procurement_mode'];
    $procurement_year = $_POST['procurement_year'];
    $procurement_type = $_POST['procurement_type'];

        
    if($file_type == 'downloadable'){
        $sql = "UPDATE filestbl SET file_type = '$file_type',
                                    file_title = '$file_title', 
                                    file_link = '$file_link', 
                                    file_date = NOW(), 
                                    file_status = 'active' WHERE file_id = '$id'";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Edited $file_type file: $file_title', NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'editFileStatus'=>'true',
                    'message' => 'Edited File Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'editFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'editFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'procurement'){
        $sql = "UPDATE filestbl SET file_type = '$file_type',
                                    file_title = '$file_title', 
                                    file_link = '$file_link', 
                                    file_procurementYear = '$procurement_year',
                                    file_procurementType = '$procurement_type',
                                    file_date = NOW(), 
                                    file_status = 'active' WHERE file_id = '$id'";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);

        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Edited $file_type file: $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'editFileStatus'=>'true',
                    'message' => 'Edited File Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'editFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'editFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'material'){
        $sql = "UPDATE filestbl SET file_type = '$file_type',
                                    file_title = '$file_title', 
                                    file_link = '$file_link', 
                                    file_department = '$file_department',
                                    file_date = NOW(), 
                                    file_status = 'active' WHERE file_id = '$id'";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);


        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Edited $file_type file: $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'editFileStatus'=>'true',
                    'message' => 'Edited File Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'editFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'editFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else if ($file_type == 'transparency'){
        $sql = "UPDATE filestbl SET file_type = '$file_type',
                                    file_title = '$file_title', 
                                    file_link = '$file_link', 
                                    file_publishDate = '$file_publishDate',
                                    file_closingDate = '$file_closingDate',
                                    file_awardedTo = '$awarded_to',
                                    file_referenceNum = '$reference_number',
                                    file_procurementMode	 = '$procurement_mode',
                                    file_date = NOW(), 
                                    file_status = 'active' WHERE file_id = '$id'";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);


        if($query){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                        values ('$webID', 'Edited $file_type File: $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if ($query1)
            {
                $data = array
                (
                    'editFileStatus'=>'true',
                    'message' => 'Edited File Successfully' 
                );
                echo json_encode($data);
                return;
            }
            else
            {
                $data = array(
                    'editFileStatus'=>'false',
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'editFileStatus'=>'false',
            );
            echo json_encode($data);
        } 
    } else{
        $data = array(
            'editFileStatus'=>'false',
        );
        echo json_encode($data);
    }
}

// Delete View File
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM filesvw WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $file_type = $_POST['file_type'];
    $file_title = $_POST['file_title'];

    $sql = "UPDATE filestbl SET file_status = 'inactive' WHERE file_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Deleted $file_type file: $file_title',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'deleteFileStatus'=>'true',
                'message' => 'Delete File Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'deleteFileStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'deleteFileStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>