<?php
//Makes DB connection
$servername = "sql1.njit.edu";
$username = "kr525";
$password = "";
$dbname = "kr525";
$con = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$password = $_POST['password'];
$content = $_POST['content'];

$sql = "UPDATE Chat SET content='$content' WHERE name='$name' AND password='$password'";

if ($con->query($sql) === TRUE) {
    echo "record was updated";
} else {
    echo "there was an error... " . $con->error;
}

$con->close();
?>
