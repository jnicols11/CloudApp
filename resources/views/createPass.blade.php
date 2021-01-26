<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Post Created</title>
</head>
<body>
	<h2>Post Created Successfully!</h2>
	<h4>Username: {{ $model->getUsername() }}</h4>
	<br/>
	<p>Content: {{ $model->getContent() }}</p>
</body>
</html>