<?php
include 'db_cnn.php';

$addr = "Quảng Ninh";
$class = "2";

$query = "SELECT * FROM student WHERE `address` = ? AND class_id = ? ?";
$stmt = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($stmt, "ss", $addr, $class);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

/*
if(mysqli_num_rows($result) == 0) {
    echo "Invalid username or password.";
} else {
    echo "Login successful.";
}

*/

/* Check for errors */
if (!$result)
{
   echo 'Query error: ' . mysqli_error($mysqli);
   die();
}
/* Iterate through the result set */
while ($row = mysqli_fetch_assoc($result))
{
   echo 'Student name: ' . $row['first_name'];
}
?>