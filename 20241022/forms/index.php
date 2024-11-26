<?php
//print '<pre>';
//print_r($_POST);
//print '</pre>';
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
    </style>
    <title>Formulieren</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Subscribe</h1>
            </header>
            <p> schrijf je in via onderstaande formulier. </p>
            <form action="index.php" method="post">
                <label for="firstname">Voornaam*:</label>
                <input type="text" name="firstname" id="firstname" placeholder="type hier jouw voornaam..." required />

                <label for="lastname">Familienaam*:</label>
                <input type="text" name="lastname" id="lastname" placeholder="type hier jouw familienaam..." required />

                <label for="email">Email*:</label>
                <input type="text" name="email" id="email" placeholder="type hier jouw email..." required />

                <label for="gender">Geslacht:</label>
                <input type="radio" name="gender" id="genderMale" value="male" /> <label for="genderMale">Man</label><br />
                <input type="radio" name="gender" id="genderFemale" value="female" /><label for="genderFemale">Vrouw</label><br />
                <input type="radio" name="gender" id="genderX" value="x" /><label for="genderX">X</label><br />

                <label for="message">Jouw bericht:</label>

                <textarea id="message" name="message" rows="4" cols="50"></textarea>

                <input type="submit" name="submit" id="submit" value="verzenden" />

            </form>

        </section>
    </main>

</body>

</html>