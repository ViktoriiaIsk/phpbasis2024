<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = @$_GET["id"];

/*if ($id == 1) {
    $name = "Viktoriia";
    $lastname = "Iskrych";
} elseif ($id == 2) {
    $name = "Nicolas";
    $lastname = "Van Lankveld";
} else {
    $name = "Voornaam";
    $lastname = "Familienaam";
}
*/
switch ($id) {
    case 1:
        $name = "Viktoriia";
        $lastname = "Iskrych";
        break;
    case 2:
        $name = "Nicolas";
        $lastname = "Van Lankveld";
        break;
    default:
        $name = "Voornaam";
        $lastname = "Familienaam";
        break;
}

?>
<html>

<head>
    <title>
        Portfolio <?php print $name . " " . $lastname; ?>
    </title>

    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <p>
        <h1><?php print $name . " " . $lastname; ?><br /> </h1>
        </p>
        <p>
        <h1>Student FSD</p>
        </h1>
</body>
<p>
<h2>
    <br />
    Levensgenieter
</h2>
</p>
<p>
    What is Lorem Ipsum?
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
<p>
<p>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
<ul>
    <li><a href="https://www.linkedin.com/" target="_blank" title="Linkedin"> viktoriia.ln </a><br /></li>
    <li><a href="https://www.instagram.com/" target="_blank" title="Instagram"> v.ika@ua</a></li>
    <li><a href="mailto:viktoriia.iskrich123@gmail.com, viktoriia.iskrich123@gmail.com?subject=Testing out mailto!&body=This is only a test!">e-mail</a></li>

</ul>
</p>

<footer>
    <hr>
    <p>
        <small> Copyright 2024 by <?php print  $name . " " . $lastname; ?> </small>
    </p>
</footer>
</main>
</body>

</html>