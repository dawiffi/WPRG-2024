<?php
global $conn;
require_once 'db.php';
include 'header.php';

$sql = "SELECT * FROM `artykuly` ORDER BY `data_publikacji` DESC LIMIT 5;";
$result = $conn->query($sql);
?>
<div class="srodek">
    <p>Filtruj wpisy:</p>
    <select name="filters" id="filters">
        <option value=""></option>
    </select>
    <h2>Najnowsze artykuły:</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='artykul'>";
            echo "<h3>" . $row['tytul_artykulu'] . "</h3>";
            echo "<p>" . $row['data_publikacji'] . "</p>";
            echo "<p>" . substr($row['tresc_artykulu'],0,10) . "</p>";
            echo "<p><a href='artykul.php?id=" . $row['id_artykulu'] . "'>Czytaj dalej</a></p>";
            echo "</div>";
        }
    } else {
        echo "Brak artykułów do wyświetlenia.";
    }
    ?>
</div>
<?php
include 'footer.php';
?>
