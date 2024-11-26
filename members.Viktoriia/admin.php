<?php

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'todo';
$db_port = 8889;

try {
    $pdo = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//verwijderen 
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
    $stmt->execute([$delete_id]);
    header("Location: admin.php"); // redirects om de lijst bij te werken
    exit;
}

// krijgen alle members van db
$stmt = $pdo->query("SELECT * FROM members ORDER BY created DESC");
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Admin Pagina - Ledenbeheer</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Overzicht van alle gebruikers</h1>
            </header>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Usernaam</th>
                    <th>Geslacht</th>
                    <th>Foto</th>
                    <th>Acties</th>
                </tr>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= $member['id'] ?></td>
                        <td><?= $member['firstname'] ?></td>
                        <td><?= $member['lastname'] ?></td>
                        <td><?= $member['username'] ?></td>
                        <td><?= $member['gender'] ?></td>
                        <td>
                            <?php if (!empty($member['photo'])): ?>
                                <img src="<?= $member['photo'] ?>" alt="Foto" width="50">
                            <?php else: ?>
                                Geen foto
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="admin.php?delete_id=<?= $member['id'] ?>" onclick="return confirm('Weet je zeker dat je dit lid wilt verwijderen?');">Verwijderen</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
</body>

</html>