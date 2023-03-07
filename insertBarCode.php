<?php

    session_start();

    $conn = mysqli_connect("89.46.111.193", "Sql1699276", "Caraibi_97", "Sql1699276_1");

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
