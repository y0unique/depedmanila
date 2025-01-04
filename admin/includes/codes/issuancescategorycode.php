<?php
include "../../database/connection.php";

//Add Issuance
if(isset($_POST['add'])){

    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $issuancecategory_type = strtoupper($_POST['issuancecategory_type']);
    $issuancecategory_name = strtoupper($_POST['issuancecategory_name']);
 
    $sql = "INSERT INTO issuancescategorytbl (issuances_type, issuances_type_name, issuances_status) 
                              values ('$issuancecategory_type','$issuancecategory_name', 'active')";
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                       values ('$webID', 'Added Issuance Category $issuancecategory_type',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1)
        {
            $data = array
            (
                'addIssuanceCategoryStatus'=>'true',
                'message' => 'Added Successfully' 
            );
            echo json_encode($data);
            return;
        }
        else
        {
            $data = array(
                'addIssuanceCategoryStatus'=>'false',
            );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'addIssuanceCategoryStatus'=>'false',
        );
        echo json_encode($data);
    } 
}

// View Issuances
if(isset($_POST['view'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM issuancescategoryvw WHERE type = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);

}

// Edit Issuances
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $issuancecategory_type = $_POST['issuancecategory_type'];
    $issuancecategory_name = $_POST['issuancecategory_name'];

    $sql = "UPDATE issuancescategorytbl SET issuances_type_name = '$issuancecategory_name' 
                                        WHERE issuances_type = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Edited Issuance Category $issuancecategory_type',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'editIssuanceCategoryStatus'=>'true',
                'message' => 'Updated Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'editIssuanceCategoryStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'editIssuanceCategoryStatus'=>'false',
        );
        echo json_encode($data);
    }
}

// Delete View Issuances
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM issuancescategoryvw WHERE type  = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $issuancecategory_type = $_POST['issuancecategory_type'];
    $issuancecategory_name = $_POST['issuancecategory_name'];

    $sql = "UPDATE issuancescategorytbl SET issuances_status = 'inactive' WHERE issuances_type  = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Deleted Issuance Category $issuancecategory_type',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'deleteIssuanceCategoryStatus'=>'true',
                'message' => 'Delete Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'deleteIssuanceCategoryStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'deleteIssuanceCategoryStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>