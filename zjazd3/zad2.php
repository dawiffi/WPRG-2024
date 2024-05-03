<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data i czas 2</title>
</head>
<body>
    <h1>Silnia rekurencyjnie i nierekurencyjnie</h1>
    <h2>Z powodu na za krotkie czasy dzialania funkcji, sa one wywolywane 100 razy, a czas jest dzielony przez 100.</h2>
    <h3>Czas wyswietlany jest w milisekundach</h3>
    <form action="" method="post">
    Podaj liczbe: <input type="number" name="liczba" id="liczba">
    <input type="submit" name="submit" value="Oblicz">
    </form>
    <?php
    function silnia_rek($n){
        if ($n==0){
            return 1;
        }else{
            return $n*silnia_rek($n-1);
        }
    }

    function silnia_nierek($n){
        $silnia = 1;
        for ($i = 1; $i<=$n; $i++){
            $silnia*=$i;
        }
        return $silnia;
    }

    if(isset($_POST['submit'])){
        $liczba = $_POST['liczba'];
        $iteracje = 100;
        $time1 = microtime(true);
        for ($i=0; $i<$iteracje; $i++){
            $silniarekurencyjna = silnia_rek($liczba);
        }
        $time2 = microtime(true);
        $time3 = round(($time2 - $time1)/$iteracje * 1000, 5);

        echo "Silnia rekurencyjnie: $silniarekurencyjna <br>";
        echo "Czas dzialania: $time3 milisekund<br>";

        $time4 = microtime(true);
        for ($i=0; $i<$iteracje; $i++){
            $silnianierekurencyjna = silnia_nierek($liczba);
        }
        $time5 = microtime(true);
        $time6 = round(($time5 - $time4)/$iteracje * 1000, 5);

        echo "Silnia nierekurencyjnie: $silnianierekurencyjna <br>";
        echo "Czas dzialania: $time6 milisekund<br>";

        if ($time6>$time3){
            $roznica = round($time6-$time3, 5);
            echo "Silnia rekurencyjna dzialala szybciej o $roznica milisekund od silni nierekurencyjnej.";
        }else{
            $roznica2 = round($time3-$time6, 5);
            echo "Silnia nierekurencyjna dzialala szybciej o $roznica2 milisekund od silni rekurencyjnej.";
        }
    }
    ?>

</body>
</html>