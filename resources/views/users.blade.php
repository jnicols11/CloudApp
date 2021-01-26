<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>All Users</title>
</head>
<body>
	@foreach($users as $user)
		<h4>Username: {{ $user->getUsername() }}</h4>
		<form action="edituser" method="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
			<table>
				<tr>
					<td>
						<input type="hidden" name="username" value="{{ $user->getUsername() }}">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="Edit" />
					</td>
				</tr>
			</table>
		</form>
		
		<form action="deleteuser" method="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
			<table>
				<tr>
					<td>
						<input type="hidden" name="username" value="{{ $user->getUsername() }}">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="Delete" />
					</td>
				</tr>
			</table>
		</form>
		<br>
	@endforeach
</body>
</html>