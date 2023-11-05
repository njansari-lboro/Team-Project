// DEALS WITH LOGIN LOGIC/SCREENS AND REDIRECTS TO MAIN INDEX, PAGE DASHBOARD

$(() => {
    if (inviteCode) {
        checkInviteCode(inviteCode)
    }
    
    $("#edit-email-input").val(inviteCode).prop("readonly", true)

    $("#emailForm").show()
    $("#emailDisplay").hide()
    $("#passwordInput").hide()
    $("#forgotPassword").hide()
    $("#passwordField").hide()
    $("#resetPassword").hide()
    $("#tryAgain").hide()
    $("#mainBtn").show()
    $("#notRegistered").hide()

    $("#mainBtn").prop("disabled", $("#emailInput").val().length === 0)

    setTimeout(() => {
        $("#emailInput").focus()
        setTimeout(() => $("#emailInput").click(), 100)
    }, 100)

    $("#emailForm").submit((e) => {
        e.preventDefault()

        if ($("#passwordField").is(":hidden")) {
            validateAndDisplayEmail()
        } else {
            validatePasswordAndLogin()
        }
    })

    $(".form-control").on("input", function (e) {
        e.preventDefault()
        $("#mainBtn").prop("disabled", $(this).val().length === 0)
    })

    $("#changeEmail").click((e) => {
        e.preventDefault()
        restart()
    })

    $("#forgotPassword").click((e) => {
        e.preventDefault()
        showResetPassword()
    })

    $("#tryAgain").click((e) => {
        e.preventDefault()
        restart()
    })

    $("#save-button").click((event) => {
        event.preventDefault()
      
        const password = $("#edit-password-input").val()
        
        if (isValidPassword(password)) {
            window.location = "pages/?page=dashboard"
        } else {
            alert("Password must be a minimum of 12 characters and contain a combination of uppercase letters, lowercase letters, numbers, and symbols.")
        }
    })
})

function validateAndDisplayEmail() {
    let email = $("#emailInput").val()

    if (!email.match(/^\w+@make-it-all\.co\.uk$/)) {
        alert("Please enter a valid @make-it-all.co.uk email address.")
        return false
    }

    $.ajax({
        type: "POST",
        url: "helpers/emailcheck.php",
        data: {
            email: email,
        },
        success: (response) => {
            if (response == "true") {
                console.log("success")
                $("#emailInput").hide()
                $("#displayedEmail").text(email)
                $("#passwordInput").show()
                $("#passwordField").show()
                $("#emailDisplay").show()
                $("#forgotPassword").show()
                $("#mainBtn").html("Login")

                $("#mainBtn").prop("disabled", $("#passwordInput").val().length === 0)

                setTimeout(() => {
                    $("#passwordInput").focus()
                    setTimeout(() => $("#passwordInput").click(), 100)
                }, 100)
            } else {
                console.log("false")
                notRecognised(email) // Call the function if the email is not recognized
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert(`Error: ${textStatus}\n${errorThrown}`)
        }
    })

}

function validatePasswordAndLogin() {
    let email = $("#emailInput").val()
    let password = $("#passwordInput").val()

    $.ajax({
        type: "POST",
        url: "helpers/login.php",
        data: {
            email: email,
            password: password
        },
        success: (response) => {
            console.log(response)

            if (response == "true") {
                console.log("success")
                window.location = "pages/?page=dashboard"
            } else {
                alert("Login failed.\nPlease check your email and password then try again.")
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert(`Error: ${textStatus}\n${errorThrown}`)
        }
    })
}

function restart() {
    $("#emailForm").show()
    $("#emailInput").show()
    $("#passwordField").hide()
    $("#mainBtn").html("Next")
    $("#emailDisplay").hide()
    $("#forgotPassword").hide()
    $("#resetPassword").hide()
    $("#tryAgain").hide()
    $("#mainBtn").show()
    $("#notRegistered").hide()
    $("#passwordInput").val("")

    $("#mainBtn").prop("disabled", $("#emailInput").val().length === 0)

    setTimeout(() => {
        $("#emailInput").focus()
        setTimeout(() => $("#emailInput").click(), 100)
    }, 100)
}

function notRecognised(email) {
    //show email isnt recognised screen (needs to be made in html first)

    $("#notRegistered span").text(email)
    $("#emailForm").hide()
    $("#emailInput").hide()
    $("#passwordField").hide()
    $("#emailDisplay").hide()
    $("#forgotPassword").hide()
    $("#mainBtn").hide()
    $("#notRegistered").show()
    $("#tryAgain").show()
}

function showResetPassword() {
    $("#emailForm").hide()
    $("#emailInput").hide()
    $("#passwordField").hide()
    $("#emailDisplay").hide()
    $("#forgotPassword").hide()
    $("#mainBtn").hide()
    $("#resetPassword").show()
    $("#tryAgain").show()
}

function register(){
    $('.centered-content').hide()
    $('#edit-profile-card').show()

    $("#edit-first-name-input").change(checkIfEditProfileCanSave)
    $("#edit-last-name-input").change(checkIfEditProfileCanSave)
    $("#edit-email-input").change(checkIfEditProfileCanSave)
    $("#edit-email-input").change(checkIfEditProfileCanSave);
    $("#edit-password-input").change(checkIfEditProfileCanSave);


    $("#edit-password-input-container").mouseleave(() => {
        $("#edit-password-input").attr("type", "password")
        $("#show-password-icon").show()
        $("#hide-password-icon").hide()
    })

    $("#show-hide-password-button").click(() => {
        $("#show-password-icon").toggle()
        $("#hide-password-icon").toggle()

        if ($("#show-password-icon").is(":visible")) {
            $("#edit-password-input").attr("type", "password")
        } else {
            $("#edit-password-input").attr("type", "text")
        }
    })

    $(".dismiss-edit-profile-button").click(() => {
        $("#edit-profile-modal").fadeOut(() => {
            $("#edit-password-input").attr("type", "password")
            $("#show-password-icon").show()
            $("#hide-password-icon").hide()
        })
    })



    $("#hide-password-icon").hide()
//     checkIfEditProfileCanSave()
}


function checkInviteCode(code) {
    $.ajax({
        type: "POST",
        url: "helpers/emailcheck.php",
        data: {
            invite_code: code
        },
        success: function(response) {
            if (response == "true") {
                register();
            } else {
               restart();
            }
        }
    });
}

function checkIfEditProfileCanSave() {
    const firstName = $("#edit-first-name-input").val().trim();
    const lastName = $("#edit-last-name-input").val().trim();
    const email = $("#edit-email-input").val().trim();
    const password = $("#edit-password-input").val().trim();
    
    let saveIsDisabled = firstName.length === 0 || lastName.length === 0 || email.length === 0 || password.length === 0;
    
    setTimeout(() => $("#save-button").prop("disabled", saveIsDisabled), 0);
}

function isValidPassword(password) {
    const minLengthRegex = /.{12,}/; 
    const uppercaseRegex = /[A-Z]/;
    const lowercaseRegex = /[a-z]/;
    const numberRegex = /[0-9]/; 
    const symbolRegex = /[\W_]/; 

    const isLongEnough = minLengthRegex.test(password);
    const hasUppercase = uppercaseRegex.test(password);
    const hasLowercase = lowercaseRegex.test(password);
    const hasNumber = numberRegex.test(password);
    const hasSymbol = symbolRegex.test(password);

    return isLongEnough && hasUppercase && hasLowercase && hasNumber && hasSymbol;
}
