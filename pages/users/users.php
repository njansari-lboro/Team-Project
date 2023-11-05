<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/users/users.css">

        <title>User List</title>
    </head>

    <body>
        <div id="user-list-app">
            <h1>User List</h1>

            <div id="users-container">
                <div class="user">
                    <p>Name: Ben Hamblin</p>
                    <p>Email: ben@make-it-all.co.uk</p>
                    <p>Registered: Yes</p>
                    <p>User Type: Employee</p>
                </div>

                <div class="user">
                    <p>Name: Dilip Patel</p>
                    <p>Email: dilip@make-it-all.co.uk</p>
                    <p>Registered: Yes</p>
                    <p>User Type: Manager</p>
                </div>

                <div class="user">
                    <p>Name: Admin</p>
                    <p>Email: admin@make-it-all.co.uk</p>
                    <p>Registered: Yes</p>
                    <p>User Type: Admin</p>
                </div>
            </div>

            <h2>Add New User</h2>

            <form id="add-user-form">
                <input type="text" id="fullname" placeholder="Full name" required>

                <input type="email" id="email" placeholder="Email" required>

                <select id="user_type" required>
                    <option value="">Select user type...</option>
                    <option value="User">Employee</option>
                    <option value="Admin">Manager</option>
                    <option value="Admin">Admin</option>
                </select>

                <button type="button" id="add-user-btn" disabled>Add User</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(() => {
                function validateForm() {
                    const fullname = $("#fullname").val().trim();
                    const email = $("#email").val().trim();
                    const user_type = $("#user_type").val();
                    const isFormValid = fullname && email && user_type;

                    $("#add-user-btn").prop("disabled", !isFormValid);
                }

                validateForm();
                $("#add-user-form input, #add-user-form select").on("change keyup", validateForm);

                $("#add-user-btn").click(() => {
                    const fullname = $("#fullname").val().trim();
                    const email = $("#email").val().trim();
                    const registered = $("#registered").is(":checked");
                    const userType = $("#user_type").val();

                    const userDiv = $("<div>").addClass("user").html(`
                    <p>Name: ${fullname}</p>
                    <p>Email: ${email}</p>
                    <p>Registered: No</p>
                    <p>User Type: ${userType}</p>
                    `);

                    $("#users-container").append(userDiv);

                    $("#add-user-form")[0].reset();
                    validateForm();
                });
            });
        </script>
    </body>
</html>
