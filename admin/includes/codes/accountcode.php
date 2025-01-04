<?php
include "../../database/connection.php";

// Handle save button click event
if(isset($_POST['updateaccountuser'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $curruser_password = mysqli_real_escape_string($con, $_POST['currpassword']);
    $newuser_password = mysqli_real_escape_string($con, $_POST['newuserpassword']);
    $renewuser_password = mysqli_real_escape_string($con, $_POST['reuserpassword']);

    // Check if the current password is correct
    $sql = "SELECT user_password FROM userstbl WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $hashedPasswordArgon2 = $row['user_password'];
    if (password_verify($curruser_password, $hashedPasswordArgon2)) {
        //check if username or email except the current user
        $sql = "SELECT * FROM userstbl WHERE user_id != '$user_id' AND (user_username = '$user_username' OR user_email = '$user_email')";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data = array(
                'updateAccount' => 'false',
                'message' => 'Username or Email already exist'
            );
            echo json_encode($data);
            return;
        } else {
            // Check if the new password and current password is the same
            if($curruser_password == $newuser_password){
                $data = array(
                    'updateAccount' => 'false',
                    'message' => 'New Password is the same as the Current Password'
                );
                echo json_encode($data);
                return;
            }else if(strlen($newuser_password) < 11){
                $data = array(
                    'updateAccount' => 'false',
                    'message' => 'Password must be at least 11 characters'
                );
                echo json_encode($data);
                return;
            }else if(!preg_match('/[\'^£!$%&*()}{@#~?><>,|=_+¬-]/', $newuser_password)){
                $data = array(
                    'updateAccount' => 'false',
                    'message' => 'Username must contain special characters'
                );
                echo json_encode($data);
                return;
            }else{
                if ($newuser_password == $renewuser_password) {
                    $sql = "UPDATE userstbl SET user_username = ?, 
                                                user_email = ?, 
                                                user_password = ? WHERE user_id = ?";
                    $stmt = mysqli_prepare($con, $sql);
                    $hashedPasswordArgon2 = password_hash($newuser_password, PASSWORD_BCRYPT);
                    mysqli_stmt_bind_param($stmt, "sssi", $user_username, $user_email, $hashedPasswordArgon2, $user_id);
                    $query = mysqli_stmt_execute($stmt);



                    if ($query) {
                        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                                    values ('$user_id', 'Changed account info: $user_username',  NOW(), NOW())";
                        $query1= mysqli_query($con,$inserttime);
                        $query2 = mysqli_insert_id($con);
                        if ($query1){
                            $data = array(
                                'updateAccount' => 'true',
                                'message' => 'Account Updated Successfully'
                            );
                            echo json_encode($data);
                            return;
                        }else{
                            $data = array(
                                'updateAccount' => 'false',
                                'message' => 'Error Updating Account'
                            );
                            echo json_encode($data);
                            return;
                        }
                    } else {
                        $data = array(
                            'updateAccount' => 'false',
                            'message' => 'Error Updating Account'
                        );
                        echo json_encode($data);
                        return;
                    }
                } else {
                    $data = array(
                        'updateAccount' => 'false',
                        'message' => 'Password does not match'
                    );
                    echo json_encode($data);
                    return;
                }
            }
        }
    }else{
        $data = array(
            'updateAccount' => 'false',
            'message' => 'Incorrect Current Password'
        );
        echo json_encode($data);
        return;
    }
}

mysqli_close($con);
?>
