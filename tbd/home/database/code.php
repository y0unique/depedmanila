<?php
    // index.php
    //selecting active carousel images
    $carousel = "SELECT * FROM carouselvw WHERE type = 'carousel' AND status = 'active' ORDER BY id DESC";
    $carousel1 = mysqli_query($con , $carousel);

    //directory.php
    //selecting active elementary schools
    $elem = "SELECT * FROM elemschoolsvw";
    $elem1 = mysqli_query($con, $elem);
    //selecting active junior high schools
    $jhs = "SELECT * FROM jhsschoolsvw";
    $jhs1 = mysqli_query($con, $jhs);
    //selecting active senior high schools
    $shs = "SELECT * FROM shsschoolsvw";
    $shs1 = mysqli_query($con, $shs);
    //selecting active alternative learning schools
    $sped = "SELECT * FROM spedschoolsvw";
    $sped1 = mysqli_query($con, $sped);

    //issuances.php
    //Numbered Memo
    $numbered2 = "SELECT * FROM issuancesvw WHERE type = 'Numbered' ORDER BY date DESC";
    $numbered3 = mysqli_query($con, $numbered2);

    //Unnumbered Memo
    $unnumbered2 = "SELECT * FROM issuancesvw WHERE type = 'Unnumbered' OR  type = 'Notices' ORDER BY date DESC";
    $unnumbered3 = mysqli_query($con, $unnumbered2);

    //Advisory
    $advisory2 = "SELECT * FROM issuancesvw WHERE type = 'Advisories' ORDER BY date DESC";
    $advisory3 = mysqli_query($con, $advisory2);

    //Circulars
    $circulars2 = "SELECT * FROM issuancesvw WHERE type = 'Circulars' ORDER BY date DESC";
    $circulars3 = mysqli_query($con, $circulars2);

    //Miscellaneous
    $miscellaneous2 = "SELECT * FROM issuancesvw WHERE type = 'Miscellaneous' ORDER BY number DESC";
    $miscellaneous3 = mysqli_query($con, $miscellaneous2);

    //Office Memorandum
    $officeMemorandum2 = "SELECT * FROM issuancesvw WHERE type = 'Office Memorandum' OR  type = 'Office Order' ORDER BY date DESC";
    $officeMemorandum3 = mysqli_query($con, $officeMemorandum2);

    //Office Order
    $officeOrder2 = "SELECT * FROM issuancesvw WHERE type = 'Office Order' ORDER BY date DESC";
    $officeOrder3 = mysqli_query($con, $officeOrder2);
    
    //City Memorandum
    $cityMemorandum = "SELECT * FROM issuancesvw WHERE type = 'City Memorandum' ORDER BY date DESC";
    $cityMemorandum1 = mysqli_query($con, $cityMemorandum);

?>