<?php
    //include database
    include 'connection.php';
    session_start();
    if(isset($_POST['loginButton'])){
        function validate($con){
            $con = trim($con);
            $con = stripslashes($con);
            $con = htmlspecialchars($con);
            return $con;
        }
        $username = validate($_POST['webusername']);
        $password = md5(validate($_POST['webpassword']));
        if(empty($username)){
            header("Location: ../login.php?error=Username is required");
            exit();
        }
        elseif(empty($password)){
            header("Location: ../login.php?error=Password is required");
            
            exit();
        }else{
            $sql = "SELECT * FROM usersvw WHERE username ='$username' AND password='$password'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['username'] === $username && $row['password'] === $password){
                    $_SESSION['webID'] = $row['id'];
                    $_SESSION['webUsername'] = $row['username'];
                    $_SESSION['webEmail'] = $row['email'];
                    $_SESSION['webType'] = $row['type'];
                    $_SESSION['webPassword'] = $row['password'];
                    $_SESSION['webStatus'] = $row['status'];
                    
                    header("Location: ../index.php");
                }else{
                    header("Location: ../login.php?error=Incorrect Username or Password");
                    exit();
                }
            }else{
                header("Location: ../login.php?error=Incorrect Username or Password");
               exit();
            }
        }
    }else{
        header("Location: ../login.php?error");
        exit();
    }
?>