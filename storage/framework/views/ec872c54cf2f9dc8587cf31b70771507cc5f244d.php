<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>All Users</title>
</head>
<body>
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<h4>Username: <?php echo e($post->getUsername()); ?></h4>
		<p>Post Content: <?php echo e($post->getContent()); ?></p>
		
		<br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH D:\xampp\htdocs\CloudApp\resources\views/posts.blade.php ENDPATH**/ ?>