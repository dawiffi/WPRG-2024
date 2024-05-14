
<?php
session_start();

$correct_login = "user";
$correct_password = "password";

if(isset($_POST['submit_login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if($login === $correct_login && $password === $correct_password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['login'] = $login;
        setcookie("login", $login, time() + 3600);
        header("Location: php.php");
        exit();
    } else {
        $error_message = "Błędny login lub hasło. Spróbuj ponownie.";
    }
}

$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if(isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    $logged_in = false;
}

if(isset($_POST['clear_form'])) {
    clearFormAndCookies();
}

function saveFormToCookie() {
    setcookie("form_data", serialize($_POST), time() + 3600);
}

function loadFormFromCookie() {
    if(isset($_COOKIE['form_data'])) {
        $_POST = unserialize($_COOKIE['form_data']);
    }
}

function clearFormAndCookies() {
    unset($_COOKIE['form_data']);
    setcookie('form_data', '', time() - 3600);
}

function validateCard($number){
    $length = strlen($number);
    return $length === 16;
}


if(isset($_POST['submit'])) {
    $ilosc_osob = $_POST['count'];
    $imie = $_POST['name'];
    $nazwisko = $_POST['surname'];
    $adres = $_POST['address'];
    $numer_karty = $_POST['creditcard'];
    $email = $_POST['email'];
    $data_pobytu = $_POST['staydate'];
    $godzina_przyjazdu = $_POST['arrival'];
    $dostawienie_lozka = isset($_POST['kidsbed']) ? "Tak" : "Nie";
    $udogodnienia = isset($_POST['additional']) ? implode(', ', $_POST['additional']) : 'Brak';
    $numer_karty_valid = validateCard($numer_karty);

    echo "<h2>Podsumowanie Rezerwacji</h2>";

    echo"
        <p>Ilość osób: $ilosc_osob</p>
        <p>Imię: $imie</p>
        <p>Nazwisko: $nazwisko</p>
        <p>Adres: $adres</p>
        <p>Email: $email</p>
        <p>Data pobytu: $data_pobytu</p>
        <p>Godzina przyjazdu: $godzina_przyjazdu</p>
        <p>Dodatkowe udogodnienia: $udogodnienia</p>
        <p>Potrzeba dostawienia łóżka dla dziecka: $dostawienie_lozka</p>
        <p>Numer karty kredytowej:";
    if ($numer_karty_valid) {
        echo " $numer_karty (poprawny)";
    } else {
        echo " Błędny numer karty kredytowej";
    }

    for ($i = 1; $i <= $ilosc_osob; $i++) {
        if(isset($_POST["name$i"])) {
            echo "<h3>Dane osoby $i</h3>";
            echo "<p>Imię: {$_POST["name$i"]}</p>";
            echo "<p>Nazwisko: {$_POST["surname$i"]}</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rezerwacja hotelu</title>
</head>
<body>

<?php if(!$logged_in): ?>
    <h2>Logowanie</h2>
    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="submit_login" value="Zaloguj się">
    </form>
<?php endif; ?>

<?php if($logged_in): ?>
    <form method="post">
        <input type="submit" name="logout" value="Wyloguj">
        <?php if(isset($_COOKIE['login'])): ?>
            <p>Witaj, <?php echo $_COOKIE['login']; ?>!</p>
        <?php endif; ?>
        <input type="submit" name="clear_form" value="Wyczyść formularz">
    </form>
<?php endif; ?>


<?php if($logged_in): ?>
    <h1>Formularz Rezerwacji Hotelu</h1>
    <form method="POST">
        <h1>Ilość osób (nie wliczając osoby rezerwującej)</h1>
        <select id="count" name="count">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <input type="submit" name="submit2" value="Dalej">
    </form>
    <?php if(isset($_POST['submit2'])): ?>
        <?php
        {
            $count=$_POST['count'];
            echo "<form method='POST'>";
            echo "<input type='hidden' name='count' value='$count'>";
            for ($i = 1; $i <= $count; $i++) {
                echo "<h1>Dodatkowa osoba $i:</h1>";
                echo "Imię: <input type='text' id='name$i' name='name$i' required><br>";
                echo "Nazwisko: <input type='text' id='surname$i' name='surname$i' required><br>";
                echo "<br>";
            }
            echo "<h1>Dane osoby rezerwującej:</h1>";
            echo "Imię: <input type='text' id='name' name='name' required><br>";
            echo "Nazwisko: <input type='text' id='surname' name='surname' required><br>";
            echo "Adres: <input type='text' id='address' name='address' required><br>";
            echo "Numer karty kredytowej: <input type='text' id='creditcard' name='creditcard' required><br>";
            echo "E-mail: <input type='email' id='email' name='email' required><br>";
            echo "Data pobytu: <input type='date' id='staydate' name='staydate'><br>";
            echo "Godzina przyjazdu: <input type='time' id='arrival' name='arrival' required><br>";
            echo "Potrzeba dostawienia łóżka dla dziecka: <input type='checkbox' id='kidsbed' name='kidsbed' value='1'><br>";
            echo "Udogodnienia: <select id='additional' name='additional[]' multiple>
            <option value='klimatyzacja'>Klimatyzacja</option>
            <option value='popielniczka'>Popielniczka dla palacza</option>
        </select><br>";
            echo "<input type='submit' name='submit' value='Zatwierdź rezerwację'>";
            echo "</form>";
        }?>
    <?php endif; ?>
<?php else: ?>
    <p>Nie jesteś zalogowany. Aby uzyskać dostęp do formularza rezerwacji hotelu, proszę się zalogować.</p>
<?php endif; ?>


</body>
</html>