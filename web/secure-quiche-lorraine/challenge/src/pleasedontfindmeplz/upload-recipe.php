<?php
session_start();
if (!isset($_SESSION["admin"])) {
    $_SESSION["error_msg"] = "You need to be an admin to create new recipes!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/recipes.php");
    die();
}

if(!isset($_FILES['img'])) {
    $_SESSION["error_msg"] = "You did not send an image!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/create-recipe.php");
    die();
}

$filename = $_FILES['img']['name'];
$temp_file = $_FILES['img']['tmp_name'];

$full_path = "/var/www/html/images/uploads/".$filename;
$img_path = "/images/uploads/".$filename;

if (file_exists($full_path)) {
    $_SESSION["error_msg"] = "File already exists!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/create-recipe.php");
    die();
}

move_uploaded_file($temp_file, $full_path);
?>

<html>
    <head>
        <title>Secure Quiche Lorraine Recipes</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/recipe.css" />
    </head>
    <body>
        <section>
            <div id="grid-item">
                <h1 style="color: rgb(0, 255, 34)">Create a New Secure Quiche Lorraine Recipe</h1>
            </div>
            <div id="grid-item">
                <h3 style="color: rgb(251, 0, 255)">New Quiche Image</h3>
            </div>
            <div id="grid-item">
                <img src="<?php echo $img_path; ?>"></img>
            </div>
        </section>

        <div id="particles-js"></div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/particles.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>