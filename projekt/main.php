<?php
global $conn;
require_once 'db.php';
include 'header.php';
?>
<div class="srodek">
    <p>Filtruj wpisy po autorze:</p>

    <form action="main.php" method="post">
        <select name="filters" id="filters">
            <option value="all">Wszyscy</option>
            <?php
    $sql1 = "SELECT DISTINCT `autor_artykulu` FROM `artykuly`;";
    $authors = array();
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['autor_artykulu'] . "'>" . $row['autor_artykulu'] . "</option>";
            array_push($authors, $row['autor_artykulu']);
        }
    }
    ?>
        </select>
        <input type="submit" value="Filtruj">
    </form>
    <?php
    if (!isset($_POST['filters'])){
        echo "<p>Nie wybrano zadnej opcji filtrowania:</p>";
    }else{
        $selected = $_POST['filters'];
        if ($selected == 'all') {
            $sql = "SELECT * FROM `artykuly` ORDER BY `data_publikacji` DESC;";
        } else {
            $sql = "SELECT * FROM `artykuly` WHERE `autor_artykulu` = '$selected' ORDER BY `data_publikacji` DESC;";
        }

        $result = $conn->query($sql);
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
    }
    ?>

    <h2>Najnowsze artykuły:</h2>
    <?php
    $sql2 = "SELECT * FROM `artykuly` ORDER BY `data_publikacji` DESC LIMIT 5;";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
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
