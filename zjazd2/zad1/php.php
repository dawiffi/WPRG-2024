<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
    <form method="POST">
        <h1>Podaj liczby:</h1>
        <input type="text" name="t1" value="1" size="5">
        <input type="text" name="t2" value="2" size="5">
        <br>
        <h1>Wybierz rodzaj działania:</h1>
        <input type="radio" name="i1" value="add" checked="true">+
        <input type="radio" name="i1" value="subtract">-
        <input type="radio" name="i1" value="multiply">*
        <input type="radio" name="i1" value="divide">/
        <button type="submit" name="submit" value="submit">Oblicz</button>
        <br>
        <h1>Wynik:</h1>
    </form>
    <?php
    if (isset($_POST['submit'])){
        $number1 = $_POST['t1'];
        $number2 = $_POST['t2'];
        switch($_POST['i1']){
            case "add":
                echo $number1+$number2;
                break;
            case "subtract":
                echo $number1-$number2;
                break;
            case "multiply":
                echo $number1*$number2;
                break;
            case "divide":
                echo $number1/$number2;
                break;
        }
    }
    ?>
</body>
</html>