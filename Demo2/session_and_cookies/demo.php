<!DOCTYPE html>
<html>
    <h1>Demo session and cookie</h1>
    <?php
        echo "Hi";
    ?>
</html>

<?php

// Method
//setcookie(name, value, expire, path, domain, secure, httponly);

//set cookie
setcookie("my_first_cookie","It contains a string");

// 1 day cookie
setcookie("my_first_cookie","It contains a string", time() + (86400), "/"); // 86400 = 1 day

// Update cookie
setcookie("my_first_cookie","It contains a string", time() + (86400 * 2), "/"); // 86400 = 1 day

// Kinda delete cookie
setcookie("my_first_cookie","", time() - 3600);

// Check allow cookie
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
  } else {
    echo "Cookies are disabled.";
  }

// store data
$_SESSION['username'] = "JohnDoe";

// Get data
echo $_SESSION['username']; // will output "JohnDoe"

// Del data
unset($_SESSION['username']);

session_start();
session_destroy();
?>