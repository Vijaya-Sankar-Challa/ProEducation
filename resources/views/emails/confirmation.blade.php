<!DOCTYPE html>
<html>
<head>
	<title>Conformation Mail</title>
</head>
<body>
	<h1>Thanks for signing up</h1>

	<p>You need to <a href='{{ url("register/confirm/{$user->token}") }}'>confirm your mail address.</a></p>
</body>
</html>