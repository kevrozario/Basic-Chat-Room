<?php
//Makes DB connection
$servername = "sql1.njit.edu";
$username = "kr525";
$password = "";
$dbname = "kr525";
$con = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT name FROM Chat";
$result = $con->query($sql);

echo '<div id="names"><h2>Users:</h2>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["name"] . "<br>";
    }
} else {
    echo "<p>No users found</p>";
}
$con->close();
?>

</html>
