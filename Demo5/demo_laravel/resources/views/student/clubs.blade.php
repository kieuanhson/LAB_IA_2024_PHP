<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        @foreach($club as $clubs)
            <tr>
                <td>{{ $club->club_name }}</td>
                
            </tr>
        @endforeach
</table>
</body>
</html>