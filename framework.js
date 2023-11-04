// DEALS WITH LOGIN LOGIC/SCREENS AND REDIRECTS TO MAIN INDEX, PAGE DASHBOARD

$(() => {
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
})

function validateEmail(email) {
    // let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    // return re.test(String(email).toLowerCase())

    return email.match(/^\w+@make-it-all\.co\.uk$/)
}

function validateAndDisplayEmail() {
    let email = $("#emailInput").val()

    if (!email.endsWith("@make-it-all.co.uk")) {
        alert("Please enter a valid @make-it-all.co.uk email address.")
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

    $("#mainBtn").prop("disabled", $("#emailInput").val().length === 0)

    setTimeout(() => {
        $("#emailInput").focus()
        setTimeout(() => $("#emailInput").click(), 100)
    }, 100)
}

function notRecognised(email) {
    //show email isnt recognised screen (needs to be made in html first)
    console.log("PUT HTML NOW!!")

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
