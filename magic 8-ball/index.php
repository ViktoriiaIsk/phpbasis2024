<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//importeren de array met antwoorden 
include 'data.php';

//is er een vorige antwoord-ID? sla op in previous key
$previousKey = isset($_GET['id']) ? $_GET['id'] : null;

//genereren een willekeurige index van de antwoordarray
function getRandomAnswer()
{
    global $answers;
    $random = array_rand($answers);
    return $random;
}
// zolang de niuwe gegenereerde sleutel gelijk is aan de vorige => blijft een nieuwe sleutel genereren
do {
    $newKey = getRandomAnswer();
} while ($newKey == $previousKey);  //herhaal totdat een niuewe sleutel is gegenereerd
// haal het antwoord op basis van de nieuwe sleutel
$answer = $answers[$newKey];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic 8-Ball</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <h1>Magic 8-Ball</h1>
        <p><strong><?php echo $answer; ?></strong></p>
        <form method="GET"> <button type="submit" name="id" value="<?php echo $newKey; ?>">
                <?php echo isset($_GET['id']) ? 'ASK AGAIN' : 'ASK 8-BALL'; ?> </button> </form>
    </main>
</body>

</html>