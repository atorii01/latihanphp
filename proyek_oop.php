<?php

class Siswa {

    public $nama = "Tidak diketahui";
    public $kelas = "X-RPL";
    public $umur = 15;
}


$siswa1 = new Siswa();
$siswa2 = new Siswa();


$siswa1->nama = "Peter";
$siswa1->kelas = "X-RPL 1";
$siswa1->umur = 16;

$siswa2->nama = "Rachel";
$siswa2->kelas = "X-RPL 2";
$siswa2->umur = 15;


echo "Daftar Siswa:<br>";
echo "Nama: " . $siswa1->nama . ", Kelas: " . $siswa1->kelas . ", Umur: " . $siswa1->umur . " tahun.<br>";
echo "Nama: " . $siswa2->nama . ", Kelas: " . $siswa2->kelas . ", Umur: " . $siswa2->umur . " tahun.<br>";


echo "<br>Validasi Object:<br>";
var_dump($siswa1);
echo "<br>";
var_dump($siswa2);  
?>