$(document).ready(() => {
    let projectDropdown = $("#project-dropdown").get(0);
    let projectNames = ["Project 1", "Project 2"];
    projectNames.forEach((projectName) => {
        let option = document.createElement("option");
        option.text = projectName;
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

    let ctx = $("#progress-chart").get(0).getContext("2d");

    let defaultProject = "project1";
    let data = projectData[defaultProject].data;
    let overdue = projectData[defaultProject].overdue;
    let imminent = projectData[defaultProject].imminent;
    let deadline = projectData[defaultProject].deadline;

    $("#date-picker").datepicker({
        minDate: 0,
        dateFormat: "dd/mm/yy",
    });

    function populateTable(tableId, data) {
        let table = $(tableId).get(0);
        // clear table body
        $(tableId).find("td").remove();

        data.forEach((rowData) => {
            let row = document.createElement("tr");

            rowData.forEach((cellData) => {
                let cell = document.createElement("td");
                cell.textContent = cellData;
                row.appendChild(cell);
            })

            table.appendChild(row);
        });
    }

    populateTable("#overdue-table", overdue);
    populateTable("#imminent-table", imminent);
    $("#date-picker").datepicker("setDate", deadline);

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

    $("#project-dropdown").change(() => {
        let selectedProject = $("#project-dropdown").val();
        selectedProject = selectedProject.split(" ").join("").toLowerCase();
        data = projectData[selectedProject].data;
        overdue = projectData[selectedProject].overdue;
        imminent = projectData[selectedProject].imminent;
        deadline = projectData[selectedProject].deadline;

        populateTable("#overdue-table", overdue);
        populateTable("#imminent-table", imminent);
        $("#date-picker").datepicker("setDate", deadline);

        progressChart.data.datasets[0].data = data;
        progressChart.update();
    });
});
