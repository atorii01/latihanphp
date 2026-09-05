<?php

$Profilutama = array(
    "nama" => "Hilman",
    "umur" => 21,
    "kerja" => "pengacara" // pengangguran banyak acara

);

$detailtambahan = array(
    "Leptop" => "TUF A16",
    "hobi" => "ngoding",
);

$profillengkap = array_merge($Profilutama, $detailtambahan);
print_r($profillengkap);