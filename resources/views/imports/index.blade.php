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
				<h5 class="card-title">Upload import file</h5>
				<form action="{{ route('zipcode.import') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label class="form-label">File</label>
						<input type="file" name="file" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Send</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>