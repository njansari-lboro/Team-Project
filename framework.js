// DEALS WITH LOGIN LOGIC/SCREENS AND REDIRECTS TO MAIN INDEX, PAGE DASHBOARD

$(document).ready(() => {
    $("#emailForm").show()
    $("#emailDisplay").hide()
    $("#passwordInput").hide()
    $("#forgotPassword").hide()
    $("#passwordField").hide()
    $("#resetPassword").hide()
    $("#tryAgain").hide()
    $("#mainBtn").show()
    $("#notRegistered").hide()

    $("#emailForm").submit((e) => {
        e.preventDefault()

        if ($("#passwordField").is(":hidden")) {
            validateAndDisplayEmail()
        } else {
            validatePasswordAndLogin()
        }
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
})

function validateEmail(email) {
    let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return re.test(String(email).toLowerCase())
}

function validateAndDisplayEmail() {
    let email = $("#emailInput").val()

    if (!email) {
        alert("Email cannot be blank")
        return false
    } else if (!email.endsWith("@make-it-all.co.uk")) {
        alert("Please enter an email ending with @make-it-all.co.uk")
        return false
    } else if (!validateEmail(email)) {
        notRecognised()
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
            } else {
                console.log("false")
                notRecognised(email) // Call the function if the email is not recognized
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert(`Error: ${textStatus}\n${errorThrown}`)
        }
    })

    // $("#emailInput").hide()
    // $("#displayedEmail").text(email)
    // $("#passwordInput").show()
    // $("#passwordField").show()
    // $("#emailDisplay").show()
    // $("#forgotPassword").show() 
    // $("#mainBtn").html("Login")
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
                alert("Login failed. Please check your email/password and try again.")
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
}

function notRecognised(email) {
    //show email isnt recognised screen (needs to be made in html first)
    console.log("PUT HTML NOW!!")

    $("#notRegistered span").text(email)
    $("#notRegistered a").attr("href", `mailto:${email}`)
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
