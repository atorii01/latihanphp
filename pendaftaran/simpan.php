<?php
session_start();

$data=[];

if(file_exists("data.json")){
    $data=json_decode(file_get_contents("data.json"),true);
}

$data[]=[
    "nama"=>$_SESSION['nama'],
    "email"=>$_SESSION['email'],
    "telepon"=>$_SESSION['telepon'],
    "tiket"=>$_SESSION['tiket'],
    "workshop"=>$_SESSION['workshop']
];

file_put_contents("data.json",json_encode($data,JSON_PRETTY_PRINT));

session_destroy();

header("Location: success.php");