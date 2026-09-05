<?php

class hero {
    public $nama = 'gusion';
    public $nyawa = 100;
    public $kekuatan = 'nyamar';

    public function nama_hero() {
        echo 'nama hero...'. $this->nama. '</br>';
    }

    public function nyawa_hero() {
        echo 'nyawa hero...'. $this->nyawa. '</br>';
    }

    public function kekuatan_hero() {
        echo 'kekuatan hero...'. $this->kekuatan. '</br>';
    }
}

$hero_saya = new hero;
$hero_saya->nama_hero();
$hero_saya->nyawa_hero();
$hero_saya->kekuatan_hero(); 