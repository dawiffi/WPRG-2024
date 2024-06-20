<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Portal informacyjny o grach</title>
    <link href="style.css" rel="stylesheet" />
</head>
<header>
    <p class="ht">gryinfo</p>
</header>
<body>
<nav>
<!--    <div id="hamburger">-->
        <input type="checkbox" class="check_box" id="checkbox1">
        <label for="checkbox1">
<!--    </div>-->
    <ul id="menu">
        <li><a href="#">Strona główna</a></li>
        <li id="li_kategorie"><a>Kategorie:</a></li>
        <li><a href="#">FPS</a></li>
        <li><a href="#">RPG</a></li>
        <li><a href="#">Battle Royale</a></li>
    </ul>
</nav>
<div class="srodek">
    <select name="filters" id="filters">
        <option value=""></option>
    </select>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gry_info";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p id='connection'><img src='connection_successful.png' id='conn_img'></p>";
    ?>
</div>
</body>
<footer>
    <p class="ft">Dawid Frontczak - s29608 2024</p>
</footer>
</html>