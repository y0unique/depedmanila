<?php
    // $sql = "SELECT * FROM userstbl WHERE user_id = '1'";
    // $sql1 = mysqli_query($data1, $sql);
    // $row = mysqli_fetch_assoc($sql1);
    // $sql2 = $row['user_username'];

    //Data for index.php
    //total users in usersvw
    $sql = "SELECT * FROM usersvw WHERE status = 'active'";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_num_rows($sql1);
    $total_users = $row;

    //total downladable in downloadablefilesvw
    $sql = "SELECT * FROM downloadablefilesvw WHERE status = 'active'";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_num_rows($sql1);
    $total_downloadable = $row;

    //total downladable in transparencyfilesvw
    $sql = "SELECT * FROM transparencyfilesvw WHERE status = 'active'";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_num_rows($sql1);
    $total_transparency = $row;

    //total downladable in issuancesvw
    $sql = "SELECT * FROM issuancesvw WHERE status = 'active'";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_num_rows($sql1);
    $total_issuances = $row;
    
    


?>