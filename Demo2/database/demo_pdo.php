<!DOCTYPE html>
<html>
<h1>Demo db</h1>

<?php
include 'db_cnn.php';
/* Query */
// query = "INSERT INTO products (name, price) VALUES ('" . mysqli_real_escape_string($mysqli, $product_name) . "', " . mysqli_real_escape_string($mysqli, $product_price)  . ")";
// $query = "UPDATE products SET price = " . $product_price . " WHERE name = '" . $product_name . "'";
// $query = "DELETE FROM products WHERE name = '" . $product_name . "'";
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