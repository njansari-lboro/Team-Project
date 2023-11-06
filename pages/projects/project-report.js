$(() => {
    const urlParams = new URLSearchParams(window.location.search);
    let project = "";

    // data necessary for charts and progress bars
    let name, data, overdue, startDate, deadline, today;

    if (urlParams.has("project_name")) {
        const projectName = urlParams.get("project_name");
        $("#project-name-report").text(projectName);
        project = projectName.toLowerCase().replace(" ", "");
    }
    else {
        $("#project-name-report").text("Project Name");
        project = "project1";
    }

    let ctxUnfinished = $("#unfinished-chart").get(0).getContext("2d");
    let ctxCompleted = $("#completed-chart").get(0).getContext("2d");
    let ctxOverdue = $("#overdue-chart").get(0).getContext("2d");

    name = projectData[project].name;
    data = projectData[project].data;
    overdue = projectData[project].overdue;
    startDate = moment(projectData[project].startDate, "DD/MM/YYYY");
    deadline = moment(projectData[project].deadline, "DD/MM/YYYY");
    today = moment(moment(), "DD/MM/YY");

    totalTasks = data.reduce((sum, current) => sum + current, 0);

    populateTable("#overdue-employees", overdue);

    let unfinishedChart, completedChart, overdueChart;

    unfinishedChart = createProgressBar(ctxUnfinished, data[0], "Unfinished Tasks");
    completedChart = createProgressBar(ctxCompleted, data[1], "Completed Tasks");
    overdueChart = createProgressBar(ctxOverdue, data[2], "Overdue Tasks");

    $(window).on("resize", () => {
        unfinishedChart.resize();
        completedChart.resize();
        overdueChart.resize();
    });

    createTimeline(startDate, deadline, today);
});

function populateTable(tableId, data) {
    let table = $(tableId).get(0);
    // clear table body
    $(tableId).find("td").remove();

    data.forEach((rowData) => {
        let row = document.createElement("tr");
        row.setAttribute("class", "table-data");

        rowData.forEach((cellData) => {
            let cell = document.createElement("td");
            cell.textContent = cellData;
            row.appendChild(cell);
        })

        table.appendChild(row);
    });
}

function createTimeline(startDate, deadline, today) {
    let elapsedDays = today.diff(startDate, "days");
    let totalDays = deadline.diff(startDate, "days");
    console.log(elapsedDays);
    console.log(totalDays);

    $(".timeline-bar").progressbar({
        value: elapsedDays,
        max: totalDays
    });

    $(".timeline-bar").attr("date", today.format("DD/MM/YYYY"));

    let labelsContainer = $("<div class='timeline-labels'></div>");
    labelsContainer.css("display", "flex");
    labelsContainer.css("justify-content", "space-between");

    let startDateLabel = $("<p class='timeline-label' id='start-date-label'>" + startDate.format("DD/MM/YYYY") + "</p>");
    startDateLabel.css("display", "inline");

    let deadlineLabel = $("<p class='timeline-label' id='end-date-label'>" + deadline.format("DD/MM/YYYY") + "</p>");
    deadlineLabel.css("display", "inline");

    labelsContainer.append(startDateLabel);
    labelsContainer.append(deadlineLabel);

    $(".timeline").append(labelsContainer);
}

function createProgressBar(ctx, tasks, title) {
    const percentage = (tasks / totalTasks) * 100;

    const progressData = {
        labels: ["Percentage"],
        datasets: [{
            data: [percentage, 100 - percentage],
            backgroundColor: [getComputedStyle(document.body).getPropertyValue("--accent-color"),
            getComputedStyle(document.body).getPropertyValue("--quaternary-label-color")],
            borderColor: getComputedStyle(document.body).getPropertyValue("--window-background"),
        }],
    };

    const progressOptions = {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: title,
                color: getComputedStyle(document.body).getPropertyValue("--text-color"),
                fontFamily: getComputedStyle(document.body).getPropertyValue("--font-family"),
            }
        },
    };

    let chart = new Chart(ctx, {
        type: "doughnut",
        data: progressData,
        options: progressOptions
    });

    return chart;
}

// data from manager-dashboard.js - would be backend... probably
const projectData = {
    project1: {
        // "Unfinished", "Completed", "Overdue"
        name: "Project 1",
        data: [64, 18, 12],
        overdue: [
            ["John Cena", "UI Design", "4"],
            ["Jawn Seyna", "API Integration", "41"],
            ["Sion Cena", "Database Design and Optimisation", "1"]
        ],
        startDate: "02/10/2023",
        deadline: "06/12/2023",
    },
    project2: {
        name: "Project 2",
        data: [10, 96, 7],
        overdue: [
            ["Yohan Zena", "Cross-Platform Optimisation", "6"],
            ["Janos Szena", "Documentation", "91"],
            ["Jan Sina", "Security Assessment", "11"]
        ],
        startDate: "03/10/2023",
        deadline: "23/12/2023",
    },
};
