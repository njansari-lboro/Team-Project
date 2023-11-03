<!DOCTYPE html>

<html lang="en-GB">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/pages/dashboard/manager-dashboard.css">
        <link rel="stylesheet" href="/global.css">
    </head>

    <body>
        <h2 id="today">
            <script>
                let today = moment().format("dddd, Do MMMM");
                document.write(today);  
            </script>
        </h2>
        <div class="container" id="all">
            <select id="project-dropdown" class="inline-large-title"></select>
            <input class="inline-large-title" type="text" id="date-picker">
            <div class="container" id="charts-tables">
                <div class="container-no-border" id="chart">
                    <canvas class="chart-canvas" id="progress-chart"></canvas>
                </div>
                <div class="container" id="tables">
                    <div class="container-inline" id="overdue">
                        <h4 class="text-center">Overdue</h4>
                        <table class="table" id="overdue-table">
                            <thead>
                                <tr class="table-heading">
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
                    <div class="container-inline" id="imminent">
                        <h4 class="text-center">Imminent</h4>
                        <table class="table" id="imminent-table">
                            <thead>
                                <tr class="table-heading">
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
                </div>
            </div>
            <div class="container" id="upcoming-table-div">
                <table class="table" id="upcoming-table">
                    <thead>
                        <tr class="table-heading">
                            <th>Task</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-data">
                            <td>Complete Project Report</td>
                            <td>06/11/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="/pages/dashboard/manager-dashboard.js"></script>
    </body>
</html>
