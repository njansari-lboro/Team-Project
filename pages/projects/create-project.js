$(() => {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("project_name")) {
        var projectName = urlParams.get("project_name");
        $("#pname").val(projectName);
    }

    $("#closebtn").click(() => {
        window.location.href = "/pages/?page=projects"
    });

    $("#project-deadline").datepicker({ dateFormat: "dd/mm/yy" });
});
