$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('projectName')) {
        var projectName = urlParams.get('projectName');
        $('#pname').val(projectName);
    }
});
