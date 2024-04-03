<?php
function liczbaPierwsza($liczba){
    if ($liczba<2){
        return false;
    }
    $a = sqrt($liczba);

    for ($i=2; $i<=$a; $i++){
        if (($liczba%$i)==0){
            return false;
        }
    }
    return true;
}

for ($i=0; $i<20; $i++){
    if (liczbaPierwsza($i)){
        echo $i;
        echo "\n";
    }
}