<?php
include "../../database/connection.php";

//Add Issuance
if(isset($_POST['add'])){

    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $tracking_number = $_POST['tracking_number'];
    $issuances_type = $_POST['issuances_type'];
    $issuances_title = mysqli_real_escape_string($con, $_POST['issuances_title']);
    $issuances_link = $_POST['issuances_link'];
    $issuances_number = $_POST['issuances_number'];
    $issuances_date = $_POST['issuances_date'];
 
    $sql = "INSERT INTO issuancestbl (tracking_number, issuances_type, issuances_title, issuances_link, issuances_number, issuances_date, issuances_status) 
                              values ('$tracking_number','$issuances_type', '$issuances_title', '$issuances_link', '$issuances_number' , '$issuances_date', 'active')";
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                       values ('$webID', 'Added Issuance $tracking_number',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1)
        {
            $data = array
            (
                'addIssuanceStatus'=>'true',
                'message' => 'Added Successfully' 
            );
            echo json_encode($data);
            return;
        }
        else
        {
            $data = array(
                'addIssuanceStatus'=>'false',
            );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'addIssuanceStatus'=>'false',
        );
        echo json_encode($data);
    } 
}

// View Issuances
if(isset($_POST['view'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM issuancestbl WHERE issuances_id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);

}

// Edit Issuances
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $webID = mysqli_real_escape_string($con, $_POST['webID']);
    $tracking_number = mysqli_real_escape_string($con, $_POST['tracking_number']);
    $issuances_title = mysqli_real_escape_string($con, $_POST['issuances_title']);
    $issuances_link = mysqli_real_escape_string($con, $_POST['issuances_link']);
    $issuances_number = mysqli_real_escape_string($con, $_POST['issuances_number']);
    $issuances_date = mysqli_real_escape_string($con, $_POST['issuances_date']);
    $issuances_type = mysqli_real_escape_string($con, $_POST['issuances_type']);
    $issuances_status = mysqli_real_escape_string($con, $_POST['issuances_status']);

    // Use prepared statement to prevent SQL injection
    $sql = "UPDATE issuancestbl SET tracking_number = ?, 
                                    issuances_title = ?, 
                                    issuances_link = ?, 
                                    issuances_number = ?, 
                                    issuances_date = ?,
                                    issuances_type = ?,
                                    issuances_status = ? WHERE issuances_id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssssi", $tracking_number, $issuances_title, $issuances_link, $issuances_number, $issuances_date, $issuances_type, $issuances_status, $id);

    // Execute the statement
    $query = mysqli_stmt_execute($stmt);

    // Handle the response
    if ($query) {
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        VALUES ('$webID', 'Edited Issuance $tracking_number', NOW(), NOW())";
        $query1 = mysqli_query($con, $inserttime);

        if ($query1) {
            $data = array(
                'editIssuanceStatus' => 'true',
                'message' => 'Updated Successfully'
            );
        } else {
            $error = mysqli_error($con);
            $data = array(
                'editIssuanceStatus' => 'false',
                'message' => 'Error updating timelog. SQL Error: ' . $error
            );
        }
    } else {
        $error = mysqli_error($con);
        $data = array(
            'editIssuanceStatus' => 'false',
            'message' => 'Error updating issuance. SQL Error: ' . $error
        );
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Return the JSON response
    echo json_encode($data);
    return;
}


// Delete View Issuances
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM issuancestbl WHERE issuances_id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    // Extract data from the POST request
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $tracking_number = $_POST['tracking_number'];

    // Update the issuances_status to 'inactive'
    $sql = "UPDATE issuancestbl SET issuances_status = 'inactive' WHERE issuances_id = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        // Log the deletion action in timelogtbl
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                       VALUES ('$webID', 'Deleted Issuance $tracking_number', NOW(), NOW())";
        $query1 = mysqli_query($con, $inserttime);

        // Check if the log insertion was successful
        if ($query1){
            $data = array(
                'deleteIssuanceStatus' => 'true',
                'message' => 'Delete Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
                'deleteIssuanceStatus' => 'false',
            );
            echo json_encode($data);
        }
    }
    else {
        $data = array(
            'deleteIssuanceStatus' => 'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}

?>