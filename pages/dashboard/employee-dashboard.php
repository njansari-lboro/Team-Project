<?php
    if (!(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))) {
        header("Location: /pages/?page=dashboard");
        die();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/global.css">
        <link rel="stylesheet" href="/pages/dashboard/employee-dashboard.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    </head>

    <body>
        <h2 class="px-5 pt-3 pb-1" id="today">
            <script>
                let today = moment().format("dddd, Do MMMM")
                document.write(today)
            </script>
        </h2>

        <div class="container-fluid pt-2 pb-2 border rounded" id="dashboard">
            <div class="row px-2 border rounded" id="tasks-preview">
                <h3 class="text-center pt-1">Your Upcoming Tasks</h3>

                <table class="table" id="tasks-table">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Complete Project Report</td>
                            <td>06/11/2023</td>
                        </tr>
                        <tr>
                            <td>UI design</td>
                            <td>20/11/2023</td>
                        </tr>
                        <tr>
                            <td>Work on SQL</td>
                            <td>01/12/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row px-1 border rounded" id="project-forums-preview">
                <div class="col-md-6">
                    <div class="pt-1"></div>

                    <div class="row px-2 border rounded" id="project-preview">
                        <h4 class="text-center pt-1">Your projects</h4>

                        <table class="table" id="project-table">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Due date</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Project 1</td>
                                    <td>12/11/23</td>
                                </tr>
                                <tr>
                                    <td>Project 2</td>
                                    <td>25/11/23</td>
                                </tr>
                                <tr>
                                    <td>Project 3</td>
                                    <td>7/12/23</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pt-1"></div>

                    <div class="row px-2 border rounded" id="forums-preview">
                        <h4 class="text-center pt-1">Recent Forums</h4>
                        <table class="table" id="forums-table">
                            <thead>
                                <tr>
                                    <th>Form Name</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Meeting Preparation</td>
                                    <td>Alice</td>
                                </tr>
                                <tr>
                                    <td>Meeting Preparation</td>
                                    <td>Alice</td>
                                </tr>
                                <tr>
                                    <td>Meeting Preparation</td>
                                    <td>Alice</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-1"></div>
                </div>
            </div>

            <div class="pt-1"></div>
        </div>

        <script>
            $(document).ready(() => {
                $("#tasks-preview").click(() => {
                    window.location.href = "?page=tasks"
                })

                $("#project-preview").click(() => {
                    //ask what page to lead to
                    // window.location.href = "?page=tasks"
                })

                $("#forums-preview").click(() => {
                    window.location.href = "?page=forums"
                })
            })
        </script>
    </body>
</html>
