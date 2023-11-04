<?php
    if (!(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))) {
        header("Location: /pages/?page=forums");
        die();
    }
?>

<?php
    $task = isset($_GET["task"]) ? $_GET["task"] : "default";
    
    switch ($task) {
    case "new":
        new_post();
        break;
    case "view":
        view_post();
        break;
    case "reply":
        reply();
        break;
    default:
        display_default();
    }

    function display_default() {
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/forums/forums.css">

        <title>Forums</title>
    </head>

    <body>
        <main>
            <section id="forum-topics">
                <h1>
                    <span class="dropdown-wrapper">
                        Topics -
                        <select id="topic-dropdown">
                            <option value="all">All</option>
                            <option value="topic1">Topic 1</option>
                            <option value="topic2">Topic 2</option>
                            <option value="topic3">Topic 3</option>
                        </select>
                    </span>
                </h1>

                <button id="post-topic">
                    <load-svg src="/assets/addIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: var(--title-1);
                                height: var(--title-1);
                            }

                            .fill {
                                fill: var(--icon-color);
                            }
                        </style>
                    </load-svg>
                </button>

                <!-- Forum Topic Example -->
                <article class="forum-topic">
                    <load-svg class="topic-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                    </div>
                </article>

                <article class="forum-topic">
                    <load-svg class="topic-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                    </div>
                </article>

                <article class="forum-topic">
                    <load-svg class="topic-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                    </div>
                </article>

                <article class="forum-topic">
                    <load-svg class="topic-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                    </div>
                </article>

                <article class="forum-topic">
                    <load-svg class="topic-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                    </div>
                </article>
            </section>
        </main>

        <script>
            document.getElementById("post-topic").addEventListener("click", () => {
                window.location.href = "index.php?page=forums&task=new"
            })

            let replyLinks = document.querySelectorAll(".reply")
            replyLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    event.preventDefault()
                    window.location.href = "index.php?page=forums&task=view"
                })
            })

            let readMoreLinks = document.querySelectorAll(".read-link")
            readMoreLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    event.preventDefault()
                    window.location.href = "index.php?page=forums&task=view"
                })
            })
        </script>
    </body>
</html>

<?php
    }
    
    function view_post() {
        include("forums/viewpost.php");
    }

    function new_post() {
        include("forums/post.php");
    }

    function reply() {
        include("forums/reply.php");
    }
?>
