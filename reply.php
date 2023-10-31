<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Modal</title>
    <link rel="stylesheet" href="reply.css">
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
    var exitButton = document.querySelector('.exit-btn');
    exitButton.addEventListener('click', function() {
        window.location.href = 'Forums.html'; 
    });
</script>
</html>
