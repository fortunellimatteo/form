<?php

    session_start();

    //$conn = mysqli_connect("localhost", "root", "", "companyform");
    $conn = mysqli_connect("89.46.111.193", "Sql1699276", "Caraibi_97", "Sql1699276_1");

    foreach($_FILES['images']['name'] as $i => $value) {
        $image_name = $_FILES['images']['tmp_name'][$i];
        if ($image_name != '') {
            $folder = 'upload/';
            $image_path = $folder.$_FILES['images']['name'][$i];
            move_uploaded_file($image_name, $image_path);
    
            $customerName = $_SESSION['customerName'];
            $timestampStart = $_SESSION['timestampStart'];
            $sql = "INSERT INTO tbimagescompanyform VALUES ('$customerName','$timestampStart' ,'$image_path')";
            mysqli_query($conn, $sql);

            echo "images uploaded";
        } else {
            echo "images not uploaded";
        }
    }

    // Close connection
    mysqli_close($conn);

?>
