<?php
function fibonacci($a){
    $f=[0, 1];

    for ($i=2; $i<=$a; $i++){
        $f[$i] = $f[$i-1]+$f[$i-2];
    }

    return $f;
}

$fib = fibonacci(15);
$i = 1;

foreach ($fib as $number){
    if ($number%2!=0){
        echo $i . ". " .  $number . "\n";
        $i++;
    }
}



