<?php
define('servername', "localhost");
define('username', "root");
define('password', "");
define('dbname', "gry_info");

global $conn;
$conn = new mysqli(servername, username, password, dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p id='connection'><img src='connection_successful.png' id='conn_img'></p>";
?>