<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<h1>Selamat datang di Dashboard</h1>
<p>Anda telah berhasil login.</p>
<form action="{{ route('logout') }}" method="post">
@csrf
<input type="submit" value="Logout">
</form>
</body>
</html>