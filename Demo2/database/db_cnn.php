<?php
/* Connection parameters */
$host = 'localhost';
$user = 'root';
$password = 'Dung6c@@';
$dbname = 'student_management';
/* Connect to the database */
$mysqli = mysqli_connect($host, $user, $password, $dbname);
/* Check for errors */
if (mysqli_connect_errno())
{
   echo 'Connection failed: ' . mysqli_connect_error();
   die();
} else {
    echo 'Connection successful';
}
?>