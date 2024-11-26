<?php
/* OEF: (mag opnieuw in een apart bestand): maak een pagina die 2 optionele GET parameters accepteert:
name => een string, bevat een naam
gender => ook een string, mogelijke antwoorden zijn m, f en x
Toon op de pagina een begroeting in de vorm: Hallo [Mr.|Mv.| ] {naam}. Hou daarmee rekening met volgende criteria:
vrouwen worden aangesproken als Mv.
mannen worden aangesproken als Mr.
Indien het geslacht ongekend is, wordt de aanspreking Mv./Mr. niet getoond
De naam wordt, ongeacht hoe die in de URL parameters staat, STEEDS getoond als kleine letters,
 waarbij ieder woord/onderdeel van de naam begint met een hoofdletter. => bvb: Hallo Mr. Van De Voorde */

$naam = @$_GET["naam"];
$naam = ucwords(strtolower($naam)); //alles in kleine letters
$naam = ucwords($naam); //eerste letter in hoofdletter
$gender = @$_GET["gender"];
if ($gender == "m") {
    print "Hallo Mr." . $naam;
} elseif ($gender == "f") {
    print "Hallo Mv." . $naam;
} else {
    print "Hallo" . $naam;
}

/* $title = "Mr.";
$name = "familienaam";
echo "Beste $title $name";
dan verandert jij name voor GET
dan maak jij gender
dan doe jij if