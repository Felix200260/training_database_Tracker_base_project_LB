{{-- resources/views/user/edit.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Редактирование пользователя</h2>
    <form method="post" action="{{ url('/users/' . $user->id) }}">
        @csrf
        @method('PUT')

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}">

        <button type="submit">Update User</button>
    </form>
</body>
</html>
