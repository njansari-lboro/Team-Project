
<!DOCTYPE html>
<html lang="en">
    
<head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="style.css">

    <!-- move these into their own seperate file -->
    <style>
        input {
            text-align: left;
        }

        div.container-fluid {
            max-width: 95%;
        }

        div.row {
            margin: 10px;
        }

        .chart-canvas {
            max-width: 295px;
            max-height: 295px;
            margin: 20px;
        }
        
        #project_dropdown, #date_picker {
            font-size: 200%;
            font-weight: bold;
        }

        #date_picker {
            color: rgba(255, 122, 0, 1);
        }

        /* table styling */
        th, td {
            border-left: 1px solid #D9D9D9;
            border-bottom: 1px solid #D9D9D9;
            padding: 10px;
        }

        tr:last-child > td {
            border-bottom: 0px;
        }

        th {
            font-weight: normal;
            color:#D9D9D9;
        }

        th:first-child, td:first-child {
            border-left: 0px;
        }
    </style>
</head>

<body>
    <h2 class="px-5 pt-3 pb-1">
        <script>
            let today = moment().format("dddd, Do MMMM");
            document.write(today);  
        </script>
    </h2>

    <div class="container-fluid pt-2 pb-2 border rounded" id="dashboard">
        <div class="row">
            <div class="col-lg-3 pb-1">
                <select id="project_dropdown" class="form-control border-0 display-1"></select>
            </div>
            <div class="col-lg-3 pb-1">
                <input class="form-control border-0" type="text" id="date_picker">
            </div>
        </div>
        <div class="row px-1 border rounded" id="graph_deadlines">
            <div class="col-md-6 d-flex align-items-center justify-content-center" id="chart">
                <canvas class="chart-canvas " id="progress_chart"></canvas>
            </div>
            <div class="col-md-6">
                <div class="pt-1"></div>
                <div class="row px-2 border rounded" id="overdue_tasks">
                    <h4 class="text-center pt-1">Overdue</h4>
                    <table class="table" id="overdue_table">
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
                <div class="row px-2 border rounded" id="imminent_tasks">
                    <h4 class="text-center pt-1">Imminent</h4>
                    <table class="table" id="imminent_table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Task</th>
                                <th>Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jean Sienna</td>
                                <td>Unit Testing</td>
                                <td>11/10/2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pt-1"></div>
            </div>
        </div>
        <div class="pt-1"></div>
        <div class="row px-2 border rounded" id="upcoming_tasks">
            <h3 class="text-center pt-1">Your Upcoming Tasks</h3>
            <table class="table">
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

    <script>
        $(document).ready(() => {            
            let projectDropdown = $("#project_dropdown").get(0);
            let projectNames = ["Project 1", "Project 2"];
            projectNames.forEach((projectName) =>{
                let option = document.createElement("option");
                option.text = projectName
                projectDropdown.add(option);
            });

            // Example data
            const projectData = {
                project1: {
                    data: [64, 18, 12],
                    overdue: [
                        ["John Cena", "UI Design", "4"],
                        ["Jawn Seyna", "API Integration", "41"],
                        ["Sion Cena", "Database Design and Optimisation", "1"]
                    ],
                    imminent: [
                        ["Jean Sienna", "Unit Testing", "19/10/2023"],
                        ["Zhong Xina", "Bug Fixing", "31/10/2023"],
                        ["Giannis Sina", "Get Manager a Coffee", "19/11/2023"]
                    ],
                    deadline: "06/11/2023",
                },
                project2: {
                    data: [10, 96, 7],
                    overdue: [
                        ["Yohan Zena", "Cross-Platform Optimisation", "6"],
                        ["Janos Szena", "Documentation", "91"],
                        ["Jan Sina", "Security Assessment", "11"]
                    ],
                    imminent: [
                        ["Juan Senna", "Performance Optimisation", "19/10/2023"],
                        ["Zhong Xina", "Code Refactoring", "23/10/2023"],
                        ["Jone Sainah", "Code Review", "01/11/2023"]
                    ],
                    deadline: "23/12/2023",
                },
            };
            
            let ctx = $("#progress_chart").get(0).getContext("2d");        
            
            let defaultProject = "project1";
            let data = projectData[defaultProject].data;
            let overdue = projectData[defaultProject].overdue;
            let imminent = projectData[defaultProject].imminent; 
            let deadline = projectData[defaultProject].deadline;
           
            $("#date_picker").datepicker({ 
                minDate: 0, 
                dateFormat: "dd/mm/yy",
            });

            function populateTable(tableId, data){
                let table = $(tableId).get(0);
                // clear table body
                $(tableId).find("td").remove();

                data.forEach((rowData) => {
                    let row = document.createElement("tr");
                    rowData.forEach((cellData) => {
                        let cell = document.createElement("td");
                        cell.textContent = cellData;
                        row.appendChild(cell);
                    });
                    table.appendChild(row);
                });
            }
    
            populateTable("#overdue_table", overdue); 
            populateTable("#imminent_table", imminent);
            $("#date_picker").datepicker("setDate", deadline);
            
            let progressChart = new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["In Progress", "Completed", "Overdue"],
                    datasets: [
                        {
                            data: data,
                            backgroundColor: ["#888", "#D9D9D9", "#FF7A00"],  
                        },
                    ],
                },
            });

            projectDropdown.on

            $("#project_dropdown").change(()=>{
                let selectedProject = $("#project_dropdown").val();
                selectedProject = selectedProject.split(" ").join("").toLowerCase();
                data = projectData[selectedProject].data;
                overdue = projectData[selectedProject].overdue;
                imminent = projectData[selectedProject].imminent;
                deadline = projectData[selectedProject].deadline;

                populateTable("#overdue_table", overdue); 
                populateTable("#imminent_table", imminent);
                $("#date_picker").datepicker("setDate", deadline);

                progressChart.data.datasets[0].data = data;
                progressChart.update();
            });
        });
    </script>
</body>
