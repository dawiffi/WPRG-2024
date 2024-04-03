<?php
$owoce = array ("jablko","banan","pomarancza","mango","truskawka","malina","brzoskwinia","granat", "pomidor");

foreach ($owoce as $owoc) {
    $dlugosc = strlen($owoc);
    $odwroconyOwoc = '';

    for ($i=$dlugosc - 1; $i>=0; $i--){
        $odwroconyOwoc .= $owoc[$i];
    }
    echo $odwroconyOwoc;

    if ($owoc[0]=='p'){
        echo "\nTen wyraz zaczyna sie na litere P";
    }
    echo "\n";
}
