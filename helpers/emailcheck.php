<?php

include('../pages/database.php');
include('../pages/global.php');

if (!connect_to_database()) {
    echo ("Unable to connect to database. Please try later.");
    exit;
}


$user_records = get_records_sql('select id, email, registered from user');
session_start();
// include("db-conn.php");  

$user_email = isset($_POST["email"]) ? $_POST["email"] : null;

$isValidUser = false;
$registered = false;
if ($user_email) {
    foreach ($user_records as $user_record) {
        if ($user_record['email'] === $user_email) {
            $isValidUser = true;
            $registered = $user_record['registered'] == 1;
            $userId = $user_record['id'];
            break;
        }
    }
}

if ($isValidUser) {
    echo json_encode([
        'status' => $registered ? "registered" : "unregistered",
        'userId' => $userId
    ]);
} else {
    echo "false";
}
