<?php
session_start();
if (!isset($_SESSION["admin"])) {
    $_SESSION["error_msg"] = "You need to be an admin to create new recipes!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/recipes.php");
    die();
}
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
                <h3 style="color: rgb(251, 0, 255)">CTF{5qLi_4g1N_t0_l34k_mY_4Dm1n_p455w0rd!1one!}</h3>
            </div>

            <div id="grid-item">
                <p>I haven't finished this yet and you can only upload images of quiches..</p>
            </div>

            <div id="grid-item">
                <h3>Add New Recipe</h3>
            </div>

            <div id="grid-item">
                <p><strong id="error-msg" style="color: rgb(255, 51, 0)">
                    <?php
                    session_start();
                    if (isset($_SESSION["error_msg"])) {
                        echo $_SESSION["error_msg"];
                        unset($_SESSION["error_msg"]);
                    }
                    session_write_close();
                    ?>
                </strong></p>
            </div>

            <hr />
            <div id="grid-item">
                <h3>Upload your Quiche Image</h3>
            </div>
            <form action="/pleasedontfindmeplz/upload-recipe.php" method="post" enctype="multipart/form-data">
                <input type="file" id="img" name="img" accept="image/*">
                <input type="submit" value="Submit Recipe">
            </form>
        </section>

        <div id="particles-js"></div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/particles.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>