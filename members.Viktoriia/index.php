<?php
print '<pre>';
print_r($_GET);
print '</pre>';


$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'todo';
$db_port = 8889;

$errors = [];

try {
    $pdo = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


if (@$_POST['verzenden'] !== null) {
    // Validation voor "Voornaam"
    $firstname = @$_POST['firstname'];
    if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } elseif (strlen($firstname) > 100) {
        $errors[] = 'Je voornaam is te lang...';
    }

    // Validation voor "Achternaam"
    $lastname = @$_POST['lastname'];
    if (strlen($lastname) == 0) {
        $errors[] = 'Gelieve een achternaam in te vullen.';
    } elseif (strlen($lastname) > 100) {
        $errors[] = 'Je achternaam is te lang...';
    }

    // Validation voor "Gebruikersnaam"
    $username = @$_POST['username'];
    if (strlen($username) == 0) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } elseif (strlen($username) > 20) {
        $errors[] = 'Je gebruikersnaam is te lang...';
    } else {
        // Validation voor usernaam
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM members WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = 'Deze gebruikersnaam is al in gebruik. Kies een andere.';
        }
    }

    // validation voor Geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // validation voor fotos als die bestand
    $photo = trim(@$_POST['foto']);
    if (!empty($photo) && !filter_var($photo, FILTER_VALIDATE_URL)) {
        $errors[] = 'De foto URL is ongeldig.';
    }

    // geen errors - insert 
    if (count($errors) == 0) {
        $stmt = $pdo->prepare("INSERT INTO members (firstname, lastname, username, gender, photo, created, updated) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$firstname, $lastname, $username, $gender, $photo]);
        echo "Registratie succesvol!";
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="Eerste forms">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th a {
            color: white;
        }

        ul.error {
            background-color: red;
            color: white;
        }
    </style>
    <title>Members subscription</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Subscribe</h1>
            </header>

            <?php if (count($errors) > 0): ?>
                <ul class="error">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <p style="text-align: center;">Schrijf je in via onderstaande formulier</p>
            <form action="index.php" method="post">
                <label for="foto">Foto (URL):</label>
                <input type="text" name="foto" id="foto" placeholder="url van jouw foto..." value="<?= @$photo; ?>" />

                <label for="firstname">Voornaam*:</label>
                <input maxlength="100" type="text" id="firstname" name="firstname" size="20" placeholder="Type hier je voornaam..." value="<?= @$firstname; ?>" />

                <label for="lastname">Familienaam*:</label>
                <input maxlength="100" type="text" id="lastname" name="lastname" size="20" placeholder="Type hier je familienaam..." value="<?= @$lastname; ?>" />

                <label for="username">Username*:</label>
                <input maxlength="20" type="text" id="username" name="username" size="20" placeholder="Type hier je gebruikersnaam..." value="<?= @$username; ?>" />

                <label for="gender">Geslacht*:</label>
                <select id="gender" name="gender">
                    <option value="0">- selecteer -</option>
                    <option value="f" <?= (@$_POST['gender'] == 'f' ? 'selected' : ''); ?>>Vrouw</option>
                    <option value="m" <?= (@$_POST['gender'] == 'm' ? 'selected' : ''); ?>>Man</option>
                    <option value="x" <?= (@$_POST['gender'] == 'x' ? 'selected' : ''); ?>>X</option>
                </select>

                <input type="submit" name="verzenden" id="verzenden" value="verzenden" />
            </form>
        </section>
    </main>
</body>

</html>