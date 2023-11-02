<?php

$tutorials = [
    ["src" => "/img/bg.jpg", "id" => 1, "text" => "How to build relationships"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=2", "id" => 2, "text" => "How to set up 2FA"],
    ["src" => "/img/bgbw.jpg", "id" => 3, "text" => "Text for Image 3"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=3", "id" => 4, "text" => "Text for Image 4"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=4", "id" => 5, "text" => "Text for Image 5"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=5", "id" => 6, "text" => "Text for Image 6"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=6", "id" => 7, "text" => "Text for Image 7"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=7", "id" => 8, "text" => "Text for Image 8"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=8", "id" => 9, "text" => "Text for Image 9"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=9", "id" => 10, "text" => "Text for Image 10"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=10", "id" => 11, "text" => "Text for Image 11"],
    ["src" => "https://via.placeholder.com/210/ff7a00?text=11", "id" => 12, "text" => "Text for Image 12"],
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/pages/tutorials/tutorials.css">
    <script src="/pages/tutorials/tutorials.js" defer></script>
</head>

<body>
    <div class="row">
        <div class="header" style="display:none;">
            <h3 class="title">Title</h3>
            <div class="progress-bar"></div>
        </div>
        <div class="container1">
            <button class="handle left-handle">
                <div class="text">&lsaquo;</div>
            </button>
            <div class="slider">
                <?php foreach ($tutorials as $tutorial) : ?>
                    <div class="image-container">
                        <a href="index.php?page=tutorials&task=view&id=<?php echo $tutorial['id']; ?>" class="card-link">
                            <img src="<?php echo $tutorial['src']; ?>">
                            <span class="tutspan"><?php echo $tutorial['text']; ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="handle right-handle">
                <div class="text">&rsaquo;</div>
            </button>
        </div>
    </div>
</body>

</html>
