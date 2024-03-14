<!DOCTYPE html>
<?php
include "db_cnn.php";
/*
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
*/
// Tạo session
session_start();
//
$username_err = $password_err = '';
$username = $password = '';
$login_fail_err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (array_key_exists('logout_btn',$_POST)) {
        unset($_SESSION["username"]);
    }

    if (array_key_exists('username', $_POST)) {
        if ($_POST['username'] == '') {
            $username_err = 'Username required';
        } else {
            $username = $_POST['username'];
        }
    }

    if (array_key_exists('password', $_POST)) {
        if ($_POST['password'] == '') {
            $password_err = 'Password required';
        } else {
            $password = $_POST['password'];
        }
    }

    // Nếu như không có error
    if ($username_err == '' && $password_err == '' && !array_key_exists('logout_btn',$_POST)) {
        $query = "SELECT username FROM user WHERE `username` = ? AND password = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        echo $query;
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 0) {
            $login_fail_err = 'Incorrect username or password!';
        } else {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["username"] = $row["username"];
            $login_fail_err = 'Login successful';
        }
    }
}
?>
<html>
<h1> Login </h1>
<label style='color:red'><?php echo $login_fail_err ?></label>
<form method="post">
    <h3> 
        <?php
            if (array_key_exists("username", $_SESSION)) {
                echo "Detected login user: ".  $_SESSION["username"];
            }
        ?>
    </h3>

    Username: <input type="text" name="username"> <label style='color:red'><?php echo $username_err ?></label> <br />

    Password: <input type="text" name="password"> <label style='color:red'><?php echo $password_err ?></label><br />

    <input type="submit" value="Login" />
</form>
<form method='post'>
<input type="submit" name="logout_btn" value="Logout" />     
</form>



</html>