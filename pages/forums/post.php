<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/forums/post.css">

        <title>Question Modal</title>
    </head>

    <body>
        <!-- Modal/Overlay Container -->
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

                <select class="dropdown" id="topicDropdown">
                    <option value="default" disabled selected>Topic</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Software Issues">Software Issues</option>
                    <option value="Printing">Printing</option>
                    <option value="newTopic">+ New Topic</option>
                </select>

                <input type="text" class="input" placeholder="Enter question title">
            </div>

            <div class="row">
                <textarea class="textarea" placeholder="Enter question body"></textarea>
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
        let exitButton = document.querySelector(".exit-btn")
        exitButton.addEventListener("click", () => {
            window.location.href = "index.php?page=forums"
        })

        let postButton = document.querySelector(".post-btn")
        postButton.addEventListener("click", () => {
            window.location.href = "index.php?page=forums"
        })
    </script>
</html>
