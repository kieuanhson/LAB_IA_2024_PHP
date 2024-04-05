<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('student.store') }}" method="post">
    @csrf
        <div>
            Address: <input type="text" name="address"/>
        </div>
        <div>
            Date of birth: <input type="date" name="dob"/>
        </div>
        <div>
            First name: <input type="text" name="firstName"/>
        </div>
        <div>
            Last name: <input type="text" name="lastName"/>
        </div>
        <div>
            Class: 
            <select name="class">
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{$class->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Add"/>
        </div>
    </form>
</body>
</html>