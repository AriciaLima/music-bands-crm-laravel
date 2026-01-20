<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

    <h1>Register</h1>

    <form method="POST" action="/register">
        @csrf

        <div>
            <input type="text" name="name" placeholder="Name" required>
        </div>

        <div>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button type="submit">Register</button>
    </form>

</body>
</html>
