<?php
include "../../database/connection.php";

//Add File
if(isset($_POST['add'])){

    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $file_type = $_POST['file_type'];
    $file_title = mysqli_real_escape_string($con, $_POST['file_title']);
    $file_link =  mysqli_real_escape_string($con, $_POST['file_link']);
    $file_department = $_POST['file_department'];
    
    if($file_type == 'DOWNLOADABLES'){
        $sql = "INSERT INTO filestbl SET 
                file_type = ?, 
                file_title = ?, 
                file_link = ?, 
                file_date = NOW(), 
                file_department = ?"; 

        // Prepare the statement
        $stmt = mysqli_prepare($con, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $file_type, $file_title, $file_link, $file_department);

        // Execute the statement
        mysqli_stmt_execute($stmt);
        if($stmt){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                       values ('$webID', 'Added File $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if($query1){
                $data = array
                (
                    'addBacFileStatus'=>'true',
                    'message' => 'Downloadable Added Successfully'
                );
                echo json_encode($data);
                return;
            }else{
                $error = mysqli_error($con);  // Capture SQL error
        
                echo "console.log ('$error');";
                $data = array(
                    'addBacFileStatus'=>'false',
                    'message' => 'Error Adding File' . $error
                );
                echo json_encode($data);
                return;
            }
        }else{
            $error = mysqli_error($con);  // Capture SQL error
        
            echo "console.log ('$error');";
            $data = array(
                'addBacFileStatus'=>'false',
                'message' => 'Error Adding File' . $error
            );
            echo json_encode($data);
            return;
        }
    }else if($file_type == 'MATERIALS'){
        $sql = "INSERT INTO filestbl SET 
            file_type = ?, 
            file_title = ?, 
            file_link = ?, 
            file_date = NOW(), 
            file_department = ?"; 

        // Prepare the statement
        $stmt = mysqli_prepare($con, $sql);
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssss", $file_type, $file_title, $file_link, $file_department);
        // Execute the statement
        mysqli_stmt_execute($stmt);
        if($stmt){
            $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                       values ('$webID', 'Added File $file_title',  NOW(), NOW())";
            $query1= mysqli_query($con,$inserttime);
            $query2 = mysqli_insert_id($con);
            if($query1){
                $data = array
                (
                    'addBacFileStatus'=>'true',
                    'message' => 'Material Added Successfully'
                );
                echo json_encode($data);
                return;
            }else{
                $error = mysqli_error($con);  // Capture SQL error
        
                echo "console.log ('$error');";
                $data = array(
                    'addBacFileStatus'=>'false',
                    'message' => 'Error Adding File' . $error
                );
                echo json_encode($data);
                return;
            }
        } else {
            $error = mysqli_error($con);  // Capture SQL error
        
            echo "console.log ('$error');";
            $data = array(
                'addBacFileStatus'=>'false',
                'message' => 'Error Adding File' . $error
            );
            echo json_encode($data);
            return;
        }
    }else{
        $error = mysqli_error($con);  // Capture SQL error
        
        echo "console.log ('$error');";
        $data = array(
            'addBacFileStatus'=>'false',
            'message' => 'Error Adding File' . $error
        );
        echo json_encode($data);
        return;
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

        
    if($file_type == 'DOWNLOADABLES'){
        $sql = "UPDATE filestbl SET file_type = '$file_type',
                                    file_title = '$file_title', 
                                    file_link = '$file_link', 
                                    file_department = '',
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
    } else if ($file_type == 'MATERIALS'){
        if($file_department == ""){
            $data = array
            (
                'editFileStatus'=>'false',
                'message' => 'Department Cannot Be Empty' 
            );
            echo json_encode($data);
            return;
        }else{
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
                    $data = array
                    (
                        'editFileStatus'=>'false',
                        'message' => 'Edit File Error' 
                    );
                    echo json_encode($data);
                    return;
                }
            } else {
                $data = array
                (
                    'editFileStatus'=>'false',
                    'message' => 'Edit File Error' 
                );
                echo json_encode($data);
                return;
            } 
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