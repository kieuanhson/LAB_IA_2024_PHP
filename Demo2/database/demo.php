<!DOCTYPE html>
<html>
<h1>Demo db</h1>

<?php
include 'db_cnn.php';
/* Query */
$query = 'SELECT * FROM student';
/* Execute the query */
$result = mysqli_query($mysqli, $query);
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

</html>