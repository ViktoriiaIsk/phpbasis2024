<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'movie_db';
$db_port = 8889;

try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

$sort = 'titel';
$direction = 'ASC';



if (@$_GET['sort'] != null)

    if (in_array(@$_GET['sort'], ['id', 'title', 'release_year', 'production_studio'])) {
        $temp = @$_GET['sort'];
    }
if (@$_GET['sort'] != null)

    if (in_array(@$_GET['dir'], ['down'])) {
        $direction = 'DESC';
    }

$stmt = $db->prepare($sql);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM movies ORDER BY $sort ASC";

//print '<pre>';
//print_r($movies);
//exit;
?>

<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="Master detail over films">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th a {
            color: white;
        }
    </style>
    <title>Movies</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Movies</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th><a href="?sort=id">id</a></th>
                        <th><a href="?sort=title&sort=<?= ($sort == 'title' && $direction == 'ASC' ? 'down' : 'up'); ?>">Titel</a></th>
                        <th><a href="?sort=release_year&dir=down">Jaar</a></th>
                        <th><a href="?sort=production_studio&dir">Productiehuis</a></th>
                        <th>Genres</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td><b><?= $movie['id']; ?></b></td>
                            <td><?= $movie['title']; ?></td>
                            <td><?= $movie['release_year']; ?></td>
                            <td><?= $movie['production_studio']; ?></td>
                            <td><?= $movie['genres']; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </section>
    </main>

</body>

</html>