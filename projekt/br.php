<?php
global $conn;
require_once 'db.php';
include 'header.php';

$sql = "SELECT * FROM `artykuly` WHERE `kategoria_artykulu` = 'Battle Royale' ORDER BY `data_publikacji` DESC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='srodek'>";
        echo "<h2>" . $row['tytul_artykulu'] . "</h2>";
        echo "<p>" . $row['data_publikacji'] . "</p>";
        echo "<p>" . $row['tresc_artykulu'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Brak artykułu do wyświetlenia.";
}
include 'footer.php';
?>