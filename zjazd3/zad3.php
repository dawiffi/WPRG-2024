<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struktura plików i operacje na nich</title>
</head>
<body>
<form action="" method="post">
    <h1>Podaj dane: </h1>
    <h2>Ścieżka: </h2>  <input type="text" name="sciezka" id="sciezka"> <br>
    <h2>Nazwa katalogu: </h2>   <input type="text" name="katalog" id="katalog"> <br>
    <h2>Operacja: </h2>
    <select name="operacja">
        <option value="odczyt" selected="selected">Odczytaj</option>
        <option value="usun">Usuń</option>
        <option value="stworz">Stwórz</option>
    </select> <br>
    <br>
    <input type="submit" name="submit" value="Wykonaj dzialanie">
</form>
<?php
if(isset($_POST['submit'])){
    $sciezka = $_POST['sciezka'];
    $katalog = $_POST['katalog'];
    $operacja = $_POST['operacja'];

    function operacjePlikami($sciezka, $katalog, $operacja='read'){
        if (substr($sciezka, -1) !== '/') {
            $sciezka .= '/';
        }

        switch ($operacja){
            case 'odczyt':
                return odczytPliku($sciezka.$katalog);
                break;
            case 'usun':
                return usunieciePliku($sciezka.$katalog);
                break;
            case 'stworz':
                return stworzeniePliku($sciezka.$katalog);
                break;
            default:
                return "Nieznana operacja na pliku.";
        }
    }

    function odczytPliku($pelnaSciezka){

        if (!is_dir($pelnaSciezka)){
            return "Katalog nie istnieje.";
        }

        $obsluga = opendir($pelnaSciezka);
        if ($obsluga === false){
            return "Błąd otwierania katalogu";
        }

        echo "Elementy w katalogu '$pelnaSciezka': <br>";
        while (($plik = readdir($obsluga)) !== false){
            echo "$plik<br>";
        }
        closedir($obsluga);
    }

    function usunieciePliku($pelnaSciezka){

        if (!is_dir($pelnaSciezka)){
            return "Katalog nie istnieje.";
        }
        if (count(scandir($pelnaSciezka)) == 2) {
            if (rmdir($pelnaSciezka)) {
                return "Katalog '$pelnaSciezka' został usunięty.";
            } else {
                return "Nie udało się usunąć katalogu '$pelnaSciezka'.";
            }
        } else{
            return "Katalog '$pelnaSciezka' nie jest pusty.";
        }
    }

    function stworzeniePliku($pelnaSciezka){

        if (is_dir($pelnaSciezka)){
            return "Taki katalog juz istnieje.";
        }

        if (mkdir($pelnaSciezka, 0777, true)){
            return "Katalog pomyślnie utworzony.";
        }else{
            return "Nie udało się stworzyć katalogu.";
        }
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sciezka = $_POST['sciezka'];
    $katalog = $_POST['katalog'];
    $operacja = $_POST['operacja'];

    echo "<p>Wynik operacji: " . operacjePlikami($sciezka, $katalog, $operacja) . "</p>";
}
?>
</body>
</html>
