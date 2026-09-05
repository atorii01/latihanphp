<?php

function print_text ($text) {
    $text = "gedung". $text;
    echo "=======>";
    echo $text;
    echo "=======>";
}

function jarak() {
    return "<br>";
}   

print_text(" perkuliahan ");
echo jarak();
print_text(" pertemuan 2 ");
echo jarak();
print_text(" array ");
echo jarak();