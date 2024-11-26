<?php
$answers = ['Don\'t count on it.', 'My reply is no.', 'My sources say no.', 'Outlook not so good.', 'Very doubtful.']; // Функция для генерации случайного ключаfunction 
function getRandomAnswer()
{
  global $answers;
  $random = array_rand($answers);
  return $random;
}
$previousKey = isset($_GET['id']) ? $_GET['id'] : null; //save previous answer
$newKey = getRandomAnswer();
$answer = $answers[$newKey]; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magic 8-Ball</title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    main {
      text-align: center;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007BFF;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <main> <?php if ($previousKey !== null): ?>
      <h2><?php echo $answers[$previousKey]; ?></h2> <a href="ball.php?id=<?php echo $newKey; ?>">ASK AGAIN</a> <?php else: ?> <a href="ball.php?id=<?php echo $newKey; ?>">ASK B-BALL</a> <?php endif; ?>
  </main>
</body>

</html>