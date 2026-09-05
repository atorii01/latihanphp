<?php

class robot {
    public $suara;
    public $berat;

    public function set_suara($suara) {
        return $this->suara = $suara;
    } 

    public function set_berat()  {
        return $this->set_berat;
    }
}

$robot1 = new robot;
$robot1->set_suara('beep');
echo 'bunyinyaa...'. $robot1->get_suara(). '</br>';