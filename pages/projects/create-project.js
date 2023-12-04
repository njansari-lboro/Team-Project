$(() => {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has("project_name")) {
        const projectName = urlParams.get("project_name");
        $("#pname").val(projectName);
    }

    $("#closebtn").click(() => {
        console.log('hello');
        window.location.href = "?page=projects"
    });

    $("#project-deadline").datepicker({ dateFormat: "dd/mm/yy" });
});
