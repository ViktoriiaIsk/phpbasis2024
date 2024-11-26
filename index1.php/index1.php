<?php

// CONNECTIE CREDENTIALS
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'phpbasis';
$db_port = 8889;


// CONNECTIE MAKEN MET DE DB
try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

$errors = [];


// TAAK TOEVOEGEN (INDIEN taak AANWEZIG IS IN POST)
$newTask = @$_POST['taak'];
if ($newTask !== null) {
    // VALIDATIE DOORGESTUURDE DATA

    // task moet minstens 3 lang zijn.
    if (strlen($newTask) < 3) {
        $errors[] = 'Task naam is te kort...';
    }

    // task mag niet kristof zijn
    if ($newTask == 'kristof') {
        $errors[] = 'Task mag niet dit zijn...';
    }

    // task mag niet numeriek zijn
    if (is_numeric($newTask)) {
        $errors[] = 'Taken mogen niet numeriek zijn...';
    }

    // INSERT DATA
    if (count($errors) == 0) {
        insertTask($newTask);
    }
}


// PAS STATUS AAN NAAR 0 INDIEN taakId AANWEZIG IN POST
$taakIdToDelete = @$_POST['taakId'];
if ($taakIdToDelete !== null) {
    deleteTask($taakIdToDelete);
}


// HAAL ALLE TASKS OP UIT DE DB
function getTasks(): array
{
    global $db;

    $sql = "SELECT id, name FROM tasks WHERE status = 1 ORDER BY created DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// TAAK TOEVOEGEN
function insertTask(String $name, int $status = 1)
{
    global $db;

    $sql = "INSERT INTO tasks(name, status) VALUES (:taskname, :status)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':taskname' => $name,
        ':status' => $status
    ]);
}

function deleteTask(int $id, bool $soft = true)
{
    global $db;

    if ($soft) {
        $sql = "UPDATE tasks SET status = 0, updated = CURRENT_TIMESTAMP WHERE id = :id";
    } else {
        $sql = "DELETE FROM tasks WHERE id = :id";
    }

    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
}
?>
<?php
include('db.inc.php');

$tasks = getTasks();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        PHP todo app...
    </title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <main>

        <section id="overview">
            <header>
                <h2>Taken</h2>
            </header>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <?= $task['name']; ?>
                        <form method="post" action="index.php">
                            <input type="hidden" id="taakId" name="taakId" value="<?= $task['id']; ?>">
                            <button type="submit">Markeer als klaar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="addform">
            <form method="post" action="index.php">
                <header>
                    <h2>Toevoegen</h2>
                </header>

                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <label for="taak">taak:</label>
                <input type="text" id="taak" name="taak" size="20" placeholder="Voeg hier een taak toe...">

                <!-- <label for="select1">Select label:</label>
                <select id="select1">
                    <option value="option1">option1</option>
                    <option value="option2">option2</option>
                </select> -->

                <button type="submit">Voeg toe</button>
            </form>
        </section>

    </main>
</body>

</html>