<?php
    if (!isset($_SERVER["HTTP_REFERER"]) || empty($_SERVER["HTTP_REFERER"])) {
        header("Location: /pages/?page=forums");
        die();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/forums/reply.css">

        <title>Question Modal</title>
    </head>

    <body>
        <div class="modal-container">
            <div class="row flex-row">
                <button class="exit-btn">
                    <load-svg src="/assets/closeIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: var(--title-1);
                                height: var(--title-1);
                            }

                            .fill {
                                fill: var(--secondary-label-color)
                            }
                        </style>
                    </load-svg>
                </button>
            </div>

            <div class="row">
                <textarea class="textarea" placeholder="Enter your comment"></textarea>
            </div>

            <div class="row">
                <button class="post-btn">
                    <span class="envelope-icon">
                        <load-svg src="/assets/postIcon.svg">
                            <style shadowRoot>
                                svg {
                                    height: 1.1em;
                                    margin-top: 3px
                                }

                                .fill {
                                    fill: white
                                }
                            </style>
                        </load-svg>
                    </span> Post
                </button>
            </div>
        </div>
    </body>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let replyButton = document.querySelector(".post-btn")
            replyButton.addEventListener("click", () => {
                let replyTextarea = document.querySelector(".textarea")
                let replyContent = replyTextarea.value

                let replies = JSON.parse(localStorage.getItem("replies")) || []
                replies.push(replyContent)
                localStorage.setItem("replies", JSON.stringify(replies))

                window.location.href = "?page=forums&task=view"
            })
        })

        let exitButton = document.querySelector(".exit-btn")
        exitButton.addEventListener("click", () => {
            window.location.href = "?page=forums&task=view"
        })
    </script>
</html>
