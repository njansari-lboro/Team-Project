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
        echo "Invalid role: {$_SESSION['user']['role']}";
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

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/loadSvgCustomTag.js"></script>

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
                        <?php echo "{$_SESSION['user']['firstName']} {$_SESSION['user']['lastName']}" ?>
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
                                <?php echo "{$_SESSION['user']['firstName']} {$_SESSION['user']['lastName']}" ?>
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
                <?php function dashboard_sidebar_item() { ?>
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
                <?php } ?>

                <?php function tasks_sidebar_item() { ?>
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
                <?php } ?>

                <?php function projects_sidebar_item() { ?>
                <a id="projects-sidebar-item" class="sidebar-item" href="?page=projects">
                    <load-svg class="sidebar-item-icon" src="/assets/projectsSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                height: 2.4em;
                                margin: 0 0.1em;
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Projects</span>
                </a>
                <?php } ?>

                <?php function todo_sidebar_item() { ?>
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
                <?php } ?>

                <?php function tutorials_sidebar_item() { ?>
                <a id="tutorials-sidebar-item" class="sidebar-item" href="?page=tutorials">
                    <load-svg class="sidebar-item-icon" src="/assets/tutorialsSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.4em;
                                margin-top: 0.1em;
                                padding-bottom: 0.1em
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Tutorials</span>
                </a>
                <?php } ?>

                <?php function forums_sidebar_item() { ?>
                <a id="forums-sidebar-item" class="sidebar-item" href="?page=forums">
                    <load-svg class="sidebar-item-icon" src="/assets/forumsSidebarItemIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 2.4em;
                                padding-bottom: 0.1em
                            }

                            .fill {
                                fill: var(--fill-color);
                            }
                        </style>
                    </load-svg>
                    <span class="sidebar-item-text">Forums</span>
                </a>
                <?php } ?>

                <?php
                    $sidebarItems = [
                        "dashboard" => "dashboard_sidebar_item",
                        "projects" => "projects_sidebar_item",
                        "tasks" => "tasks_sidebar_item",
                        "todo" => "todo_sidebar_item",
                        "tutorials" => "tutorials_sidebar_item",
                        "forums" => "forums_sidebar_item",
                    ];

                    foreach ($pages as $page) {
                        if (array_key_exists($page, $sidebarItems)) {
                            $sidebarItem = $sidebarItems[$page];
                            $sidebarItem();
                        }
                    }
                ?>
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

        <div id="sidebar-dim" class="dimmed-overlay"></div>

        <div id="main-content-wrapper">
            <div id="main-content">
                <?php
                    if (isset($_GET["page"]) && !empty($_GET["page"]) && in_array($_GET["page"], $pages)) {
                        $page = $_GET["page"];
                    } else {
                        header("Location: ?page=dashboard");
                        die();
                    }

                    $dir = $page;

                    if ($page == "dashboard") {
                        switch ($_SESSION["user"]["role"]) {
                        case "Employee":
                            $page = "employee-dashboard";
                            break;
                        case "Manager":
                            $page = "manager-dashboard";
                            break;
                        }
                    }

                    if ($page === "todo") {
                        $page = "todo-php";
                    }

                    if ($page === "tasks") {
                        $page = "assignments";
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

        <div id="invite-member-modal">
            <div class="dimmed-overlay"></div>

            <div id="invite-member-card" class="center">
                <button id="close-invite-member-modal-button">
                    <load-svg id="close-invite-member-modal-icon" src="/assets/closeIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 1.5em;
                                height: 1.5em;
                            }

                            .fill {
                                fill: var(--secondary-label-color)
                            }
                        </style>
                    </load-svg>
                </button>

                <h1>Invite Member</h1>

                <div>
                    <input id="invite-member-email" type="email" placeholder="Member email address">

                    <button id="invite-member-button" disabled>Invite</button>
                </div>

                <div>
                    <input id="invite-link" type="text" placeholder="Invite link" readonly>

                    <button id="copy-invite-link-button">
                        <load-svg id="copy-invite-link-icon" src="/assets/copyIcon.svg">
                            <style shadowRoot>
                                svg {
                                    height: var(--body);
                                    padding-top: 0.2em;
                                }

                                .fill {
                                    fill: var(--icon-color)
                                }
                            </style>
                        </load-svg>
                    </button>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
