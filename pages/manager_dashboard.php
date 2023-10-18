
<!DOCTYPE html>
<html lang="en">
    
<head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        div {
            max-width: 95%;
            max-height: 95%;
        }
    </style>
</head>

<body>
    <h1>
        <script>
            var today = moment().format("dddd, Do MMMM");
            document.write(today);  
        </script>
    </h1>

    <div class="container-fluid border rounded" id="dashboard">
        <h2>Project Name</h2>
        <div class="row container-fluid border rounded" id="graph_deadlines">
            <div class="col-sm-6" id="graph">
                <h3>Graph goes here</h3>
            </div>
            <div class="col-sm-6">
                <div class="row container border rounded" id="overdue_tasks">
                    <h3>Overdue Tasks</h3>
                    <table>
                        <tr>
                            <th>Employee</th>
                            <th>Task</th>
                            <th>Days Overdue</th>
                        </tr>
                        <?php
                            // code to put in a new row
                        ?>
                    </table>
                </div>
                <div class="container border rounded" id="imminent_tasks">
                    <h3>Imminent Tasks</h3>
                    <table>
                        <tr>
                            <th>Employee</th>
                            <th>Task</th>
                            <th>Deadline</th>
                        </tr>
                        <?php
                            // code to put in a new row
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="pt-1"></div>
        <div class="container border rounded" id="upcoming_tasks">
            <h3>Upcoming Tasks</h3>
            <table>
                <tr>
                    <th>Task</th>
                    <th>Due Date</th>
                </tr>
                <?php
                    // code to put in a new row
                ?>
            </table>
        </div>
    </div>
</body>
