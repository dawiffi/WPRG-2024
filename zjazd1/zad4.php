<?php
$text = explode(" ", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");

for ($i=0; $i<count($text); $i++) {
    if (str_contains($text[$i], ".") || str_contains($text[$i], ",") || str_contains($text[$i], "'")) {
        for ($j=$i; $j<count($text)-1; $j++) {
            $text[$j] = $text[$j+1];
        }
        array_pop($text);
    }
}

$assocTable = [];
for ($i=0; $i<count($text); $i+=2) {
    $assocTable[$text[$i]] = $text[$i+1];
}

foreach ($assocTable as $key => $value) {
    echo "$key ==> $value" . "\n";
}