<?php

$quiz = [
    ["vraag" => "Wat is de hoofdstad van Nederland?",      "antwoord" => "Amsterdam",     "punten" => 7],
    ["vraag" => "wat is de grootste planeet in ons zonnestelsel?", "antwoord" => "Jupiter",       "punten" => 9],
    ["vraag" => "Wie is de president van Rusland?",      "antwoord" => "Putin", "punten" => 5],
    ["vraag" => "In welk jaar begon de Tweede Wereldoorlog?", "antwoord" => "1939",        "punten" => 10],
    ["vraag" => "Welk land heeft oorlog met de VS en Israël?",               "antwoord" => "Iran",            "punten" => 2],
];

function moeilijkheid($punten) {
    if ($punten < 5) {
        return "Makkelijk";
    } elseif ($punten <= 8) {
        return "Gemiddeld";
    } else {
        return "Moeilijk";
    }
}

$totaalPunten = 0;

foreach ($quiz as $nummer => $vraag) {
    $nr           = $nummer + 1;
    $tekst        = $vraag["vraag"];
    $punten       = $vraag["punten"];
    $niveau       = moeilijkheid($punten);

    echo "Vraag $nr: $tekst\n";
    echo "  Moeilijkheid : $niveau\n";
    echo "  Punten       : $punten\n";

    $totaalPunten += $punten;
}

echo "Totaal aantal punten: $totaalPunten\n";

?>