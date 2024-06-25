<?php
global $conn;
require_once 'db.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `artykuly` WHERE `id_artykulu` = $id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='srodek'>";
        echo "<h2>" . $row['tytul_artykulu'] . "</h2>";
        echo "<p>" . $row['data_publikacji'] . "</p>";
        echo "<p>" . $row['tresc_artykulu'] . "</p>";
        echo "</div>";
    } else {
        echo "Brak artykułu do wyświetlenia.";
    }
} else {
    echo "Brak artykułu do wyświetlenia.";
}

include 'footer.php';
?>
