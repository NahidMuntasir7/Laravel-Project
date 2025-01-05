<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        @if(count($users) > 0)
            @foreach($users as $user)
            <li>{{$user->name}}</li>
            @endforeach
        @else 
            <p>No users found</p>
        @endif
    </ul>
</body>
</html>