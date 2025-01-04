<?php
    // index.php
    //selecting active carousel images
    $carousel = "SELECT * FROM carouselvw WHERE type = 'carousel' AND status = 'active' ORDER BY id DESC";
    $carousel1 = mysqli_query($con , $carousel);
    
    //total downladable in issuancesvw
    $sql = "SELECT * FROM issuancesvw WHERE status = 'active'";
    $sql1 = mysqli_query($con, $sql);
    $row = mysqli_num_rows($sql1);
    $total_issuances = $row;

    //transparencies.php
    $tranparencyInvitation = "SELECT * FROM bacfilesvw";
    $tranparencyInvitation1 = mysqli_query($con, $tranparencyInvitation);

    $transparency_board = "SELECT * FROM bacfilesvw WHERE type = 'TRANSPARENCY BOARD'";
    $transparency_board1 = mysqli_query($con, $transparency_board);



    $downloadbles = "SELECT * FROM downloadablefilesvw";
    $downloadbles1 = mysqli_query($con, $downloadbles);

    $materials = "SELECT * FROM materialfilesvw";
    $materials1 = mysqli_query($con, $materials);
?>