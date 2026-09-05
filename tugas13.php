<?php

$nama = "Andi";

function tampilkanpesan() {
    global $nama;
    return "Halo, " . $nama . ", selamat belajar Anonymous Function di PHP!";
}  

echo tampilkanpesan();