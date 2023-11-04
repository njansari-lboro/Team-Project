<?php
    if (!(isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))) {
        header("Location: /pages/?page=tutorials");
        die();
    }
?>

<?php
//setting action - view new or default
if (isset($_GET["task"])) {
    $task = $_GET["task"];
    if ($task == "new_tut") {
        new_tut();
    } elseif ($task == "view") {
        view_tut();
    } else {
        display_default();
    }
} else {
    display_default();
}


function display_default()
{
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/pages/tutorials/tutorials.css">
        <script src="/pages/tutorials/tutorials.js" defer></script>
        <title>Make-It-All!</title>
    </head>

    <body class="customBody">
        <h1 class="tutHeader">Technical Information</h1>
        <a href="?page=tutorials&task=new_tut&technical=1" class="plus-icon-link">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 11H13V5C13 4.45 12.55 4 12 4C11.45 4 11 4.45 11 5V11H5C4.45 11 4 11.45 4 12C4 12.55 4.45 13 5 13H11V19C11 19.55 11.45 20 12 20C12.55 20 13 19.55 13 19V13H19C19.55 13 20 12.55 20 12C20 11.45 19.55 11 19 11Z" />
            </svg>
        </a>
        <?php include "/tutorials/dynamic-carousel.php"; ?>
        <br><br>
        <h1 class="tutHeader">Non Technical Information</h1>
        <!-- IF NOT TECHINICAL HIDE -->
        <a href="index.php?page=tutorials&task=new_tut&technical=0" class="plus-icon-link">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 11H13V5C13 4.45 12.55 4 12 4C11.45 4 11 4.45 11 5V11H5C4.45 11 4 11.45 4 12C4 12.55 4.45 13 5 13H11V19C11 19.55 11.45 20 12 20C12.55 20 13 19.55 13 19V13H19C19.55 13 20 12.55 20 12C20 11.45 19.55 11 19 11Z" />
            </svg>
        </a>
        <?php include("/tutorials/dynamic-carousel.php"); ?>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
}



function view_tut()
{
    if (!isset($_GET["id"])) {
        die("No tutorial ID provided.");
    }

    $tutorialId = intval($_GET["id"]);

    $tutorials = [
        1 => [
            "title" => "How to build relationships",
            "steps" => [
                [
                    "image" => "/img/bg.jpg",
                    "description" => "This is the first step of the technical tutorial 1."
                ],
                [
                    "image" => "http://via.placeholder.com/400x300",
                    "description" => "This is the second step of the technical tutorial 1."
                ],
                [
                    "image" => "http://via.placeholder.com/400x300",
                    "description" => "This is the third step of the technical tutorial 1."
                ],
            ]
        ],
        2 => [
            "title" => "How to set up 2FA",
            "steps" => [
                [
                    "image" => "http://via.placeholder.com/400x400",
                    "description" => "This is the first step of the technical tutorial 2."
                ],
                [
                    "image" => "http://via.placeholder.com/400x400",
                    "description" => "This is the second step of the technical tutorial 2."
                ],
            ]
        ],
        3 => [
            "title" => "Non-Technical Tutorial",
            "steps" => [
                [
                    "image" => "http://via.placeholder.com/300x300",
                    "description" => "This is the first step of the non-technical tutorial."
                ],
                [
                    "image" => "http://via.placeholder.com/300x300",
                    "description" => "This is the second step of the non-technical tutorial."
                ],
                [
                    "image" => "http://via.placeholder.com/300x300",
                    "description" => "This is the third step of the non-technical tutorial."
                ],
                [
                    "image" => "http://via.placeholder.com/300x300",
                    "description" => "This is the fourth step of the non-technical tutorial."
                ],
            ]
        ],
    ];


    if (!isset($tutorials[$tutorialId])) {
        echo ("Tutorial not found.");
    }

    $tutorial = $tutorials[$tutorialId];


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/pages/tutorials/tutorials.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <title>View Tutorial</title>
    </head>

    <body>
        <h2><?php echo $tutorial["title"]; ?></h2>

        <div id="step-container" class="clearfix">
            <?php $stepNumber = 1; ?>
            <?php foreach ($tutorial["steps"] as $step) : ?>
                <div class="step" data-step="<?php echo $stepNumber; ?>">
                    <div class="image-container">
                        <div class="step-counter">Step <?php echo $stepNumber; ?></div>
                        <div class="default-image-radio">
                            <input type="radio" name="defaultImage" value="<?php echo $stepNumber; ?>" required>
                            <label class="radioLabel">Set as cover image</label>
                        </div>
                        <img src="<?php echo $step["image"]; ?>" class="step-image corner">
                    </div>
                    <p class="step-description">
                        <?php echo $step["description"]; ?>
                    </p>
                </div>
                <?php $stepNumber++; ?>
            <?php endforeach; ?>
        </div>
        <a class="go-back" href="?page=tutorials">Go back</a>
    </body>


    </html>

<?php
}


