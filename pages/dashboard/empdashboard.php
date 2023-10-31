<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="empdashboard.css">
    </head>
    <body>
        <p id="today-date">use js to get date</p>

        <div class="general">
            <div class="taskpreview">
                <p> Upcoming tasks</p>
                <table>
                    <tr>
                        <td id="taskname">Design UI</td>
                        <td>Project 1</td>
                        <td>26/10/23</td>
                    </tr>
                    <tr>
                        <td id="taskname">Work on SQL</td>
                        <td>Project 2</td>
                        <td>24/10/23</td>
                    </tr>
                    <tr>
                        <td id="taskname">Work with Jean for front end </td>
                        <td>Project 3</td>
                        <td>30/10/23</td>
                    </tr>
                    <tr>
                        <td id="taskname">Prepare presentation</td>
                        <td>Project 1</td>
                        <td>22/11/23</td>
                    </tr>
                    <tr>
                        <td id="taskname">Show to manager final product</td>
                        <td>Project 3</td>
                        <td>6/12/23</td>
                    </tr>
                </table>

            </div>

            <div class="projectpreview">
                <p>Your Projects</p>
                <table>
                    <tr>
                        <td>Project 1</td>
                        <td> 6/11/23</td>
                    </tr>
                    <tr>
                        <td>Project 2</td>
                        <td>21/11/23</td>
                    </tr>
                    <tr>
                        <td>Project 3</td>
                        <td>1/12/23</td>
                    </tr>

                </table>
            </div>

            <div class="forumspreview">
                <p> Recent Forums</p>
                <table>
                    <tr>
                        <td>How to make coffee for boss</td>
                    </tr>
                    <tr>
                        <td>When to contact Alice</td>
                    </tr>
                    <tr>
                        <td>Meeting Preperation</td>
                    </tr>
                </table>
            </div>
        </div>

        <script>
            const date = new Date()
            month = date.getMonth()
            number = date.getDate()
            day = date.getDay()

            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

            for (let x = 0; x <= 11; x++) {
                if (month == x) {
                    chosenMonth = months[x]
                }
            }

            chosenDay = ""

            for (let y = 0; y <= 6; y++) {
                if (day == y) {
                    chosenDay = days[y]
                }
            }

            suffix = ""

            switch (number) {
                case 1: case 21: case 31:
                    suffix = "st"
                case 2: case 22:
                    suffix = "nd"
                case 3: case 23:
                    suffix = "rd"
                default:
                    suffix = "th"
            }

            document.getElementById("today-date").innerHTML = `${chosenDay} ${number}${suffix} ${chosenMonth}`
        </script>
    </body>
</html>
