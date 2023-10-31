$(document).ready(() => {
    // filling select with options
    const projectFilter = $("#projects-filter").get(0)
    let filters = ["All", "Recent", "Oldest"]
    filters.forEach((filter) => {
        let option = document.createElement("option")
        option.text = filter
        projectFilter.add(option)
    })

    // on clicking a project title dropdown
    $(".dropdown").click(() => {
        // content = #project-n-content
        let buttonId = "#" + $(this).attr("id")
        let contentId = buttonId + "-content"

        $(buttonId).toggleClass("rotated")
        $(contentId).slideToggle()
    })

    // bringing user to create-a-project page
    $("#new-project-button").click(() => {
        window.location.href = "new-project.php"
    })

    // inserting JQuery progressbar into <td>
    $(".progress-bar").each(() => {
        let cell = $(this).get(0)

        let progress = parseInt($(this).text(), 10)
        $(this).attr("data-value", progress + "%")

        cell.textContent = ""

        $(this).progressbar({
            value: progress,
            max: 100
        })
    })
})
