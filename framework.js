$(document).ready(function() {

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
    // Add your logic here to validate the password and perform login.
}

function restart() {
    $('#emailInput').show();
    $("#passwordField").hide();
    $('#mainBtn').html('Next');
    $('#emailDisplay').hide();
}

function validEmail() {
    // Code for when an email is valid. This is handled in validateAndDisplayEmail, so it might not be necessary.
}

function notRecognised() {
    //handle the scenario when an email is not in logins.txt
}

function notRegistered() {
    //handle the scenario when an email is in logins.txt but registered is false.
}
