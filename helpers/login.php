<?php

include('../pages/database.php');
include('../pages/global.php');

if (!connect_to_database()) {
    echo ("Unable to connect to database. Please try later.");
    exit;
}


$users = get_records_sql('select * from user');
// echo password_hash('EmployeeRole12345!', PASSWORD_DEFAULT);
session_start();

$username = $_POST["email"];
$password = $_POST["password"];
$isValidUser = false;

foreach ($users as $user) {
    if ($user["email"] == $username && password_verify($password, $user["password_hash"])) {
        $isValidUser = true;
        $_SESSION["user"] = $user;
        $_SESSION["user"]["firstName"] = $user['first_name'];
        $_SESSION["user"]["lastName"] = $user['last_name'];
        switch ($user['role']) {
            case 0:
                $_SESSION["user"]["role"] = 'Employee';
                break;
            case 1:
                $_SESSION["user"]["role"] = 'Manager';
                break;
            case 2:
                $_SESSION["user"]["role"] = 'Admin';
                break;
            default:
                echo "Invalid role";
                die();
        }
        break;
    }
}

// $_SESSION['role'] = 'Employee';
if ($isValidUser) {
    echo "true";
} else {
    echo "false";
}



session_regenerate_id();
$_SESSION["email"] = $username;

// $_SESSION["NAME"] = $username;

//CONNECT TO DB HERE WHEN WE ARE ALLOWED FOR NOW JUST ALLOW ANY USER
// echo "true";
// SET $_SESSION VARIABLES I.E. ID, USER TYPE AND NAME
// $sql = "";
// $query = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($query);
// while ($row = mysqli_fetch_assoc($query)) {
//     if ($count > 0) {
//         session_regenerate_id();
//         $name = $row["firstname"] . " " . $row["lastname"];
//         $_SESSION["ID"] = $row["id"];
//         $_SESSION["TYPE"] = $row["user_type"];
//         $_SESSION["NAME"] = $name;
//     }
// }
