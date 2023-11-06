<!-- LOGIN INDEX. THIS IS SHOWN TO THE USER AS THEY FIRST FOLLOW THE URL -->
<?php
    session_start();

    if (isset($_GET["invite_code"])) {
        $name = base64_decode($_GET["invite_code"]);
    } else {
        $name = "";
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="global.css">
        <link rel="stylesheet" href="style.css">

        <script type="text/javascript" src="/loadSvgCustomTag.js"></script>

        <title>Make-It-All</title>
    </head>

    <body>
        <script type="text/javascript">
            const inviteName = "<?php echo ucfirst($name) ?>"
            const inviteEmail = "<?php echo "$name@make-it-all.co.uk" ?>"
        </script>

        <div class="container-fluid h-100 d-flex align-items-center justify-content-center">
            <div id="register-account-card" class="center" style="display: none">
                <br>
                
                <h1>Register Your Account</h1>
                
                <br>
                
                <h2>
                    Welcome <?php echo ucfirst($name) ?>
                </h2>
                
                <div id="register-first-name" class="register-profile-detail">
                    <span id="register-first-name-label">First Name</span>
                    <input id="register-first-name-input" type="text">
                </div>

                <div id="register-last-name" class="register-profile-detail">
                    <span id="register-last-name-label">Last Name</span>
                    <input id="register-last-name-input" type="text">
                </div>

                <div id="register-email" class="register-profile-detail">
                    <span id="register-email-label">Email Address</span>
                    <input id="register-email-input" type="email">
                </div>

                <div id="register-password" class="register-profile-detail">
                    <span id="register-password-label">Password</span>

                    <div id="register-password-input-container">
                        <input id="register-password-input" type="password">

                        <button id="show-hide-password-button">
                            <load-svg id="show-password-icon" src="/assets/showIcon.svg">
                                <style shadowRoot>
                                    svg {
                                        height: 1.25em;
                                        padding-top: 0.2em
                                    }

                                    .fill {
                                        fill: var(--icon-color)
                                    }
                                </style>
                            </load-svg>

                            <load-svg id="hide-password-icon" src="/assets/hideIcon.svg">
                                <style shadowRoot>
                                    svg {
                                        height: var(--body);
                                    }

                                    .fill {
                                        fill: var(--icon-color)
                                    }
                                </style>
                            </load-svg>
                        </button>
                    </div>
                </div>

                <div id="register-confirm-password" class="register-profile-detail">
                    <span id="register-confirm-password-label">Confirm Password</span>

                    <div id="register-confirm-password-input-container">
                        <input id="register-confirm-password-input" type="password">
                    </div>
                </div>

                <button id="register-button" disabled>Register</button>
            </div>

            <div class="centered-content">
                <load-svg id="title-logo" class="mb-4 mx-auto" src="/assets/titleLogo.svg">
                    <style shadowRoot>
                        svg {
                            height: 4.5em;
                            width: 100%;
                            margin-top: 0.5em
                        }

                        .fill {
                            fill: rgba(0, 0, 0, 0.75);
                        }
                    </style>
                </load-svg>

                <form id="emailForm">
                    <div class="form-group">
                        <p id="emailDisplay">
                            <span style="font-weight: bold" id="displayedEmail"></span>&nbsp;&nbsp;<a href="#" id="changeEmail">Change?</a>
                        </p>

                        <input type="email" class="form-control" id="emailInput" placeholder="Company Email Address">
                    </div>

                    <div id="passwordField">
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="mainBtn">Next</button>

                    <a href="#" id="forgotPassword">Forgot Password?</a>
                </form>

                <form id="resetPassword">
                    <p>
                        <a href="mailto:admin@make-it-all.co.uk"><span style="font-weight: bold; color: rgba(209, 100, 0, 1)">Contact Support</span></a> to help reset your password
                    </p>
                </form>

                <form id="notRegistered">
                    <p>
                        Sorry the email <span style="font-weight: bold; color: var(--accent-color)">EMAIL</span> is not linked to any registered account.
                    </p>
                </form>

                <a id="tryAgain" href="#">Try Again</a>
            </div>
        </div>

        <div style="position: fixed; left: 10px; bottom: 10px; opacity: 50%">
            <img src="/img/ycsmLogo.png" width="100px">
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="framework.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
