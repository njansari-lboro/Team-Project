$(document).ready(() => {
    const body = $(document.body)
    body.addClass("no-transition")

    setTimeout(() => body.removeClass("no-transition"), 0)

    // Toggle the side navigation
    const sidebarToggle = $("#sidebar-toggle")

    // Persist sidebar toggle between refreshes
    if (localStorage.getItem("sidebarExpanded") === "true") {
        body.toggleClass("sidebar-expanded")
    }

    sidebarToggle.click(event => {
        event.preventDefault()
        toggleSidebar()
    })

    const params = new URLSearchParams(document.location.search)
    const page = params.get("page")
    $(`#${page}-sidebar-item`).addClass("selected")

    $("#dimmed-overlay").click(toggleSidebar)

    if (window.matchMedia("(max-width: 800px)").matches) {
        if ($(document.body).hasClass("sidebar-expanded")) {
            body.removeClass("no-transition")
            document.body.offsetHeight
            toggleSidebar()
            return
        }
    }

    document.body.offsetHeight // Force reflow

    $("#profile-menu-button").click(() => {
        $("#profile-menu-items").show()
        $("#profile-menu-button").css("background-color", "var(--unemphasised-selected-content-background-color)")
    })

    $("#edit-profile-button").click(() => {
        dismissProfileMenu()
        $("#edit-profile-modal").fadeIn(500, "swing")

        $("#edit-first-name-input").val(firstName)
        $("#edit-last-name-input").val(lastName)
        $("#edit-email-input").val(emailAddress)
        $("#edit-password-input").val(password)

        $("#edit-first-name-input").change(checkIfEditProfileCanSave)
        $("#edit-last-name-input").change(checkIfEditProfileCanSave)
        $("#edit-email-input").change(checkIfEditProfileCanSave)

        $("#edit-password-input").mouseout(() => {
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

        $("#hide-password-icon").hide()
        checkIfEditProfileCanSave()
    })

    $(window).click((event) => {
        if (!event.target.closest("#profile-menu")) {
            dismissProfileMenu()
        }
    })

    // $("#edit-profile-button").click()

    $(".dismiss-edit-profile-button").click(() => $("#edit-profile-modal").fadeOut())
})

function toggleSidebar() {
    $(document.body).toggleClass("sidebar-expanded")
    localStorage.setItem("sidebarExpanded", $(document.body).hasClass("sidebar-expanded"))
}

function dismissProfileMenu() {
    $("#profile-menu-items").hide()
    $("#profile-menu-button:not(:hover)").css("background-color", "var(--bar-background-color)")
}

function checkIfEditProfileCanSave() {
    const firstName = $("#edit-first-name-input").val()
    const lastName = $("#edit-last-name-input").val()

    let saveIsDisabled = true
    setTimeout(() => $("#save-button").prop("disabled", saveIsDisabled), 0);

    if (firstName.trim().length === 0) {
        return
    }

    if (lastName.trim().length === 0) {
        return
    }

    saveIsDisabled = false
}
