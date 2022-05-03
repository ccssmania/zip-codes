<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ env('APP_NAME') }}</title>

	<link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}">

</head>
<body class="vh-100">
	@include('sweetalert::alert')
	<div class="container h-100 d-flex justify-content-center align-items-center">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Forbiden</h5>
				
			</div>
		</div>
	</div>
</body>
</html>