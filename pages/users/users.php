<?php
include_once __DIR__ . '/../database.php';

// setting action - view new or default
$task = isset($_GET["task"]) ? $_GET["task"] : "default";

switch ($task) {
    case "save_user":
        save_user();
        break;
    default:
        display_default();
}

function display_default()
{
?>

    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../pages/users/users.css">

        <title>User List</title>
    </head>

    <body>
        <div id="user-list-app">
            <h1>User List</h1>

            <div id="users-container">
                <?php
                $users = get_records_sql('SELECT * FROM user');
                foreach ($users as $user) {
                    $registered = $user['registered'] == 1 ? 'Yes' : 'No';
                    $role = '';
                    switch ($user['role']) {
                        case 0:
                            $role = 'Employee';
                            break;
                        case 1:
                            $role = 'Manager';
                            break;
                        case 2:
                            $role = 'Admin';
                            break;
                    }
                    echo '<div class="user">';
                    echo '<p>Name: ' . htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) . '</p>';
                    echo '<p>Email: ' . htmlspecialchars($user['email']) . '</p>';
                    echo '<p>Registered: ' . $registered . '</p>';
                    echo '<p>User Type: ' . $role . '</p>';
                    echo '</div>';
                }
                ?>
            </div>

            <h2>Add New User</h2>

            <form id="add-user-form" method="post">
                <input type="text" name="fullname" id="fullname" placeholder="Full name" required>

                <input type="email" name="email" id="email" placeholder="Email" required>

                <select name="user_type" id="user_type" required>
                    <option value="">Select user type...</option>
                    <option value="0">Employee</option>
                    <option value="1">Manager</option>
                    <option value="2">Admin</option>
                </select>

                <button type="submit" id="add-user-btn" disabled>Add User</button>
                <span class="subtext">(Email must end with '@make-it-all.co.uk')</span>

            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(function() {
                function validateForm() {
                    const fullName = $("#fullname").val().trim();
                    const email = $("#email").val().trim();
                    const userType = $("#user_type").val();
                    const isEmailValid = email.endsWith('@make-it-all.co.uk');

                    const isFormValid = fullName && isEmailValid && userType;

                    $("#add-user-btn").prop("disabled", !isFormValid);

                    if (!isEmailValid) {
                        $("#email-error").text("Email must end with '@make-it-all.co.uk'");
                    } else {
                        $("#email-error").text(""); // Clear the error message
                    }
                }


                validateForm();
                $("#add-user-form input, #add-user-form select").on("input", validateForm);

                $("#add-user-form").submit(function(e) {
                    e.preventDefault();

                    const formData = {
                        fullname: $("#fullname").val().trim(),
                        email: $("#email").val().trim(),
                        user_type: $("#user_type").val()
                    };

                    $.ajax({
                        type: 'POST',
                        url: 'users/users.php?task=save_user',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                addUserToDOM(response.userData);
                                $("#add-user-form")[0].reset();
                            } else {
                                console.error("Error: ", response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("AJAX Error: ", status, error);
                        }
                    });

                });
            });


            function addUserToDOM(userData) {
                var roleLabels = {
                    '0': 'Employee',
                    '1': 'Manager',
                    '2': 'Admin'
                };
                var userHtml = '<div class="user">' +
                    '<p>Name: ' + escapeHtml(userData.first_name + ' ' + (userData.last_name || '')) + '</p>' +
                    '<p>Email: ' + escapeHtml(userData.email) + '</p>' +
                    '<p>Registered: No</p>' +
                    '<p>User Type: ' + roleLabels[userData.role] + '</p>' +
                    '</div>';

                $('#users-container').append(userHtml);
            }

            function escapeHtml(text) {
                return $("<div>").text(text).html();
            }
        </script>
    </body>

    </html>

<?php }

function save_user()
{

    if (!connect_to_database()) {
        die("Error: Unable to connect to database.");
    }
    global $mysqli;

    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['user_type'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $user_type = $_POST['user_type'];

        $name_parts = explode(' ', $fullname);
        $first_name = $name_parts[0];
        $last_name = isset($name_parts[1]) ? $name_parts[1] : '';

        $userData = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'role' => $user_type
        ];

        $result = savepost('user', $userData);

        if (is_numeric($result)) {
            $userData['id'] = $result;
            echo json_encode(['success' => true, 'userData' => $userData]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error saving user: ' . $result]);
        }
    } else {
        echo 'Error: Required data not provided.';
    }
}
