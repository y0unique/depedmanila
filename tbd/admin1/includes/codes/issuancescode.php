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
    $sql = "SELECT * FROM issuancesvw WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);

}

// Edit Issuances
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $tracking_number = $_POST['tracking_number'];
    $issuances_title = mysqli_real_escape_string($con, $_POST['issuances_title']);
    $issuances_link = $_POST['issuances_link'];
    $issuances_number = $_POST['issuances_number'];
    $issuances_date = $_POST['issuances_date'];
    $issuances_type = $_POST['issuances_type'];

    $sql = "UPDATE issuancestbl SET tracking_number = '$tracking_number', 
                                    issuances_title = '$issuances_title', 
                                    issuances_link = '$issuances_link', 
                                    issuances_number = '$issuances_number', 
                                    issuances_date = '$issuances_date' ,
                                    issuances_type = '$issuances_type' WHERE issuances_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Edited Issuance $tracking_number',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'editIssuanceStatus'=>'true',
                'message' => 'Updated Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'editIssuanceStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'editIssuanceStatus'=>'false',
        );
        echo json_encode($data);
    }
}

// Delete View Issuances
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM issuancesvw WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $tracking_number = $_POST['tracking_number'];

    $sql = "UPDATE issuancestbl SET issuances_status = 'inactive' WHERE issuances_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Deleted Issuance $tracking_number',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'deleteIssuanceStatus'=>'true',
                'message' => 'Delete Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'deleteIssuanceStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'deleteIssuanceStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>