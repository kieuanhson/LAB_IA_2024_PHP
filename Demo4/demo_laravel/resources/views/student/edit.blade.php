<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('student.update', [$student->id]) }}" method="post">
    @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$student->id}}"/>
        <div>
            Address: <input type="text" name="address" value="{{$student->address}}"/>
        </div>
        <div>
            Date of birth: <input type="date" name="dob" value="{{$student->dob}}"/>
        </div>
        <div>
            First name: <input type="text" name="firstName" value="{{$student->first_name}}"/>
        </div>
        <div>
            Last name: <input type="text" name="lastName" value="{{$student->last_name}}"/>
        </div>
        <div>
            Class:
            <select name="class">
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? "selected" : "" }}>{{$class->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
</body>
</html>
