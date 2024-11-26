<?php
$getal = 123;
$list = ["Vinnie", "Nicolas", "Joppe", "Kevin", 50];
$list[] = "Matthice";
echo $list[4];
echo "<pre>";
print_r($list);
// var_dump($list);
echo "</pre>";
// exit; - stopt de code 
for ($i = 0; $i <= count($list); $i++)
    echo "<li>$list[$i]</li>";
/* of 
foreach ($list as $index => $person) {
    echo "<li>$person</li>";
}
*/
