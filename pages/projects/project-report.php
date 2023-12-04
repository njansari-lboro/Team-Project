<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="projects/projects.css">
    <link rel="stylesheet" href="dashboard/manager-dashboard.css">
    <link rel="stylesheet" href="projects/project-report.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>

<body>
    <div class="header">
        <button class="exit-btn">
            <load-svg src="../assets/closeIcon.svg">
                <style shadowRoot>
                    svg {
                        width: var(--title-2);
                        height: var(--title-2);
                    }

                    .fill {
                        fill: var(--secondary-label-color)
                    }
                </style>
            </load-svg>
        </button>

        <!-- project name from URL (JS) -->
        <h2 id="project-name-report"></h2>
    </div>

    <!-- rounded borders - like manager dashboard -->
    <div class="container" id="report-container">
        <!-- charts appear inline -->
        <div class="container" id="charts-container">
            <div class="container-inline chart" id="tasks-completed">
                <canvas class="chart-canvas" id="completed-chart"></canvas>
            </div>

            <div class="container-inline chart" id="tasks-unfinished">
                <canvas class="chart-canvas" id="unfinished-chart"></canvas>
            </div>

            <div class="container-inline chart" id="tasks-overdue">
                <canvas class="chart-canvas" id="overdue-chart"></canvas>
            </div>
        </div>

        <!-- table appears below charts -->
        <div class="container table" id="table-container">
            <h3 class="text-center">Employees with Overdue Tasks</h3>

            <table id="overdue-employees">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Task</th>
                        <th>Days Overdue</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- timeline appears below table -->
        <div class="timeline" id="project-timeline">
            <h3 class="text-center">Project Timeline</h3>
            <!-- start date -> date submitted -> due date, full if past due date -->
            <div class="timeline-bar"></div>
        </div>
    </div>

    <script src="projects/project-report.js"></script>
</body>

</html>