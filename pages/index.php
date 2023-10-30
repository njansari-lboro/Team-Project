<?php session_start() ?>

<!DOCTYPE html>

<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/global.css">
        <link rel="stylesheet" href="style.css">

        <title>Make-It-All</title>
    </head>

    <body>
        <div class="nav-bar">
            <load-svg id="sidebar-toggle" src="/assets/sidebarToggleIcon.svg">
                <style shadowRoot>
                    svg {
                        height: 2em;
                    }

                    .fill {
                        fill: var(--text-color);
                    }
                </style>
            </load-svg>

            <div>
                <load-svg id="title-logo" class="logo" src="/assets/titleLogo.svg">
                    <style shadowRoot>
                        svg {
                            height: 4em;
                        }

                        .fill {
                            fill: var(--text-color);
                        }
                    </style>
                </load-svg>

                <load-svg id="simple-logo" class="logo" src="/assets/logo.svg">
                    <style shadowRoot>
                        svg {
                            height: 4em;
                        }

                        .fill {
                            fill: var(--text-color);
                        }
                    </style>
                </load-svg>
            </div>

            <div id="profile-details">
                <div id="profile-name">
                    <span id="name">
                        <?php echo $_SESSION["name"] ?>
                    </span>
                    <span id="role">
                        <?php echo $_SESSION["role"] ?>
                    </span>
                </div>

                <div id="profile-menu">
                    <button id="profile-menu-button">
                        <load-svg id="profile-icon" src="/assets/profileIcon.svg">
                            <style shadowRoot>
                                svg {
                                    height: 3em;
                                }

                                .fill {
                                    fill: var(--text-color)
                                }
                            </style>
                        </load-svg>

                        <load-svg id="profile-menu-arrow" src="/assets/menuArrow.svg">
                            <style shadowRoot>
                                svg {
                                    height: 0.8em;
                                }

                                .fill {
                                    fill: var(--text-color)
                                }
                            </style>
                        </load-svg>
                    </button>

                    <div id="profile-menu-items" class="menu-items">
                        <div id="profile-menu-name">
                            <span id="name">
                                <?php echo $_SESSION["name"] ?>
                            </span>
                            <span id="role">
                                <?php echo $_SESSION["role"] ?>
                            </span>
                        </div>

                        <button id="edit-profile-button" class="menu-item">Edit Profile</button>
                        <div class="divider horizontal" style="width: calc(100% - 16px); margin: 8px"></div>
                        <a href="/helpers/logout.php" class="menu-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="sidebar">
            <div id="sidebar-links">
                <a id="dashboard-sidebar-item" class="sidebar-item" href="?page=empdashboard">
                    <load-svg class="sidebar-item-icon" src="/assets/dashboardSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.4em;
                                margin-bottom: 0.1em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Dashboard</span>
                </a>

                <a id="tasks-sidebar-item" class="sidebar-item" href="?page=tasks">
                    <load-svg class="sidebar-item-icon" src="/assets/tasksSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                height: 2.6em;
                                margin: 0 0.3em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Tasks</span>
                </a>

                <a id="todo-sidebar-item" class="sidebar-item" href="?page=todo">
                    <load-svg class="sidebar-item-icon" src="/assets/todoSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.2em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">To-do List</span>
                </a>

                <a id="tutorials-sidebar-item" class="sidebar-item" href="?page=tutorials">
                    <load-svg class="sidebar-item-icon" src="/assets/tutorialsSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.4em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Tutorials</span>
                </a>

                <a id="forums-sidebar-item" class="sidebar-item" href="?page=forums">
                    <load-svg class="sidebar-item-icon" src="/assets/forumsSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.4em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Forums</span>
                </a>
            </div>

            <div style="flex-grow: 1"></div>

            <div id="sidebar-bottom-content">
                <div class="divider horizontal"></div>

                <button id="invite-button">
                    <load-svg src="/assets/inviteIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 3em;
                            }

                            .fill {
                                fill: var(--accent-color);
                            }
                        </style>
                    </load-svg>
                    <span>Invite</span>
                </button>
            </div>
        </div>

        <div id="dimmed-overlay"></div>

        <div id="main-content">
            <?php 
                $pages = array("empdashboard", "tasks", "todo", "tutorials", "forums");

                $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 'empdashboard';

                if (!empty($page)) {
                    if (in_array($page, $pages)) {
                    }
                }

                include("$page.php")
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
