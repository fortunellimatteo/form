<?php

    session_start();
    $customerName = $_SESSION['customerName'];
    $timestampStart = $_SESSION['timestampStart'];

    $conn = mysqli_connect("localhost", "root", "", "companyform");
    $signature = $_REQUEST['image'];
    if ($signature != '') {
        $signature = explode(";", $signature)[1];
        $signature = explode(",", $signature)[1];
        $signature = str_replace(" ", "+", $signature);

        $signature = base64_decode($signature);
        $pathNameSig = "signatures/".$customerName."_signature.jpeg";
        file_put_contents($pathNameSig, $signature);

        $sql = "INSERT INTO tbsignaturescompanyform VALUES ('$customerName','$timestampStart', '$pathNameSig')";
        mysqli_query($conn, $sql);

        echo "Signature uploaded";
    } else {
        echo "Signature not uploaded";
    }

    // Close connection
    mysqli_close($conn);

?>
