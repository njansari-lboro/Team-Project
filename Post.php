<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Modal</title>
    <link rel="stylesheet" href="post.css">
</head>
<body>

<!-- Modal/Overlay Container -->
<div class="modal-container">
    <div class="row flex-row">
        <button class="exit-btn">×</button>
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
            <span class="envelope-icon">✉️</span> Post
        </button>
    </div>
</div>

</body>
<script>
    var exitButton = document.querySelector('.exit-btn');
    exitButton.addEventListener('click', function() {
        window.location.href = 'Forums.php'; 
    });
</script>
</html>