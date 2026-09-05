<?php

class robot {
    public $suara = 'ngikik';
    public $berat = 100;
}

$robot1 = new robot;
echo 'suara robotnya...'. $robot1->suara. 'beratnya...'. $robot1->berat;