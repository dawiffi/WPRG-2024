<!DOCTYPE html>
<html>
<head>
    <title>Sprawdź czy liczba jest liczbą pierwszą</title>
</head>
<body>

<h2>Sprawdź czy liczba jest liczbą pierwszą</h2>

<form method="post" action="">
    Wprowadź liczbę: <input type="text" name="number">
    <input type="submit" name="submit" value="Sprawdź">
</form>

<?php
function isPrime($number) {
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

if (isset($_POST['submit'])) {
    $inputNumber = isset($_POST['number']) ? intval($_POST['number']) : 0;

    if ($inputNumber > 0) {
        $iterations = 0;
        if (isPrime($inputNumber)) {
            echo "<p>Liczba $inputNumber jest liczbą pierwszą.</p>";
        } else {
            echo "<p>Liczba $inputNumber nie jest liczbą pierwszą.</p>";
        }
    } else {
        echo "<p>Podana wartość nie jest liczbą całkowitą dodatnią.</p>";
    }
}
?>

</body>
</html>