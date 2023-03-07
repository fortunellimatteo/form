<?php

    session_start();
    $customerName = $_SESSION['customerName'];
    $timestampStart = $_SESSION['timestampStart'];

    $date = new \DateTime($timestampStart);
    $dateString = $date->format('Y-m-d');
    $hourString = $date->format('H');
    $minuteString = $date->format('i');

    $to_email = $_GET['email'];
    $subject = "Form for companies of Matteo";
    $body = "Hi ".$customerName.",
    on date ".$dateString." ".$hourString.":".$minuteString." your data has been saved, we will recall you for other informations.
Thank you.";

    if (mail($to_email, $subject, $body)) {
        $_SESSION['customerName'] = '';
        $_SESSION['timestampStart'] = '';
        echo "Email successfully sent to $to_email...";
        header("Location: index.php");
    } else {
        echo "Email sending failed $to_email...";
        header("Location: summaryPage.php");
    }

    // mail di prova fortunellimatteo7@gmail.com e pass: Caraibi97 da inserire nel form
?>
