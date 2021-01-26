<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Create a post</title>
</head>
<body>
	<h2 align="center">Create a post</h2>
	<form action="docreate" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
		<table align="center">
			<tr>
				<td>Enter post: <br/></td>
				<td><textarea rows="10" cols="100" name="content"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Create" />
				</td>
			</tr>
		</table>
	</form>
</html><?php /**PATH D:\xampp\htdocs\CloudApp\resources\views/createpost.blade.php ENDPATH**/ ?>