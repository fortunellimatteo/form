<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "companyform");

    $customerName = $_SESSION['customerName'];
    $timestampStart = $_SESSION['timestampStart'];
    $qrcodelink = $_REQUEST['qrcodelink'];

    if($qrcodelink != '') {
        $sql = "INSERT INTO tbbarcodescompanyform VALUES ('$customerName','$timestampStart', '$qrcodelink')";
        mysqli_query($conn, $sql);
    
        echo "BarCode data inserted";
    } else {
        echo "BarCode data not inserted";
    }

?>
