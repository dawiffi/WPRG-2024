<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL</title>
</head>
<body>
<?php
    $localhost = "localhost:3306";
    $login = "root";
    $password = "";
    $dbname = "zjazd5-db";

    if (!$connection = mysqli_connect($localhost, $login, $password, $dbname)) {
        exit("Error: " . mysqli_connect_error());
    }else{
        echo "Connected successfully" . "<br>";
    }

    $query = "SELECT * FROM test2";
    $query2 = "SHOW TABLES";
    $result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
    echo "Number of rows in table 'test2': " . mysqli_num_rows($result) . "<br>";
    echo "Tables in the database: [fetch_rows]" . "<br>";
    while ($row = mysqli_fetch_row($result2)) {
        echo $row[0] . "<br>";
    }

    mysqli_data_seek($result, 0);
    echo "Number of rows in table 'test2' [fetch_array]: " . "<br>";
    while ($row = mysqli_fetch_array($result)) {
        echo $row[0] . "<br>";
    }

    $query3 = "INSERT INTO `test2`(`test2_nrtel`, `test2_zwierze`, `test2_samochod`) VALUES ('657345152','Baran','Mitsubishi')";
    if(mysqli_query($connection, $query3)){
        echo "New record created successfully";
    }else{
        echo "Error: " . $query3 . "<br>" . mysqli_error($connection);
    }
?>
</body>
</html>