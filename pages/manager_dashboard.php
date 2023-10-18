
<!DOCTYPE html>
<html lang="en">
    
<head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- move these into their own seperate file -->
    <style>
        div.container-fluid {
            max-width: 95%;
            max-height: 95%;
        }

        div.row {
            margin: 10px;
        }

        .chart-canvas {
            max-width: 295px;
            max-height: 295px;
            margin: 20px;
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

    <div class="container-fluid pt-2 border rounded" id="dashboard">
        <h2>Project Name</h2>
        <div class="row px-1 border rounded" id="graph_deadlines">
            <div class="col-md-6 d-flex align-items-center justify-content-center" id="chart">
                <canvas class="chart-canvas " id="progress_chart"></canvas>
            </div>
            <div class="col-md-6">
                <div class="pt-1"></div>
                <div class="row px-2 border rounded" id="overdue_tasks">
                    <h4 class="text-center">Overdue</h4>
                    <table>
                        <tr>
                            <th>Employee</th>
                            <th>Task</th>
                            <th>Days Overdue</th>
                        </tr>
                        <tr>
                            <td>John Cena</td>
                            <td>UI Design</td>
                            <td>4</td>
                        </tr>
                        <?php
                            // code to put in a new row
                        ?>
                    </table>
                </div>
                <div class="pt-1"></div>
                <div class="row px-2 border rounded" id="imminent_tasks">
                    <h4 class="text-center">Imminent</h4>
                    <table>
                        <tr>
                            <th>Employee</th>
                            <th>Task</th>
                            <th>Deadline</th>
                        </tr>
                        <tr>
                            <td>Jean Sienna</td>
                            <td>Unit Testing</td>
                            <td>11/10/2023</td>
                        </tr>
                        <?php
                            // code to put in a new row
                        ?>
                    </table>
                </div>
                <div class="pt-1"></div>
            </div>
        </div>
        <div class="pt-1"></div>
        <div class="row px-2 border rounded" id="upcoming_tasks">
            <h3 class="text-center">Your Upcoming Tasks</h3>
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

    <script>
        $(document).ready(() => {
            var ctx = $("#progress_chart").get(0).getContext("2d");
            
            var data = {
                labels: ["In Progress", "Completed", "Overdue"],
                datasets: [
                    {
                        // example data for now
                        data: [64, 18, 12],
                        backgroundColor: ["#888", "#D9D9D9", "#FF7A00"]
                    },
                ],
            };
    
            var progressChart = new Chart(ctx, {
                type: "doughnut",
                data: data,
            });
        });
    </script>
</body>
