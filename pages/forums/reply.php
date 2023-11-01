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
                <button class="exit-btn">×</button>
            </div>

            <div class="row">
                <textarea class="textarea" placeholder="Enter your comment"></textarea>
            </div>

            <div class="row">
                <button class="post-btn">
                    <span class="envelope-icon">✉️</span> Post
                </button>
            </div>
        </div>
    </body>

    <script>
        let exitButton = document.querySelector(".exit-btn")
        exitButton.addEventListener("click", () => {
            window.location.href = "forums.php"
        })
    </script>
</html>
