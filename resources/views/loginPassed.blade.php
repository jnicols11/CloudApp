<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Login Passed</title>
</head>
<body>
	<h2>Login Success!</h2>
	<h3>Welcome back, {{ $model->getUsername() }}</h3>
	<a href="./">Go Home</a>
</body>
</html>