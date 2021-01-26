<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>All Users</title>
</head>
<body>
	@foreach($posts as $post)
		<h4>Username: {{ $post->getUsername() }}</h4>
		<p>Post Content: {{ $post->getContent() }}</p>
		
		<br>
	@endforeach
</body>
</html>