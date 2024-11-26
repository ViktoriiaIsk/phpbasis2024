<?php
$height = @$_GET["height"];
if ($height === null) {
    $height = 21;
}
for ($i = 1; $i <= $height; $i += 2) {
    $spatie = floor($height - $i) / 2;
    echo str_repeat("&nbsp", $spatie); // &nbsp spatie , <pre></pre> code mooie tonen
    $char = "*";

    echo str_repeat("*", $i);
    echo str_repeat("&nbsp", $spatie);
    echo "<br >";
}
