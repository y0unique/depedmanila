<?php
include "../../database/connection.php";

//Add User
if(isset($_POST['add'])){
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = password_hash('sdomanilaq1', PASSWORD_BCRYPT);
    $user_type = $_POST['user_type'];
    $user_department = $_POST['user_department'];
    $user_profile = 'default.png';
    
    //check if username has special characters
    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_username)){
        $data = array(
            'addUserStatus' => 'false',
            'message' => 'Username must not contain special characters'
        );
        echo json_encode($data);
        return;
    }else{
        //Check if username is already taken
        $sql = "SELECT * FROM userstbl WHERE user_username = '$user_username'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $data = array(
                'addUserStatus'=> 'false',
                'message' => 'Username Already Exists' 
            );
            echo json_encode($data);
        }else{
            //Check if email is already taken
            $sql1 = "SELECT * FROM userstbl WHERE user_email = '$user_email'";
            $result1 = mysqli_query($con, $sql1);
            $count1 = mysqli_num_rows($result1);
            if($count1 > 0){
                $data = array(
                    'addUserStatus'=> 'false',
                    'message' => 'Email Already Exists' 
                );
                echo json_encode($data);
            }else{
                $sql = "INSERT INTO userstbl (user_username, user_email, user_password, user_type, user_profile, user_department, user_status) 
                              values ('$user_username','$user_email', '$user_password', '$user_type', '$user_profile', '$user_department' , 'active')";
                $query= mysqli_query($con,$sql);
                $lastId = mysqli_insert_id($con);

                if($query){
                    $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                                values ('$webID', 'Added User $user_username',  NOW(), NOW())";
                    $query1= mysqli_query($con,$inserttime);
                    $query2 = mysqli_insert_id($con);
                    if ($query1)
                    {
                        $data = array
                        (
                            'addUserStatus'=>'true',
                            'message' => 'Added Successfully' 
                        );
                        echo json_encode($data);
                        return;
                    }
                    else
                    {
                        $error = mysqli_error($con);  // Capture SQL error
                        $data = array(
                            'addUserStatus'=>'false',
                            'message' => 'Error Adding User' . $error
                        );
                        echo json_encode($data);
                        return;
                    }
                }
                else
                {
                    $error = mysqli_error($con);  // Capture SQL error
                    $data = array(
                        'addUserStatus'=>'false',
                        'message' => 'Error Adding User' . $error
                    );
                    echo json_encode($data);
                    return;
                }
            }
        }       
    }
}

//VIEW User's details
if(isset($_POST['view']))
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM userstbl WHERE user_id = '$id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

// Edit User's details
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $webID = mysqli_real_escape_string($con, $_POST['webID']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_department = mysqli_real_escape_string($con, $_POST['user_department']);
    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $user_status = mysqli_real_escape_string($con, $_POST['user_status']);

    //check if username has special characters
    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_username)){
        $data = array(
            'editUserStatus' => 'false',
            'message' => 'Username must not contain special characters'
        );
        echo json_encode($data);
        return;
    }else{
        //Check if username is already taken
        $sql = "SELECT * FROM userstbl WHERE user_username = '$user_username' AND user_id != '$user_id'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $data = array(
                'editUserStatus'=> 'false',
                'message' => 'Username Already Exists' 
            );
            echo json_encode($data);
        }else{
            //Check if email is already taken
            $sql1 = "SELECT * FROM userstbl WHERE user_email = '$user_email' AND user_id != '$user_id'";
            $result1 = mysqli_query($con, $sql1);
            $count1 = mysqli_num_rows($result1);
            if($count1 > 0){
                $data = array(
                    'editUserStatus'=> 'false',
                    'message' => 'Email Already Exists' 
                );
                echo json_encode($data);
            }else{
                if($user_password = "sdomanilaq1"){
                    $user_password = password_hash('sdomanilaq1', PASSWORD_BCRYPT);
                }
                // Use prepared statement to prevent SQL injection
                $sql = "UPDATE userstbl SET user_username = ?, 
                                            user_email = ?, 
                                            user_department = ?, 
                                            user_type = ?, 
                                            user_password = ?,
                                            user_status = ? WHERE user_id = ?";
                
                // Prepare the statement
                $stmt = mysqli_prepare($con, $sql);

                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssssssi", $user_username, $user_email, $user_department, $user_type, $user_password, $user_status, $user_id);


                // Execute the statement
                $query = mysqli_stmt_execute($stmt);

                // Handle the response
                if ($query) {
                    $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                    VALUES ('$webID', 'Edited User: $user_username', NOW(), NOW())";
                    $query1 = mysqli_query($con, $inserttime);

                    if ($query1) {
                        $data = array(
                            'editUserStatus' => 'true',
                            'message' => 'Updated Successfully'
                        );
                    } else {
                        $error = mysqli_error($con);
                        $data = array(
                            'editUserStatus' => 'false',
                            'message' => 'Error updating timelog. SQL Error: ' . $error
                        );
                    }
                } else {
                    $error = mysqli_error($con);
                    $data = array(
                        'editUserStatus' => 'false',
                        'message' => 'Error updating User. SQL Error: ' . $error
                    );
                }

                // Close the statement
                mysqli_stmt_close($stmt);

                // Return the JSON response
                echo json_encode($data);
                return;
            }
        }
    }
    
   
}

// Delete View Users
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM userstbl WHERE user_id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Users with the update of status to inactive
if(isset($_POST['delete'])) {
    // Extract data from the POST request
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $user_id = $_POST['user_id'];

    // Update the User to 'inactive'
    $sql = "UPDATE userstbl SET user_status = 'inactive' WHERE user_id = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        // Log the deletion action in timelogtbl
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                       VALUES ('$webID', 'Deleted User, User ID: $user_id', NOW(), NOW())";
        $query1 = mysqli_query($con, $inserttime);

        // Check if the log insertion was successful
        if ($query1){
            $data = array(
                'deleteUserStatus' => 'true',
                'message' => 'Delete Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
                'deleteUserStatus' => 'false',
            );
            echo json_encode($data);
        }
    }
    else {
        $data = array(
            'deleteUserStatus' => 'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>