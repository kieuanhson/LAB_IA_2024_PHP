<?php
include "db_cnn.php";
$firstname_err = $lastname_err = $dob_err =  $address_err = '';
$firstname = $lastname = $dob = $addr = $class = '';
//Class
// Tạo query
$query_class = 'SELECT * FROM class';

// Xử lý query
$result_class = mysqli_query($mysqli, $query_class);

// Check lỗi
if (!$result_class) {
    echo 'Query error: ' . mysqli_error($mysqli);
    die();
}
//

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (array_key_exists('field_firstname', $_POST)) {
        if ($_POST['field_firstname'] == '') {
            $firstname_err = 'Firstname required';
        } else {
            $firstname = $_POST['field_firstname'];
        }
    }

    if (array_key_exists('field_lastname', $_POST)) {
        if ($_POST['field_lastname'] == '') {
            $lastname_err = 'Lastname required';
        } else {
            $lastname = $_POST['field_lastname'];
        }
    }

    if (array_key_exists('field_dob', $_POST)) {
        if ($_POST['field_dob'] == '') {
            $dob_err = 'DOB required';
        } else {
            $dob = $_POST['field_dob'];
        }
    }

    if (array_key_exists('field_address', $_POST)) {
        if ($_POST['field_address'] == '') {
            $address_err = 'Address required';
        } else {
            $addr = $_POST['field_address'];
        }
    }

    $class = $_POST['field_class'];

    // Goi query
    // Tạo query
    $query_std = 'INSERT INTO student (`address`, dob, first_name, last_name, class_id) VALUES ("'
        .mysqli_real_escape_string($mysqli, $addr).'","'
        .mysqli_real_escape_string($mysqli, date_format(date_create($dob), 'Y-m-d')).'","'
        .mysqli_real_escape_string($mysqli, $firstname).'","'
        .mysqli_real_escape_string($mysqli, $lastname).'",'.
        $class.
    ')';

    echo $query_std;

    // Xử lý query
    mysqli_execute_query($mysqli,$query_std);
    

    // Check lỗi
    if (!$result_class) {
        echo 'Query error: ' . mysqli_error($mysqli);
        die();
    }
    //
    //
}
//
?>
<!DOCTYPE html>
<style>
    th,
    td,
    table {
        border: 1px solid black;
    }
</style>
<h1> Add new student </h1>
<form method="post">
    <label> First name </label>
    <input type="text" name="field_firstname" />
    <label style="color:red"><?php echo $firstname_err ?></label>
    <br />

    <label> Last name </label>
    <input type="text" name="field_lastname" />
    <label style="color:red"><?php echo $lastname_err ?></label><br />

    <label> DOB </label>
    <input type="date" name="field_dob" /><label style="color:red"><?php echo $dob_err ?></label><br />

    <label> Address </label>
    <input type="text" name="field_address" /><label style="color:red"><?php echo $address_err ?></label><br />

    <label> Class </label>
    <select name="field_class">
        <?php
        while ($row = mysqli_fetch_assoc($result_class)) {
            echo
            '
                <option value="' . $row["id"] . '">' . $row["class_name"] . '</option>
                ';
        }
        ?>

    </select><br />
    <input type="submit" value="Add new student" />
</form>
<html>