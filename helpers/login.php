<?php
    $users = [
        [
            "email" => "ben@make-it-all.co.uk",
            "firstName" => "Ben",
            "lastName" => "Hamblin",
            "password" => "password123",
            "role" => "Employee"
        ],
        [
            "email" => "admin@make-it-all.co.uk",
            "firstName" => "Alice",
            "lastName" => "Smith",
            "password" => "password123",
            "role" => "Admin"
        ],
        [
            "email" => "dilip@make-it-all.co.uk",
            "firstName" => "Dilip",
            "lastName" => "Patel",
            "password" => "password123",
            "role" => "Manager"
        ],
    ];

    session_start();
    // include('db_conn.php');  
    $username = $_POST["email"];
    $password = $_POST["password"];

    $isValidUser = false;

    foreach ($users as $user) {
        if ($user["email"] == $username && $user["password"] == $password) {
            $isValidUser = true;
            $_SESSION["user"] = $user;
            break;
        }
    }

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
?>
