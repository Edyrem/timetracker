<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to TimeTracker</title>
		{{ stylesheet_link('css/main.css') }}
		{{ stylesheet_link('css/bootstrap.min.css') }}
	</head>
	<body>

		{{ content() }}

		{{ javascript_include("js/jquery-3.3.1.min.js") }}
		{{ javascript_include("js/bootstrap.min.js") }}
		{{ javascript_include("js/script.js") }}
	</body>
</html>