<?php

    session_start();

    $conn = mysqli_connect("localhost", "root", "", "companyform");

    $customerName = $_REQUEST['customerName'];
    $badgeNumber = $_REQUEST['badgeNumber'];
    $today = date('Y-m-d H:i:s');

    $_SESSION['customerName'] = $customerName;
    $_SESSION['timestampStart'] = $today;

    $sql = "INSERT INTO tbdatacompanyform VALUES ('$customerName','$today' ,'$badgeNumber')";

    if(mysqli_query($conn, $sql)){
        echo "Data inserted";
    } else{
        echo "Data not inserted";
    }

    // Close connection
    mysqli_close($conn);

?>
