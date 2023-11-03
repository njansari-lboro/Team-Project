$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('projectName')) {
        var projectName = urlParams.get('projectName');
        $('#pname').val(projectName);
    }

    $("#closebtn").click(function () {
        window.location.href = "/pages/?page=projects"
    });
});
