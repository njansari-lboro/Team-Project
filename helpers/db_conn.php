<?php
//connects to db
$servername = "sci-project.lboro.ac.uk";
$username = "team02";
$password = "oJrpCg0cBy";
$dbname = "team02";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
