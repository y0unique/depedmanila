<?php
    include 'connection.php';
    session_start();

    function validate($con, $data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return mysqli_real_escape_string($con, $data);
    }
    $username = validate($con, $_POST['username']);
    $password = validate($con, $_POST['password']);

    if($username == ""){
        $response = array('status' => 'error', 'message' => 'Invalid Username or Password.');
    } else if($password == "" || strlen($password) < 11) {
        $response = array('status' => 'error', 'message' => 'Invalid Username or Password.');
    } else {
        // Retrieve the hashed password from the database using prepared statement
        $query = "SELECT * FROM userstbl WHERE user_username=? OR  user_email=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashedPasswordArgon2 = $row['user_password'];

            // Verify the password against Argon2id hash
            if (password_verify($password, $hashedPasswordArgon2)) {
                $webID = $row['user_id'];
                $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                            VALUES (?, CONCAT(?, ' Logged In'), NOW(), NOW())";
                $stmtInsert = mysqli_prepare($con, $inserttime);
                mysqli_stmt_bind_param($stmtInsert, "ss", $webID, $username);
                $query1 = mysqli_stmt_execute($stmtInsert);

                if ($query1){
                    $response = array('status' => 'success', 'message' => 'Login successful!');
                    $_SESSION['webID'] = $row['user_id'];
                    $_SESSION['webUsername'] = $row['user_username'];
                    $_SESSION['webEmail'] = $row['user_email'];
                    $_SESSION['webType'] = $row['user_type'];
                    $_SESSION['webPassword'] = $row['user_password'];
                    $_SESSION['webDepartment'] = $row['user_department'];
                    $_SESSION['webStatus'] = $row['user_status'];
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to connect to the database.');
                }

                mysqli_stmt_close($stmtInsert);
            } else {
                $response = array('status' => 'error', 'message' => 'Invalid Username or Password.');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Invalid Username or Password.');
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($con);

    echo json_encode($response);
?>
