$(() => {
    // Toggle the side navigation
    const sidebarToggle = $("#sidebar-toggle")

    sidebarToggle.click((event) => {
        event.preventDefault()
        toggleSidebar()
    })

    $("#sidebar-dim.dimmed-overlay").click(toggleSidebar)

    $("#profile-menu-button").click((event) => {
        event.preventDefault()

        if ($("#profile-menu-items").is(":visible")) {
            dismissProfileMenu()
        } else {
            $("#profile-menu-items").show()
            $("#profile-menu-button").css("background-color", "var(--unemphasised-selected-content-background-color)")
        }
    })

    $("#edit-profile-button").click(() => {
        dismissProfileMenu()
        $("#edit-profile-modal").fadeIn(500, "swing")

        $("#edit-first-name-input").val(user["firstName"])
        $("#edit-last-name-input").val(user["lastName"])
        $("#edit-email-input").val(user["email"])
        $("#edit-password-input").val(user["password"])

        $("#edit-first-name-input").change(checkIfEditProfileCanSave)
        $("#edit-last-name-input").change(checkIfEditProfileCanSave)
        $("#edit-email-input").change(checkIfEditProfileCanSave)

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
    })

    $("#invite-button").click((event) => {
        event.preventDefault()

        $("#invite-member-modal").fadeIn(500, "swing")

        const emailMatch = /^(.+)@make-it-all\.co\.uk$/

        $("#invite-member-email").on("input", () => {
            const email = $("#invite-member-email").val()

            let inviteIsDisabled = true

            if (email.trim().length > 0) {
                if (email.match(emailMatch)) {
                    inviteIsDisabled = false
                }
            }

            $("#invite-member-button").prop("disabled", inviteIsDisabled)
            $("#invite-link").val("")
            $("#copy-invite-link-button").prop("disabled", true)
        })

        $("#invite-member-email").change(function () {
            $(this).blur()
            $("#invite-member-button").click()
        })

        $("#invite-member-button").click(() => {
            const email = $("#invite-member-email").val()
            const name = email.match(emailMatch)

            if (!(name && name.length > 1)) {
                return
            }

            $("#invite-link").val(`http://team02.sci-project.lboro.ac.uk/?invite_code=${btoa(name[1])}`)
            $("#copy-invite-link-button").prop("disabled", false)
        })

        $("#copy-invite-link-button").click(() => {
            $("#invite-link").focus()
            $("#invite-link").select()
            document.execCommand("copy")
        })

        $("#close-invite-member-modal-button").click(() => {
            $("#invite-member-modal").fadeOut(() => {
                $("#invite-member-email").val("")
                $("#invite-member-button").prop("disabled", true)
                $("#invite-link").val("")
                $("#copy-invite-link-button").prop("disabled", true)
            })
        })
    })

    $(window).click((event) => {
        if (!event.target.closest("#profile-menu")) {
            dismissProfileMenu()
        }
    })
})

function dismissProfileMenu() {
    $("#profile-menu-items").hide()
    $("#profile-menu-button:not(:hover)").css("background-color", "transparent")
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
