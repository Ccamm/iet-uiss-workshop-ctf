<html>
    <head>
        <title>Secure Quiche Lorraine Recipes</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css" />
    </head>
    <body>
        <section>
            <div id="grid-item">
                <h1 style="color: rgb(0, 255, 34)">Admin Login</h1>
            </div>
            <div id="grid-item">
                <img src="/images/mmmquiche.gif" />
            </div>

            <div id="grid-item">
                <h3>Login</h3>
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

            <form action="/pleasedontfindmeplz/admin-login.php" method="post">
                <div id="grid-item">
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
                <div id="grid-item">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <div id="grid-item">
                    <input type="submit" value="Submit" placholder="Submit">
                </div>
            </form>

        </section>

        <div id="particles-js"></div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/particles.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>