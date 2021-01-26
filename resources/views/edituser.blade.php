<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Edit User</title>
</head>
<body>
	<form action="doedituser" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
		<input type="hidden" name="oldusername" value="{{ $user }}">
		<h2>Editing {{ $user }}</h2>
		<table>
			<tr>
				<td>Change Username</td>
				<td><input type="text" name="username" value="{{ $user }}" /></td>
			</tr>
			<tr>
				<td>Change Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Continue" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>