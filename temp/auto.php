<?php
class Auto {
    public $merk;
    public $kleur;
    public $bouwjaar;

    public function __construct($merk, $kleur, $bouwjaar) {
        $this->merk = $merk;
        $this->kleur = $kleur;
        $this->bouwjaar = $bouwjaar;
    }

    // public function getInfo() {
    //     return "Merk: " . $this->merk . ", Kleur: " . $this->kleur . ", Bouwjaar: " . $this->bouwjaar;
    // }
}

?>