<?php

class Mahasiswa
{
    public function isiNama($nama)
    {z
        echo "Nama : $nama <br>";
        return $this;
    }

    public function isiKelas($kelas)
    {
        echo "Kelas : $kelas <br>";
        return $this;
    }

    public function isiJurusan($jurusan)
    {
        echo "Jurusan : $jurusan <br>";
        return $this;
    }
}

$mhs = new Mahasiswa();
$mhs->isiNama("Rizky") 
    ->isiKelas("XI RPL 1") 
    ->isiJurusan("Rekayasa Perangkat Lunak");