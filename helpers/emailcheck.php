<?php
    $emails = [
        "admin@make-it-all.co.uk",
        "employee@make-it-all.co.uk",
        "ben@make-it-all.co.uk",
        "nayan@make-it-all.co.uk",
        "iori@make-it-all.co.uk",
        "aaron@make-it-all.co.uk",
        "max@make-it-all.co.uk",
        "shannon@make-it-all.co.uk",
        "yuelin@make-it-all.co.uk"
    ];

    session_start();
    // include("db_conn.php");  

    $useremail = $_POST["email"];

    $isValidUser = false;

    foreach ($emails as $email) {
        if ($useremail == $email) {
            $isValidUser = true;
            break;
        }
    }
    
    if ($isValidUser) {
        echo "true";
    } else {
        echo "false";
    }
?>
