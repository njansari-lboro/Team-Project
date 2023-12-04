<?php

include('../pages/database.php');

if (!connect_to_database()) {
    echo json_encode(['success' => false, 'message' => 'Unable to connect to database.']);
    exit;
}

if (isset($_POST['userId'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userId = $_POST['userId'];

    $userData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'registered' => 1
    ];

    $result = savepost('user', $userData, $userId);

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving user.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Required data not provided.']);
}
