<?php
include('data.php');

$id = @$_GET['id'];

if ($id === null) {
    $id = 0;
}

if (!isset($photos[$id])) {
    $id = 0;
}

$photo = $photos[$id];
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
                <h1>Detail Lego Photo</h1>
            </header>

            <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt_description']; ?>" style="border: 25px solid <?php echo $photo['color']; ?>; max-width: 100%; height: auto;">
            <p><strong></strong> <?php echo $photo['description']; ?></p>
            <p>Author: <a href="<?php echo $photo['user']['link']; ?>"><?php echo $photo['user']['first_name'] . ' ' . $photo['user']['last_name']; ?></a></p>
            <p>Likes: <?php echo $photo['likes']; ?></p>
            <p><a href="<?php echo $photo['link']; ?>" target="_blank">View on Unsplash</a></p>
            <p><a href="lego.php">Back to gallery</a></p>
        </section>
    </main>
</body>

</html>


</section>
</main>

</body>

</html>