<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Register</title>
</head>
<body>
	<form action="doregister" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
		<h2>Register</h2>
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Register" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>