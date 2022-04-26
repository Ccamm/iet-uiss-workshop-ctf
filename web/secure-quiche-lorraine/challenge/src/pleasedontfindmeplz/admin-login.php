<?php
include("db.php");

if (isset($_SESSION["admin"])) {
    header("Location: /pleasedontfindmeplz/create-recipe.php");
    die();
} else if (isset($_POST)) {
    if (isset($_POST["username"])&& isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmt = $db->prepare('SELECT COUNT(DISTINCT "id") FROM admins WHERE username=:u and password=:p');
        $stmt->bindValue(':u', $username);
        $stmt->bindValue(':p', $password);
        $users_result = $stmt->execute()->fetchArray()[0];
        if ($users_result === 1) {
            session_start();
			$_SESSION["admin"] = True;
			session_write_close();
			header("Location: /pleasedontfindmeplz/create-recipe.php");
			die();
        } else {
            session_start();
            $_SESSION["error_msg"] = "Incorrect username or password!";
            session_write_close();
            header("Location: /pleasedontfindmeplz/admin.php");
            die();
        }
    } else {
        session_start();
        $_SESSION["error_msg"] = "Invalid request sent!";
		session_write_close();
        header("Location: /pleasedontfindmeplz/admin.php");
        die();
    }
} else {
    session_start();
    $_SESSION["error_msg"] = "Invalid request sent!";
    session_write_close();
    header("Location: /pleasedontfindmeplz/admin.php");
    die();
}
?>