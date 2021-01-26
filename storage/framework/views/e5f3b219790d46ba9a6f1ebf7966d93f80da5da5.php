<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>All Users</title>
</head>
<body>
	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<h4>Username: <?php echo e($user->getUsername()); ?></h4>
		<form action="edituser" method="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
			<table>
				<tr>
					<td>
						<input type="hidden" name="username" value="<?php echo e($user->getUsername()); ?>">
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
						<input type="hidden" name="username" value="<?php echo e($user->getUsername()); ?>">
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
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH D:\xampp\htdocs\CloudApp\resources\views/users.blade.php ENDPATH**/ ?>