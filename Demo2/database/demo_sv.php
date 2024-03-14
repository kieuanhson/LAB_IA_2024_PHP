<?php
include "db_cnn.php";

// Tạo query
$query = 'SELECT * FROM student';

// Xử lý query
$result = mysqli_query($mysqli, $query);

// Check lỗi
if (!$result)
{
   echo 'Query error: ' . mysqli_error($mysqli);
   die();
}
?>
<!DOCTYPE html>
    <style>
        th, td, table {
            border: 1px solid black;
        }
     </style>
     <h1> Student List </h1>
    <table>
        <thead> <!-- Tiêu đề -->
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Địa chỉ</th>
                <th>Ngày tháng năm sinh</th>
            </tr>
        </thead>
        <tbody> <!-- Hiển thị các record -->
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo 
                '
                <tr>
                    <td>'.$row["id"] .'</td>
                    <td>'.$row["last_name"]. ' '. $row["first_name"] .'</td>
                    <td>'.$row["address"].'</td>
                    <td>'.$row["dob"].'</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>
<html>