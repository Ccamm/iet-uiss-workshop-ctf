<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    $_SESSION["error_msg"] = "You need to login to see my secure quiche lorraine recipes!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/index.php");
    die();
}

function printValue($value, $left = False) {
    $value = htmlspecialchars($value);
    $value = str_replace("\n", "<br />", $value);
    echo "<div id='grid-item'>";
    if (!$left) {
        echo "<p>$value</p>";
    } else {
        echo "<p style='text-align: left;'>$value</p>";
    }
    echo "</div>";
}

include("db.php");
$query = "Lorraine";
if (isset($_GET["query"])) {
    $query = $_GET["query"];
}
$query_result = $db->query("SELECT * FROM recipes WHERE name LIKE '%$query%'");
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
                <h1 style="color: rgb(0, 255, 34)">Secure Quiche Lorraine Recipes</h1>
            </div>
            <div id="grid-item">
                <h3 style="color: rgb(251, 0, 255)">CTF{oH_g0d_wHi_c4n_u_U53_mY_5qL_t0_bIp455_m1_l0g1N!!}</h3>
            </div>

            <div id="grid-item">
                <a href="/pleasedontfindmeplz/admin.php">
                    <input type="submit" style="background-color:rgb(9, 255, 0);color: rgb(255, 0, 234);" value="Admin Login">
                </a>
            </div>

            <div id="grid-item">
                <h3>Search for Recipes</h3>
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

            <form action="/pleasedontfindmeplz/recipes.php" method="get">
                <div id="grid-item">
                    <input type="text" id="query" name="query" placeholder="Search">
                </div>
                <div id="grid-item">
                    <input type="submit" value="Submit" placholder="Search">
                </div>
            </form>

            <?php
                while ($row =$query_result->fetchArray()) {
                    echo "<hr />";
                    $image = $row['image'];
                    echo "<h2>Name</h2><br />";
                    printValue($row["name"]);
                    echo "<img src=$image ></image>";
                    echo "<br /><h2>Ingredients</h2><br />";
                    echo "<div id='recipe'>";
                    printValue($row["ingredients"], True);
                    echo "</div>";
                    echo "<br /><h2>Instructions</h2><br />";
                    echo "<div id='recipe'>";
                    printValue($row["instructions"], True);
                    echo "</div>";
                }
            ?>

        </section>

        <div id="particles-js"></div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/particles.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>