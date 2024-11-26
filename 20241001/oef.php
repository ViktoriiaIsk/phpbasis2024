<?php
$start = @$_GET["start"]; // startgetal
$count = $start + @$_GET["count"]; // hoevel keer
$som = 0;

for ($i = $start; $i < $count; $i++) {
    echo "$i <br >";
    $som = $som + $i;
}
echo "De som van de getallen van $start tot $count = $som + $i";
