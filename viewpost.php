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
                <button class="exit-button">x</button>

                <h1>
                    <span class="topic-color">Topic</span> | <span class="question-title-color">Question Title</span>
                </h1>

                <div class="author-info">
                    <img src="/assets/user.jpg" alt="Author Avatar" class="author-avatar">

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
                    <img src="/assets/user.jpg" alt="Replier Avatar" class="user-avatar">
                    <span class="user-name">Jean Sienna</span>
                </div>

                <div class="reply-content">
                    <p>ipsum dolor sit amet, consectetur adipiscing elit, ... leo vel orci porta. </p>
                </div>
            </div>

            <button class="button">Reply</button>
        </div>
    </body>
</main>

<script>
    let exitButton = document.querySelector(".exit-button")
    exitButton.addEventListener("click", () => {
        window.location.href = "index.php?page=forums"
    })

    let replyButton = document.querySelector(".button")
    replyButton.addEventListener("click", () => {
        window.location.href = "index.php?page=forums&task=reply"
    })
</script>

</html>