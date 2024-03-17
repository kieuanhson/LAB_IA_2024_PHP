<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <button onclick="window.location='{{ route('student.create') }}'">Create a student</button>
    </div>
    <table>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->address }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->className }}</td>
                <td><a href="{{route('student.show', ["student" => $student->id])}}">Show</a></td>
                <td><a href="{{route('student.edit', ["student" => $student->id])}}">Edit</a></td>
                <td>
                    <form method="post" action="{{route('student.destroy', ["student" => $student->id])}}">
                        @method('delete')
                        @csrf
                    <input type="submit" value="Destroy"/>
                    </form>
                </td>
            </tr>
        @endforeach
</table>
</body>
</html>