function new_tut()
{
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/pages/tutorials/tutorials.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <title>Tutorial Step Addition</title>
    </head>

    <body>
        <div class="">


            <?php
            $title = isset($_GET["technical"]) && $_GET["technical"] ? "Technical" : "Non-Technical";
            ?>
            <h2 style="margin-bottom: 2rem;">Make <?php echo $title; ?> Tutorial</h2>

            <form class="txtform" action="/pages/?page=tutorials" method="post" enctype="multipart/form-data">
                <input type="text" id="tutorialTitle" placeholder="Enter Task Name" required>
                <div id="step-container" class="clearfix">
                    <div class="step" data-step="1">
                        <div class="image-container">
                            <div class="step-counter">Step 1</div>
                            <div class="default-image-radio">
                                <input type="radio" name="defaultImage" value="1" required>
                                <label class="radioLabel">Set as cover image</label>
                            </div>
                            <img src="/img/placeholder.jpg" alt="Placeholder" onChange="readURL(this)" class="placeholder" id="img1">
                            <picture>
                                <source srcset="/img/placeholderDARK.jpg" media="(prefers-color-scheme: dark)">
                                <img src="/img/placeholder.jpg" alt="Placeholder" class="placeholder">
                            </picture>
                            <input type="file" name="step1-image" required>
                        </div>
                        <textarea placeholder="Enter step description" name="step1-text" rows="4" class="form-control1" required></textarea>
                        <button type="button" class="remove-step-btn">Remove Step</button>
                    </div>
                </div>
                <a class="go-back" href="?page=tutorials">Go back</a>
                <button type="button" id="add-step" class="">Add Step</button>
                <input id="submitBtn" type="submit" value="Post Tutorial!" class="">
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $("#add-step").click(function() {
                    let stepCount = $("#step-container .step").length + 1;

                    let stepTemplate = `
                        <div class="step" data-step="${stepCount}">
                            <div class="image-container">
                                <div class="step-counter">Step ${stepCount}</div>
                                <div class="default-image-radio">
                                    <input type="radio" name="defaultImage" value="${stepCount}" required>
                                    <label class="radioLabel">Set as cover image</label>
                                </div>
                                <img src="/img/placeholder.jpg" alt="Placeholder" class="placeholder">
                                <picture>
                                    <source srcset="/img/placeholderDARK.jpg" media="(prefers-color-scheme: dark)">
                                    <img src="/img/placeholder.jpg" alt="Placeholder" class="placeholder">
                                </picture>
                                <input type="file" name="step${stepCount}-image" required>
                            </div>
                            <textarea placeholder="Enter step description" name="step${stepCount}-text" rows="4" class="form-control1" required></textarea>
                            <button type="button" class="btn btn-danger remove-step-btn">Remove Step</button>
                        </div>
                    `;


                    $("#step-container").append(stepTemplate);
                });

                $("#step-container").on("change", "input[type='file']", function() {
                    console.log("uploaded");
                    var file = this.files[0];
                    if (file) {
                        var ext = file.name.split(".").pop().toLowerCase();
                        if (["gif", "png", "jpeg", "jpg"].includes(ext)) {
                            var reader = new FileReader();
                            var imgElement = $(this).siblings("picture").find("img.placeholder");
                            reader.onload = function(e) {
                                imgElement.attr("src", e.target.result);
                                imgElement.siblings("source").attr("srcset", e.target.result);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            $(this).siblings("picture").find("img.placeholder").attr("src", "/img/placeholder.jpg");
                            $(this).siblings("picture").find("source").attr("srcset", "/img/placeholderDARK.jpg");
                        }
                    }
                });




                function checkSteps() {
                    let stepCount = $("#step-container .step").length;
                    if (stepCount < 1) {
                        $("#submitBtn").hide();
                    } else {
                        $("#submitBtn").show();
                    }
                }

                $("#add-step").click(function() {
                    checkSteps();
                });

                $("#step-container").on("click", ".remove-step-btn", function() {
                    $(this).closest(".step").remove();
                    $(".step").each(function(index, element) {
                        const stepNum = index + 1;
                        $(element).attr("data-step", stepNum).find(".step-counter").text("Step " + stepNum);
                    });

                    checkSteps();
                });


                checkSteps();
            });
        </script>
    </body>

    </html>

<?php
}



?>
