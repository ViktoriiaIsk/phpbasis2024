<?php
include 'data.php';
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lego Gallery</title>

</head>

<body>
    <main>
        <section>
            <header>
                <h1>Lego Gallery</h1>
                <p>Total: <?php echo count($photos); ?> foto's</p>
            </header>

            <?php foreach ($photos as $key => $photo): ?>

                <aside>
                    <a href="lego_detail.php?id=<?php echo $key; ?>">
                        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt_description']; ?>"
                            style="
                        width: 100%;
                         height: auto;
                          border: 25px solid <?php echo $photo['color']; ?>;
                              box-sizing: border-box;
                               display: block;
                                padding: 0;">
                    </a>
                </aside>


            <?php endforeach; ?>


        </section>
    </main>
</body>

</html>