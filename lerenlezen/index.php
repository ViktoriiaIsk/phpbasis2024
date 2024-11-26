<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'phpbasis';
$db_port = 8889;
try {
    $pdo = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//select random img from database
$query = "SELECT * FROM lerenlezen ORDER BY RAND() LIMIT 1";
$statement = $pdo->query($query);
$image = $statement->fetch(PDO::FETCH_ASSOC);
//select random names from db
$query_names = "SELECT id, name FROM lerenlezen WHERE id != :id ORDER BY RAND() LIMIT 3";
$statement_names = $pdo->prepare($query_names);
$statement_names->execute(['id' => $image['id']]);
$other_names = $statement_names->fetchAll(PDO::FETCH_ASSOC);
//adding names to radio buttons
$options = $other_names;
$options[] = [
    'id' => $image['id'],
    'name' => $image['name'],
    'correct_answer' => true
];
shuffle($options); // mix the variants
$feedback = '';
if (isset($_GET['answerId'])) {
    $user_answer_id = (int)$_GET['answerId'];
    $correct_id = (int)$_GET['correctId'];
    if ($user_answer_id === $correct_id) {
        $feedback = "Correct!";
    } else {
        $feedback = "Wrong!";
    }
}
// print '<pre>';
// print_r($feedback);
// print '</pre>';
// print '<pre>';
// print_r($_GET);
// print '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <form method="GET">
        <header>
            <?php if ($feedback) : ?>
                <p class="feedback"><?= $feedback ?></p>
            <?php endif; ?>
            <h1>What is on the picture?</h1>
            <img alt="<?= $image['name'] ?>" src="<?= $image['photo'] ?>" height="200">
        </header>
        <?php foreach ($options as $option) : ?>
            <input type="radio" id="option-<?= $option['id'] ?>" name="answerId" value="<?= $option['id'] ?>" required>
            <label for="option<?= $option['id'] ?>"><?= $option['name'] ?></label>
        <?php endforeach; ?>
        <input type="hidden" name="correctId" value="<?= $image['id'] ?>"><br>
        <button type="submit" id="show">OK</button>
    </form>
</body>