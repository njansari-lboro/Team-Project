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
// include("db_conn.php");  

$useremail = isset($_POST["email"]) ? $_POST["email"] : null;
$inviteCode = isset($_POST["invite_code"]) ? $_POST["invite_code"] : null;

$isValidUser = false;

if ($inviteCode) {

    if (in_array($inviteCode, $emails)) {
        $isValidUser = true;
    }
} else {
    foreach ($emails as $email) {
        if ($useremail == $email) {
            $isValidUser = true;
            break;
        }
    }
}

if ($isValidUser) {
    echo "true";
} else {
    echo "false";
}
