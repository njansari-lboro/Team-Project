<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="projects.css">
        <link rel="stylesheet" href="/global.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    </head>

    <body>
        <!-- heading row -->
        <div>
            <h2 id="projects-header">Projects - </h2>
            <!-- currently will do nothing   -->
            <select type="text" id="projects-filter"></select>
            <!-- brings user to project creation page - ask Aaron what this is called -->
            <button id="new-project-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 112v288M400 256H112" />
                </svg>
            </button>
        </div>

        <div><hr></div>
        
        <!-- projects to be generated from backend data - filters affect order of retrieval? -->
        <div id="dropdown-div">
            <span class="dropdown">Project 1</span>
            <button class="dropdown" id="project-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
        
        <!-- toggleable dropdown -->
        <div class="dropdown-content" id="project-1-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Assigned Task</th>
                        <th>Progress</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- example data -->
                    <tr>
                        <td>John Cena</td>
                        <td>UI Design</td>
                        <!-- representing %progress -->
                        <td class="progress-bar">98</td>
                    </tr>
                    <tr>
                        <td>Jawn Seyna</td>
                        <td>API Integration</td>
                        <td class="progress-bar">34</td>
                    </tr>
                    <tr>
                        <td>Sion Cena</td>
                        <td>Database Design and Optimisation</td>
                        <td class="progress-bar">20</td>
                    </tr>
                    <tr>
                        <td>Jean Sienna</td>
                        <td>Unit Testing</td>
                        <td class="progress-bar">90</td>
                    </tr>
                    <tr>
                        <td>Zhong Xina</td>
                        <td>Bug Fixing</td>
                        <td class="progress-bar">0</td>
                    </tr>
                    <tr>
                        <td>Giannis Sina</td>
                        <td>Get Manager a Coffee</td>
                        <td class="progress-bar">100</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- to break inline display -->
        <div><hr></div>

        <div id="dropdown-div">
            <span class="dropdown">Project 2</span>
            <button class="dropdown" id="project-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>

        <div class="dropdown-content" id="project-2-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Assigned Task</th>
                        <!-- as progress bar (Chart.js) -->
                        <th>Progress</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- example data -->
                    <tr>
                        <td>Yohan Zena</td>
                        <td>Cross-Platform Optimisation</td>
                        <!-- representing %progress -->
                        <td class="progress-bar">5</td>
                    </tr>
                    <tr>
                        <td>Janos Szena</td>
                        <td>Documentation</td>
                        <td class="progress-bar">38</td>
                    </tr>
                    <tr>
                        <td>Juan Senna</td>
                        <td>Performance Optimisation</td>
                        <td class="progress-bar">22</td>
                    </tr>
                    <tr>
                        <td>Zhong Xina</td>
                        <td>Code Refactoring</td>
                        <td class="progress-bar">99</td>
                    </tr>
                    <tr>
                        <td>Jone Sainah</td>
                        <td>Code Review</td>
                        <td class="progress-bar">56</td>
                    </tr>
                    <tr>
                        <td>Jan Sina</td>
                        <td>Security Assessment</td>
                        <td class="progress-bar">12</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div><hr></div>

        <script src="projects.js"></script>
    </body>
</html>
