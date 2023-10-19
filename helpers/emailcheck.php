<?php
$emails = [
    'admin@make-it-all.co.uk', 'ben@make-it-all.co.uk',
];


session_start();
// include('db_conn.php');  

$useremail = $_POST['email'];

$isValidUser = false;
foreach ($emails as $email) {
    if ($useremail == $email) {
        $isValidUser = true;
        break;
    }
}
if ($isValidUser) {
    echo 'true';
} else {
    echo 'false';
}
