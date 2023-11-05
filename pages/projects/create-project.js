$(() => {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("projectName")) {
        var projectName = urlParams.get("projectName");
        $("#name").val(projectName);
    }

    $("#closebtn").click(() => {
        window.location.href = "/pages/?page=projects"
    });

    $("#project-deadline").datepicker({ dateFormat: "dd/mm/yy" });
});
