<?php
    session_start();

    if (empty($_SESSION["user"])) {
        header("Location: /helpers/logout.php");
        die();
    }

    switch ($_SESSION["user"]["role"]) {
    case "Employee":
        $pages = array("dashboard", "tasks", "todo", "tutorials", "forums");
        break;
    case "Admin":
        $pages = array("dashboard", "todo", "tutorials", "forums");
        break;
    case "Manager":
        $pages = array("dashboard", "projects", "todo", "tutorials", "forums");
        break;
    default:
        echo "Invalid role: " . $_SESSION["user"]["role"];
        die();
        break;
    }
?>

<!DOCTYPE html>

<html lang="en">
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
                <load-svg id="title-logo" class="logo center" src="/assets/titleLogo.svg">
                    <style shadowRoot>
                        svg {
                            height: 4em;
                        }

                        .fill {
                            fill: var(--text-color);
                        }
                    </style>
                </load-svg>

                <load-svg id="simple-logo" class="logo center" src="/assets/logo.svg">
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
                        <?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>
                    </span>

                    <span id="role">
                        <?php echo $_SESSION["user"]["role"] ?>
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
                                <?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?>
                            </span>

                            <span id="role">
                                <?php echo $_SESSION["user"]["role"] ?>
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
                <a id="dashboard-sidebar-item" class="sidebar-item" href="?page=dashboard">
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

        <div id="main-content-wrapper">
            <div id="main-content">
                <?php
                    $page = isset($_GET["page"]) && !empty($_GET["page"]) && in_array($_GET["page"], $pages) ? $_GET["page"] : "dashboard";

                    $dir = $page;

                    if ($page == "dashboard") {
                        switch ($_SESSION["user"]["role"]) {
                        case "Employee":
                            $page = "employee-dashboard";
                            break;
                        case "Manager":
                            $page = "manager-dashboard";
                        default:
                            break;
                        }
                    }

                    include("$dir/$page.php")
                ?>
            </div>
        </div>

        <div id="edit-profile-modal">
            <script>
                const firstName = "<?php echo $_SESSION['user']['firstName'] ?>"
                const lastName = "<?php echo $_SESSION['user']['lastName'] ?>"
                const emailAddress = "<?php echo $_SESSION['user']['email'] ?>"
                const password = "<?php echo $_SESSION['user']['password'] ?>"
            </script>

            <div class="dimmed-overlay"></div>

            <div id="edit-profile-card" class="center">
                <div id="edit-profile-image">
                    <load-svg id="edit-profile-icon" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                height: 10em;
                            }

                            .fill {
                                fill: var(--text-color)
                            }
                        </style>
                    </load-svg>
                </div>

                <div id="edit-first-name" class="edit-profile-detail">
                    <span id="edit-first-name-label">First Name</span>
                    <input id="edit-first-name-input" type="text">
                </div>

                <div id="edit-last-name" class="edit-profile-detail">
                    <span id="edit-last-name-label">Last Name</span>
                    <input id="edit-last-name-input" type="text">
                </div>

                <div id="edit-email" class="edit-profile-detail">
                    <span id="edit-email-label">Email Address</span>
                    <input id="edit-email-input" type="email" readonly>
                </div>

                <div id="edit-password" class="edit-profile-detail">
                    <span id="edit-password-label">Password</span>

                    <div id="edit-password-input-container">
                        <input id="edit-password-input" type="password" readonly>

                        <button id="show-hide-password-button">
                            <load-svg id="show-password-icon" src="/assets/showIcon.svg">
                                <style shadowRoot>
                                    svg {
                                        /* width: var(--body); */
                                        height: var(--body);
                                    }

                                    .fill {
                                        fill: var(--secondary-label-color)
                                    }
                                </style>
                            </load-svg>

                            <load-svg id="hide-password-icon" src="/assets/hideIcon.svg">
                                <style shadowRoot>
                                    svg {
                                        /* width: var(--body); */
                                        height: var(--body);
                                    }

                                    .fill {
                                        fill: var(--secondary-label-color)
                                    }
                                </style>
                            </load-svg>
                        </button>
                    </div>
                </div>

                <div id="dismiss-buttons">
                    <button id="cancel-button" class="dismiss-edit-profile-button">Cancel</button>
                    <button id="save-button" class="dismiss-edit-profile-button" disabled>Save</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
