<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/global.css">
        <link rel="stylesheet" href="/pages/dashboard/manager-dashboard.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
        <script src="/pages/dashboard/manager-dashboard.js"></script>
    </head>

    <body>
        <h2 class="px-5 pt-3 pb-1" id="today">
            <script>
                let today = moment().format("dddd, Do MMMM")
                document.write(today)
            </script>
        </h2>

        <div class="container-fluid pt-2 pb-2 border rounded" id="dashboard">
            <div class="row">
                <div class="col-lg-3 pb-1" id="project-col">
                    <select id="project-dropdown" class="form-control border-0 display-1"></select>
                </div>

                <div class="col-lg-1" id="spacing-col">-</div>

                <div class="col-lg-3 pb-1" id="date-col">
                    <input class="form-control border-0" type="text" id="date-picker">
                </div>
            </div>

            <div class="row px-1 border rounded" id="graph-deadlines">
                <div class="col-md-6 d-flex align-items-center justify-content-center" id="chart">
                    <canvas class="chart-canvas " id="progress-chart"></canvas>
                </div>

                <div class="col-sm-6">
                    <div class="pt-1"></div>

                    <div class="row px-2 border rounded" id="overdue-tasks">
                        <h4 class="text-center pt-1">Overdue</h4>
                        <table class="table" id="overdue-table">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Task</th>
                                    <th>Days Overdue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Cena</td>
                                    <td>UI Design</td>
                                    <td>4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-1"></div>

                    <div class="row px-2 border rounded" id="imminent-tasks">
                        <h4 class="text-center pt-1">Imminent</h4>
                        <table class="table" id="imminent-table">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Task</th>
                                    <th>Deadline</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-1"></div>
                </div>
            </div>

            <div class="pt-1"></div>

            <div class="row px-2 border rounded" id="upcoming-tasks">
                <h3 class="text-center pt-1">Your Upcoming Tasks</h3>

                <table class="table" id="upcoming-table">
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
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
