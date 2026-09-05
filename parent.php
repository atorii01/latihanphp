<?php

class Robot {

    public $nama;
    public $suara;

    public function __construct($nama, $suara){
        $this->nama = $nama;
        $this->suara = $suara;
    }

    public function bersuara(){
        echo $this->nama . " berbicara: " . $this->suara;
    }
}

class RobotHewman extends Robot {}

$robot1 = new RobotHewan("bullking", "HADOEHH");
$robot1->bersuara();