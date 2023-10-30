<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make-It-All Forums</title>
    <link rel="stylesheet" href="forum.css">
</head>
<body>
    <header>
    </header>
    <main>
        <section id="forum-topics">
            <h1>
                <span class="dropdown-wrapper">Topics - 
                    <select id="topic-dropdown">
                        <option value="all">All</option>
                        <option value="topic1">Topic 1</option>
                        <option value="topic2">Topic 2</option>
                        <option value="topic3">Topic 3</option>
                    </select>
                </span>
            </h1>
            </h1>
            <button id="post-topic">+</button>
            <!-- Forum Topic Example -->
            <article class="forum-topic">
                <div class="topic-avatar">
                    <img src="User.jpg" alt="User Avatar">
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
                    <img src="User.jpg" alt="User Avatar">
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
                    <img src="User.jpg" alt="User Avatar">
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
                    <img src="User.jpg" alt="User Avatar">
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
                    <img src="User.jpg" alt="User Avatar">
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
        document.getElementById('post-topic').addEventListener('click', function() {
            window.location.href = 'post.php'; 
        });

        var replyLinks = document.querySelectorAll('.reply');
        replyLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = 'viewpost.php';
            });
        });

        var readMoreLinks = document.querySelectorAll('.read-link');
        readMoreLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = 'viewpost.php'; 
            });
        });
    </script>

</body>
</html>
