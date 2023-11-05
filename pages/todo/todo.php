<?php
    if (!isset($_SERVER["HTTP_REFERER"]) || empty($_SERVER["HTTP_REFERER"])) {
        header("Location: /pages/?page=todo");
        die();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="to-do.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

        <title>To-Do List</title>
    </head>

    <body>
        <div class="to-do-container">
            <div class="items-container-wrapper">
                    <div class="items-container">
                        <div class="headers">
                            <div class="header header-task-name">
                                <p>Task Name</p>
                            </div>

                            <div class="header header-due-date">
                                <p>Due Date</p>
                            </div>

                            <div class="header header-priority">
                                <p>Priority</p>
                            </div>
                        </div>
                        <form class="item">
                            <div class="inputs">
                                <div class="task-name">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon tick" viewBox="0 0 512 512">
                                        <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M352 176L217.6 336 160 272" />
                                    </svg>

                                    <input type="text" placeholder="Task name" class="task-input input">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon ellipsis" viewBox="0 0 512 512">
                                        <circle cx="256" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                        <circle cx="416" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                        <circle cx="96" cy="256" r="32" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                    </svg>
                                </div>

                                <div class="due-date">
                                    <input type="text" placeholder="Due date" class="due-date-input input datepicker">
                                </div>

                                <div class="priority">
                                    <select name="priority" class="priority-select priority-input input select-input">
                                        <option value="none">None</option>
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="comments hidden">
                                <input type="text" placeholder="Due date" class="due-date-input input datepicker small-screen-date">
                                <textarea name="comments-input" class="comments-input"></textarea>
                            </div>
                        </form>

                        <div class="new-item">
                            <div class="add-div-container">
                                <div class="add-div">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon add" viewBox="0 0 512 512">
                                        <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 176v160M336 256H176" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="buttons-container">
                <button class="clear-list button">Clear list</button>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="to-do.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </body>
</html>
