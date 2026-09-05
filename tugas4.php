<?php

$username = "admin";
$password = "12345";

$inputusername = "yanto";
$inputpassword = "123";

do {
if($inputusername == $username && $inputpassword == $password) {
    echo "Login Berhasil";
    break;
}
else {
    echo "login gagal";
    break;
}
}
while (true);
