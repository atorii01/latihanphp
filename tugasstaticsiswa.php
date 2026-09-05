<?php

class Siswa
{
    // Properti
    public $nama;
    public $kelas;
    public $jurusan;
    public $nilai;

    // Setter
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    public function setNilai($nilai)
    {
        $this->nilai = $nilai;
    }

    // Menampilkan data
    public function tampilkan()
    {
        echo "Nama : " . $this->nama . "<br>";
        echo "Kelas : " . $this->kelas . "<br>";
        echo "Jurusan : " . $this->jurusan . "<br>";
        echo "Nilai : " . $this->nilai . "<br>";
    }
}

// Membuat objek
$siswa1 = new Siswa();

// Mengisi data men-ggunakan setter
$siswa1->setNama("Peter Maleke");
$siswa1->setKelas("X-RPL");
$siswa1->setJurusan("Rekayasa Perangkat Lunak");
$siswa1->setNilai(95);

// Menampilkan data
$siswa1->tampilkan();

?>