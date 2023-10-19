<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Make-It-All!</title>
    <style>
        :root {
            --itemGrow: 1.2;
            --duration: 250ms;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            display: grid;
            grid-template-columns: repeat(3, 100%);
            overflow: hidden;
            scroll-behavior: smooth;
        }

        .wrapper section {
            width: 100%;
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, auto);
            margin: 20px 0;
        }

        .wrapper section .item {
            position: relative;
            padding: 0 2px;
            transition: var(--duration) all;
        }

        .wrapper section .item:hover {
            margin: 0 40px;
            transform: scale(var(--itemGrow));
        }

        .wrapper section .item .heading {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
        }

        .wrapper section .item .duration {
            position: absolute;
            bottom: 0;
            left: 20px;
            color: #fff;
        }

        .wrapper section .arrow__btn {
            position: absolute;
            color: #fff;
            text-decoration: none;
            font-size: 6em;
            background: rgb(0, 0, 0);
            width: 80px;
            padding: 20px;
            text-align: center;
            z-index: 1;
        }

        .wrapper section .left-arrow {
            top: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(-90deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        }

        .wrapper section .right-arrow {
            top: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        }
    </style>
</head>

<body>
    <h1 style="font-family: Arial, Helvetica, sans-serif">Technical Information</h1>
    <?php include('../helpers/carousel.php');
    ?>
    <h1 style="font-family: Arial, Helvetica, sans-serif">Non Technical Information</h1>
    <?php include('../helpers/carousel.php');
    ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>