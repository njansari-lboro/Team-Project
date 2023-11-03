$(document).ready(function () {
    // filling select with options
    const projectFilter = $("#projects-filter").get(0);
    let filters = ["All", "Recent", "Oldest"];

    filters.forEach(function (filter) {
        let option = document.createElement("option");
        option.text = filter;
        projectFilter.add(option);
    });

    // on clicking a project title dropdown
    $(".dropdown").click(function () {
        // content = #project-n-content
        let buttonId = "#" + $(this).attr("id");
        let contentId = buttonId + "-content";

        $(buttonId).toggleClass("rotated");
        $(contentId).slideToggle();
    });

    // bringing the user to create-a-project page
    $("#new-project-button").click(function () {
        window.location.href = "/pages/?page=projects&task=new_project";
    });

    // bringing user to edit a project page
    $("#project-1-link").click(function(){
        window.location.href = "/pages/?page=projects&task=new_project&projectName=Project%20%31";
    });

    $("#project-2-link").click(function(){
        window.location.href = "/pages/?page=projects&task=new_project&projectName=Project%20%32";
    });

    // inserting JQuery progressbar into <td>
    $(".progress-bar").each(function () {
        let cell = $(this).get(0);
        let progress = parseInt($(this).text(), 10);

        $(this).attr("data-value", progress + "%");

        cell.textContent = "";

        $(this).progressbar({
            value: progress,
            max: 100
        });
    });
});
