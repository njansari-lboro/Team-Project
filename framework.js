// DEALS WITH LOGIN LOGIC/SCREENS AND REDIRECTS TO MAIN INDEX, PAGE DASHBOARD
jQuery(document).ready(function($) {
    $("#passwordField, #emailDisplay").hide();

    $("#emailForm").submit(function(e) {
        e.preventDefault();

        if($("#passwordField").is(":hidden")) {
            validateAndDisplayEmail();
        } else {
            validatePasswordAndLogin();
        }
    });

    $("#changeEmail").click(function(e) {
        e.preventDefault();
        restart();
    });
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validateAndDisplayEmail() {
    var email = $("#emailInput").val();

    if (!validateEmail(email) || !email.endsWith('@make-it-all.co.uk')) {
        alert('Please enter a valid @make-it-all email address');
        notRecognised(); 
        return false;
    }

    $('#emailInput').hide();
    $("#displayedEmail").text(email);
    $("#passwordField").show();
    $('#emailDisplay').show();
    $('#mainBtn').html('Login');
}

function validatePasswordAndLogin() {

    var email = $("#emailInput").val();
    var password = $("#passwordInput").val();

    $.ajax({
        type: "POST",
        url: "helpers/login.php",
        data: {
            email: email,
            password: password
        },
        success: function(response) {
            console.log(response);
            if (response == 'true') {
                console.log('success');
                window.location = 'pages/index.php?page=dashboard';
                // window.location = 'pages/dashboard.php';
            } else {
                console.log('wrong');
                alert('Login failed. Please check your email/password and try again.');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + textStatus + "\n" + errorThrown); 
        }
    });
}

function restart() {
    $('#emailInput').show();
    $("#passwordField").hide();
    $('#mainBtn').html('Next');
    $('#emailDisplay').hide();
}

function notRecognised(){
    //show email isnt recognised screen (needs to be made in html first)
}