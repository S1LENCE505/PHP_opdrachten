<?php

class User {
    //accessability modifiers
    public String $naam;
    public String $password;
    public DateTime $dob;


    function __construct(String $naam, String $password, DateTime $dob) {
        $this->naam = $naam;
        $this->password = $password;
        $this->dob = $dob;
    }

    public function leeftijd() : int {
        $tijd = new DateTime();
        $leeftijd = $tijd->diff($this->dob)->y;
        return $leeftijd;
    }
}

$newUser = new User("Casper", "ikhouvanmannen", new DateTime('2008-09-15'));

echo '<pre>';
echo $newUser->naam;
echo $newUser->password;
echo $newUser->dob->format('Y-m-d');
echo '</pre>';

echo $newUser->leeftijd();