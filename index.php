<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Make-It-All!</title>
</head>

<body>

    <div class="container h-100 d-flex align-items-center justify-content-center">
        <div class="centered-content">
            <h1 class="mb-4 text-center">Make-It-All</h1>
            <form id="emailForm">
                <div class="form-group">
                    <p id="emailDisplay"><span style="font-weight: bold;" id="displayedEmail">employee@make-it-all.co.uk</span> <a href="#" id="changeEmail">Change?</a></p>
                    <input type="email" class="form-control" id="emailInput" placeholder="Company Email Address">
                </div>
                <div id="passwordField">

                    <div class="form-group">
                        <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="mainBtn">Next</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="framework.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>