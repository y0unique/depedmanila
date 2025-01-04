<?php
include "../../database/connection.php";

// Fetch user data based on user ID
if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $query = "SELECT * FROM userstbl WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($result)) {
        // Prepare data to be sent back as JSON response
        $response = array(
            'user_id' => $row['user_id'],
            'user_username' => $row['user_username'],
            'user_email' => $row['user_email'],
            'user_password' => $row['user_password'],
            'user_type' => $row['user_type'],
            'user_department' => $row['user_department'],
            'user_status' => $row['user_status']
        );
        echo json_encode($response);
    } else {
        // No user found with the provided ID
        echo json_encode(array('error' => 'User not found'));
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>
