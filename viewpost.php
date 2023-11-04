<?php
    if (!(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))) {
        header("Location: /pages/?page=forums");
        die();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/forums/viewpost.css">
    </head>

    <main>
        <body>
            <div class="content-box">
                <div class="header">
                    <button class="exit-button">
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

                    <h1>
                        <span class="topic-color">Topic</span> | <span class="question-title-color">Question Title</span>
                    </h1>

                    <div class="author-info">
                        <load-svg class="author-avatar" src="/assets/profileIcon.svg">
                            <style shadowRoot>
                                svg {
                                    width: 40px;
                                    height: 40px;
                                }

                                .fill {
                                    fill: var(--label-color)
                                }
                            </style>
                        </load-svg>

                        <div class="author-text">
                            <span class="author-name">John Cena</span>
                            <span class="author">Author</span>
                        </div>
                    </div>
                </div>

                <div class="post-content">
                    <p>Lorem ipsum dolor sat amet,consectetur adipiscing elit,sed do eiusmod tempor incididunt ut laboure et dolore magna aliqua。Ut enim ad minim veniam, quis nostrud exeritation ullamco labouris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>

                <div class="reply">
                    <div class="reply-user">
                        <load-svg class="user-avatar" src="/assets/profileIcon.svg">
                            <style shadowRoot>
                                svg {
                                    width: 40px;
                                    height: 40px;
                                }

                                .fill {
                                    fill: var(--label-color)
                                }
                            </style>
                        </load-svg>
                        
                        <span class="user-name">Jean Sienna</span>
                    </div>

                    <div class="reply-content">
                        <p>ipsum dolor sit amet, consectetur adipiscing elit, ... leo vel orci porta. </p>
                    </div>
                </div>
            </div>
                <button class="button">
                    Reply

                    <load-svg class="reply-icon" src="/assets/replyIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 16px;
                                height: 16px;
                            }

                            .fill {
                                fill: var(--label-color)
                            }
                        </style>
                    </load-svg>
                </button>
            
        </body>
    </main>

    <script>
    
    document.addEventListener('DOMContentLoaded', () => {
        let replies = JSON.parse(localStorage.getItem('replies')) || [];
        let repliesContainer = document.querySelector('.content-box');

        replies.forEach(replyContent => {
            let replyDiv = document.createElement('div');
            replyDiv.className = 'reply';
            replyDiv.innerHTML = `
                <div class="reply-user">
                    <load-svg class="user-avatar" src="/assets/profileIcon.svg">
                        <style shadowRoot>
                            svg {
                                width: 40px;
                                height: 40px;
                            }
                            .fill {
                                fill: var(--label-color);
                            }
                        </style>
                    </load-svg>
                    <span class="user-name">Default User</span>
                </div>
                <div class="reply-content">
                    <p>${replyContent}</p>
                </div>
            `;
            repliesContainer.appendChild(replyDiv);
        });
    });

    let exitButton = document.querySelector(".exit-button");
    exitButton.addEventListener("click", () => {
        window.location.href = "index.php?page=forums";
    });

    let replyButton = document.querySelector(".button");
    replyButton.addEventListener("click", () => {
        window.location.href = "index.php?page=forums&task=reply";
    });

    </script>
</html>

