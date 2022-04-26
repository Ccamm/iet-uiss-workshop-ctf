<?php
include("db.php");

if (isset($_SESSION["logged_in"])) {
    header("Location: /pleasedontfindmeplz/recipes.php");
    die();
} else if (isset($_POST)) {
    if (isset($_POST["username"])&& isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $users_result = $db->querySingle("SELECT COUNT(DISTINCT 'id') FROM 'users' WHERE username = '$username' and password = '$password'");
        if ($users_result === 1) {
            session_start();
			$_SESSION["logged_in"] = True;
			session_write_close();
			header("Location: /pleasedontfindmeplz/recipes.php");
			die();
        } else {
            session_start();
            $_SESSION["error_msg"] = "Incorrect username or password!";
            session_write_close();
            header("Location: /pleasedontfindmeplz/index.php");
            die();
        }
    } else {
        session_start();
        $_SESSION["error_msg"] = "Invalid request sent!";
		session_write_close();
        header("Location: /pleasedontfindmeplz/index.php");
        die();
    }
} else {
    session_start();
    $_SESSION["error_msg"] = "Invalid request sent!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/index.php");
    die();
}
?>