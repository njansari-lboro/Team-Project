<!-- THE LOGGED IN INDEX. THIS KEEPS NAV BAR, SIDEBAR ETC CONSISTENT -->
<!-- LOGIC AT THE BOTTOM ALSO HELPS US SELECT THE PAGE TO CHANGE TO -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Make-It-All!</title>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?page=dashboard"><b>Make It All</b></a>
        </div>
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                    <?php echo $_SESSION['NAME'] ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../helpers/logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <h1>Title</h1>
    <h2>Nav Bar</h2>
    <p>Links below <br></p>
    <a href="index.php?page=tutorials">Go to Tutorials</a><br>
    <a href="index.php?page=assignments">Go to Assignments</a><br>
    <a href="index.php?page=todo">Go to To-DO List</a><br>
    <a href="index.php?page=forums">Go to Forums</a><br>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="framework.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


<?php
//page decider logic
//must add page to array here and the pages file to redirect!
$page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 'dashboard';
$pages = array('dashboard', 'assignments', 'todo', 'tutorials', 'forums');
if (!empty($page)) {
    if (in_array($page, $pages)) {
        $page .= '.php';
        include($page);
    } else {
        echo 'Page not found. Return
        <a href="index.php?page=dashboard">dashboard</a>';
    }
}

?>