<?php

class leptop {
    public $merk = 'asus tuf a16';
    public $warna = 'hitam';
}

$leptop_saya = new leptop;
echo 'merk leptop saya...'. $leptop_saya->merk. 'warna leptop saya...'. $leptop_saya->warna;