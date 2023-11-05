<?php
    if (!isset($_SERVER["HTTP_REFERER"]) || empty($_SERVER["HTTP_REFERER"])) {
        header("Location: /pages/?page=projects");
        die();
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="/global.css">
        <link rel="stylesheet" href="/pages/projects/create-project.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>

    <body>
        <form method="post" id="details" action="?page=projects&task=new_project_tasks">
            <h2 id="closebtn">&times;</h2>
            
            <input type="text" id="pname" name="pname" placeholder="Enter a project name" required />
            
            <br><br>
            
            <textarea id="pbrief" name="pbrief" rows="4" cols="50" placeholder="Enter project brief" required></textarea>
            
            <br><br>

            <input type="text" id="project-deadline" placeholder = "Enter Project Deadline">

            <h1>Select Team Members</h1>

            <div class="container">
                <input type="checkbox" class="nameCheck" name="names-list[]" value="John Cena"> John Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jean Sienna"> Jean Sienna <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jon Cena"> Jon Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jone Cena"> Jone Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jonas Cena"> Jonas Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jonathan Cena"> Jonathan Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jerry Cena"> Jerry Cena <br>
                <input type="checkbox" class="nameCheck" name="names-list[]" value="Jimmy Cena"> Jimmy Cena <br>
            </div>

            <br><br>
            
            <input id="submitBtn" type="submit" value="Continue" class="">
        </form>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="/pages/projects/create-project.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#project-deadline').datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
    </body>
</html>