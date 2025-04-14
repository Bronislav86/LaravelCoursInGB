<html>
<head>
    <title>List of Users</title>
</head>
<body>
    <h1>List of users</h1>
    <table border="2">
        @foreach($users as $user)
            <tr><td>{{ $user->first_name }}</td><td>{{ $user->email }}</td></tr>
        @endforeach
    </table>
</body>
</html>
