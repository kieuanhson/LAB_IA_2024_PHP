<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculator</h1>
    <form method="POST">
        <div>
            <label>Number 1:</label>
            <input type="number" name="num1" />
        </div>
        <div>
            <label>Number 2:</label>
            <input type="number" name="num2" />
        </div>
        <div>
            <select name="operator">
                <option value="+" selected>+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Calculate" />
        </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["num1"] != '' && $_POST["num2"] != '') {
            $number1 = $_POST["num1"];
            $number2 = $_POST["num2"];

            $operator = $_POST["operator"];

            $finalAnswer = '';

            switch ($operator) {
                case '+':
                    $finalAnswer = $number1 + $number2;
                    break;
                case '-':
                    $finalAnswer = $number1 - $number2;
                    break;
                case '*':
                    $finalAnswer = $number1 * $number2;
                    break;
                case '/':
                    if ($number2 == '0') {
                        echo ('Cannot divide by 0');
                        return;
                    }
                    $finalAnswer = $number1 / $number2;
                    break;
            }
            echo ("<h2>Operator {$operator} of 2 number $number1 and $number2 is {$finalAnswer}.</h2>");
        }
    }
    ?>
</body>

</html>