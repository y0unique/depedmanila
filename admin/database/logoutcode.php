<?php
    session_start();

    if (!isset($_SESSION['webID']) || !isset($_SESSION['webUsername'])) {
        header("Location: ../login.php");
        exit();
    }

    include 'connection.php';

    $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                    VALUES (?, CONCAT(?, ' Logged Out'), NOW(), NOW())";
    
    $stmt = mysqli_prepare($con, $inserttime);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['webID'], $_SESSION['webUsername']);
        $query1 = mysqli_stmt_execute($stmt);

        if ($query1) {
            $response = array('status' => 'error', 'message' => 'Successfully Logged Out');
            session_unset();
            session_destroy();
            header("Location: ../login.php");
            exit(); 
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to insert log record.');
        }

        mysqli_stmt_close($stmt);
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to prepare statement.');
    }
    echo json_encode($response);
?>
