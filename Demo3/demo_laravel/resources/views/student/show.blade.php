<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Address: {{ $student->address }} <br/>
    Date of birth: {{ $student->dob }} <br/>
    First name: {{ $student->first_name }} <br/>
    Last name: {{ $student->last_name }} <br/>
    Class: {{ $student->class_name }} <br/>
</body>
</html>