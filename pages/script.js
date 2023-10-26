customElements.define("load-svg", class extends HTMLElement {
    async connectedCallback() {
        const src = this.getAttribute("src")
        const shadowRoot = this.shadowRoot || this.attachShadow({ mode: "open" })

        shadowRoot.innerHTML = await (await fetch(src)).text()

        shadowRoot.append(...this.querySelectorAll("[shadowRoot]"))

        if (this.hasAttribute("replaceWith")) {
            this.replaceWith(...shadowRoot.childNodes);
        }
    }
})

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

    $("#profile-menu-button").click(() => $("#profile-menu-items").toggleClass("show"))
    $("#edit-profile-button").click(() => {
        dismissProfileMenu()
    })

    $(window).click((event) => {
        if (!event.target.closest("#profile-menu")) {
            dismissProfileMenu()
        }
    })
})

function toggleSidebar() {
    $(document.body).toggleClass("sidebar-expanded")
    localStorage.setItem("sidebarExpanded", $(document.body).hasClass("sidebar-expanded"))
}

function dismissProfileMenu() {
    $("#profile-menu-items").removeClass("show")
}
