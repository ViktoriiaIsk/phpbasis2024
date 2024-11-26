<?php
include('data.php');
$id = @$_GET['id'];
?>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cats cats cats</title>
</head>

<body>
    <main>
        <section id="section-1">
            <header>
                <h2>Overzicht katten</h2>
                <p>Mijn katten</p>
            </header>
            <?php foreach ($photos as $index => $url): ?>
                <aside>
                    <a href="cat_detail.php?id=<?php echo $index; ?>">
                        <img src="<?php echo $url; ?>" />
                </aside>
            <?php endforeach; ?>

            <h3>Card heading</h3>
            <p>Card content <sup>with notification</sup></p>
            </aside>
            <aside>
                <h3>Card heading</h3>
                <p>Card content</p>
            </aside>
        </section>

    </main>

</body>

</html>