<!DOCTYPE html>
<?php


?>
<html>
    <h1>Cookie demo</h1>
    <h3>
    <?php
        if (count($_COOKIE) > 0) {
            echo "Your browser supports cookies";
        } else {
            echo "Your browser doesn't support cookies";
        }

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (array_key_exists("namefield", $_POST)) {
                setcookie("username",$_POST["namefield"]);
            }
            if (array_key_exists("erasebtn", $_POST)) {
                setcookie("username","",time() - 1);
            }
        }
    ?>
    </h3>
    <form method="post">
        <label>
            <?php
                if (!array_key_exists('username', $_COOKIE)) {
                    echo "I don't know you. Can you tell me your name?";
                } else {
                    echo "Hi, " . $_COOKIE['username'] . "! Nice to see you back!";
                }       
            ?>
        </label>
        <br/>
        <input type="text" name="namefield" />
        <br/>
        <input type="submit" name="tellnamebtn" value="That's my name!"/>
    </form>
    <form method="post">
        <input type="submit" name="erasebtn" value="Erase everything"/>
    </form>
</html>