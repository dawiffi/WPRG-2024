<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data i czas 1</title>
</head>
<body>
    <h1>Podaj swoja date urodzin: </h1>
    <form action="" method="get">
        Wprowadz date: <input type="date" id="birthday" name="birthday">
        <input type="submit" name="submit" value="Dalej">
    </form>
    <?php
        function getDayOfTheWeek($birthday) {
            $dayOfWeek = date('l', strtotime($birthday));
            return $dayOfWeek;
        }

        function getAge($birthday){
            $today = new DateTime();
            $birthdate = new DateTime($birthday);
            return $birthdate->diff($today)->y;
        }

        function getDaysUntilBirthday($birthday){
            $currentYear = date('Y');
            $currentTime = time();
            
            $nextBirthdayThisYear = mktime(0, 0, 0, date('m', strtotime($birthday)), date('d', strtotime($birthday)), $currentYear);
            $nextBirthdayNextYear = mktime(0, 0, 0, date('m', strtotime($birthday)), date('d', strtotime($birthday)), $currentYear + 1);
            
            $daysUntilNextBirthday = ($nextBirthdayThisYear - $currentTime) > 0 ? ($nextBirthdayThisYear - $currentTime) / (60 * 60 * 24) : ($nextBirthdayNextYear - $currentTime) / (60 * 60 * 24);

            return $daysUntilNextBirthday;
        }

        if (isset($_GET['birthday'])) {
            $birth = $_GET['birthday'];

            $dayOfWeek = getDayOfTheWeek($birth);
            $age = getAge($birth);
            $daysToBirthday = abs(ceil(getDaysUntilBirthday($birth)));


            echo "<h2>Informacje o twoich urodzinach: </h2>";
            echo "Dzien tygodnia w ktorym sie urodziles: $dayOfWeek.<br>";
            echo "Masz $age lat.<br>";
            echo "Do twoich nastepnych urodzin zostalo $daysToBirthday dni.<br>";
            } else {
                echo "<h2>Blad</h2>";
                echo "PODAJ SWOJA DATE URODZENIA";
            }
    ?>
</body>
</html>
