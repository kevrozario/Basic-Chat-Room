<?php
//Makes DB connection
$servername = "sql1.njit.edu";
$username = "kr525";
$password = "";
$dbname = "kr525";

$name = $_GET['name'];

$con = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Chat WHERE name='$name'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["content"]. "<br>";
    }
} else {
    echo " ";
}
$con->close();
?>
