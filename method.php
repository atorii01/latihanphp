<?php

class robot {
    public $suara = 'beep';
    public $berat = 100;

    public function bersuara() {
        echo 'suara robot...'. $this->suara;
    }

    public function berat_robot() {
        echo 'berat robot...'. $this->berat. 'kg';
    }
}

$robot_saya = new robot;
$robot_saya->bersuara();
$robot_saya->berat_robot();