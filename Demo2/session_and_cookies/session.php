<!DOCTYPE html>
<?php

// Start a new session
session_start();

// Check if x exist
if (!array_key_exists("x", $_SESSION)) {
    $_SESSION["x"] = 0;
}

// If method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (array_key_exists('button1', $_POST)) {
        $_SESSION["x"] = $_SESSION["x"] + 1;
    }

    if (array_key_exists('logoutbtn', $_POST)) {
        session_destroy();
    }
}
?>
<html>
    <h1>Session demo</h1>
    <p> You have clicked this button: <?php echo $_SESSION["x"] ?> times. </p>
    <form method="post">
        <input type="submit" name="button1" value="Click me" />
    </form>
    <form method="post">
        <input type="submit" name="logoutbtn" value="Log out session"/>
    </form>
</html>