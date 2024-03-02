<?php

require '../Model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $password = $_POST["password"];

    if ($userName == "admin" && $password == "123321") {
        $user = new User($userName, $password);
        header("Location: http://localhost:8433/View/calc.php");
    } else {
        header("Location: http://localhost:8433/View/login.php");
    }
}