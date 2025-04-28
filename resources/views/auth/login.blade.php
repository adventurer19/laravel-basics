<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<form method="POST" action="/login">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="/register">Register here</a></p>
</body>
</html>
