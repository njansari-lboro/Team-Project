<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/pages/forums/forums.css">

        <title>Forums</title>
    </head>

    <body>
        <header></header>

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

                <button id="post-topic">+</button>

                <!-- Forum Topic Example -->
                <article class="forum-topic">
                    <div class="topic-avatar">
                        <img src="/assets/user.jpg" alt="User Avatar">
                    </div>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                        <button class=reply id="reply">Reply</button>
                    </div>
                </article>

                <article class="forum-topic">
                    <div class="topic-avatar">
                        <img src="/assets/user.jpg" alt="User Avatar">
                    </div>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                        <button class=reply id="reply">Reply</button>
                    </div>
                </article>

                <article class="forum-topic">
                    <div class="topic-avatar">
                        <img src="/assets/user.jpg" alt="User Avatar">
                    </div>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                        <button class=reply id="reply">Reply</button>
                    </div>
                </article>

                <article class="forum-topic">
                    <div class="topic-avatar">
                        <img src="/assets/user.jpg" alt="User Avatar">
                    </div>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                        <button class=reply id="reply">Reply</button>
                    </div>
                </article>

                <article class="forum-topic">
                    <div class="topic-avatar">
                        <img src="/assets/user.jpg" alt="User Avatar">
                    </div>

                    <div class="topic-content">
                        <h2>John Cena</h2>
                        <h3><span class="topic-label">Topic</span> | <span class="question-title">Question Title</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit... <a href="#" id="myLink" class="read-link">read more and view replies</a></p>
                        <button class=reply id="reply">Reply</button>
                    </div>
                </article>
            </section>
        </main>

        <script>
            document.getElementById("post-topic").addEventListener("click", () => {
                window.location.href = "/pages/forums/post.php"
            })

            let replyLinks = document.querySelectorAll(".reply")
            replyLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    event.preventDefault()
                    window.location.href = "/pages/forums/viewpost.php"
                })
            })

            let readMoreLinks = document.querySelectorAll(".read-link")
            readMoreLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    event.preventDefault()
                    window.location.href = "/pages/forums/viewpost.php"
                })
            })
        </script>
    </body>
</html>
