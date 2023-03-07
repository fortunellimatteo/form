<?php

    session_start();
    $customerName = $_SESSION['customerName'];
    $timestampStart = $_SESSION['timestampStart'];

    $conn = mysqli_connect("89.46.111.193", "Sql1699276", "Caraibi_97", "Sql1699276_1");

    $sql = "SELECT TBDATA.badgeNumber, TBIMAGES.imagePath, 
            TBBARCODES.barCodeLink, TBSIGNATURES.signaturePath
            FROM tbdatacompanyform TBDATA
            
            LEFT JOIN tbimagescompanyform TBIMAGES
            ON TBDATA.customerName = TBIMAGES.customerName
            AND TBDATA.timestampStart = TBIMAGES.timestampStart
            
            LEFT JOIN tbbarcodescompanyform TBBARCODES
            ON TBDATA.customerName = TBBARCODES.customerName
            AND TBDATA.timestampStart = TBBARCODES.timestampStart
            
            LEFT JOIN tbsignaturescompanyform TBSIGNATURES
            ON TBDATA.customerName = TBSIGNATURES.customerName
            AND TBDATA.timestampStart = TBSIGNATURES.timestampStart
            
            WHERE TBDATA.customerName = '$customerName' AND TBDATA.timestampStart = '$timestampStart';";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            /*echo "badgeNumber: " . $row["badgeNumber"]. 
                "imagePath: " . $row["imagePath"]. 
                "barCodeLink: " . $row["barCodeLink"]. 
                "signaturePath: " . $row["signaturePath"];*/

                $imageStyle = "this.style.display='block'";
                
                /*echo '<table class="table" id="tableResponsive">';
                echo '<thead>';
                echo '    <tr>';
                echo '      <th scope="col"></th>';
                echo '      <th scope="col">Badge number</th>';
                echo '      <th scope="col">Image s path</th>';
                echo '      <th scope="col">Barcode s link</th>';
                echo '      <th scope="col">Signature s link</th>';
                echo '    </tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '    <tr>';
                echo '      <th scope="row">1</th>';
                echo '      <td>'.$row["badgeNumber"].'</td>';
                echo '      <td>'.'<img src="/form/'.$row["imagePath"].'" onload="'.$imageStyle.'" width="80" height="80"/>'.'</td>';
                echo '      <td>'.$row["barCodeLink"].'</td>';
                echo '      <td>'.'<img src="/form/'.$row["signaturePath"].'" onload="'.$imageStyle.'" width="200" height="80"/>'.'</td>';
                echo '    </tr>';
                echo '    <tr>';
                echo '    <th scope="row">2</th>';
                echo '    <td>Jacob</td>';
                echo '    <td>Thornton</td>';
                echo '    <td>@fat</td>';
                echo '    <td>@fat</td>';
                echo '    </tr>';
                echo '    <tr>';
                echo '    <th scope="row">3</th>';
                echo '    <td>Larry</td>';
                echo '    <td>the Bird</td>';
                echo '    <td>@twitter</td>';
                echo '    <td>@twitter</td>';
                echo '    </tr>';
                echo '</tbody>';
                echo '</table>';*/

                echo '<div id="tableResponsive">';
                echo $row["badgeNumber"];
                echo '<p class="line">____________________________</p>';
                echo '<img src="/form/'.$row["imagePath"].'" onload="'.$imageStyle.'" width="80" height="80"/>';
                echo '<p class="line">____________________________</p>';
                if (strlen($row["barCodeLink"]) > 35) {
                    $string = $row["barCodeLink"];
                    $rest = substr($string, 0, 35);
                    echo $rest.'...';
                } else {
                    echo $row["barCodeLink"];
                }
                echo '<p class="line">____________________________</p>';
                echo '<img src="/form/'.$row["signaturePath"].'" onload="'.$imageStyle.'" width="200" height="80"/>';
                echo '</div>';

        }
      } else {
            echo "No customer added";
      }

    // Close connection
    mysqli_close($conn);
?>
