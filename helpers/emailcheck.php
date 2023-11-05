<?php
    $emails = [
        "admin@make-it-all.co.uk",
        "dilip@make-it-all.co.uk",
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
    // include("db-conn.php");  

    $user_email = isset($_POST["email"]) ? $_POST["email"] : null;

    $isValidUser = false;

    if ($user_email) {
        if (in_array($user_email, $emails)) {
            $isValidUser = true;
        }
    }

    echo $isValidUser ? "true" : "false";
?>
