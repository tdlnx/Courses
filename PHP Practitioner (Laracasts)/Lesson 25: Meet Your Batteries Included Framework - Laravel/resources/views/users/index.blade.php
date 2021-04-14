<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <h1>All Users</h1>

    @foreach ($users as $user)
    <li>{{$user->name}}</li>
    @endforeach

    <h2>Add User</h2>
    <form method="POST" action="/users">
        {{ csrf_field() }}
        <p>
            <input type="text" name="name" placeholder="Name" required>
        </p>
        <p>
            <input type="email" name="email" placeholder="Email" required>
        </p>
        <p>
            <input type="password" name="password" placeholder="Password" required>
        </p>
        <button type="submit">Add User</button>
    </form>

</body>

</html>