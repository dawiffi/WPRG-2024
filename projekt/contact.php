<?php
require_once 'db.php';
global $conn;
include 'header.php';
?>
<h2>Kontakt (zaproponuj nowy temat, usprawnienia, itp.)</h2>
<form action="contact.php" method="post">
    <label for="imie">Twoje imię:</label>
    <input type="text" name="imie" id="imie" required>
    <br>
    <label for="email">Twój email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="wiadomosc">Wiadomość:</label>
    <textarea name="wiadomosc" id="wiadomosc" required></textarea>
    <br>
    <input type="submit" value="Wyślij">
</form>
<?php
if (isset($_POST['imie']) && isset($_POST['email']) && isset($_POST['wiadomosc'])) {
    $imie = $_POST['imie'];
    $email = $_POST['email'];
    $wiadomosc = $_POST['wiadomosc'];
    $data = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `wiadomosci` (`imie`, `email`, `wiadomosc`, `data`) VALUES ('$imie', '$email', '$wiadomosc', '$data');";
    if ($conn->query($sql) === TRUE) {
        echo "Wiadomość została wysłana.";
    } else {
        echo "Błąd. Wiadomość nie została wysłana.";
    }
}
include 'footer.php';
?>
