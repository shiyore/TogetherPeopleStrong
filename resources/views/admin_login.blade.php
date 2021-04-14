@extends('layouts.adminApp')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

@section('content')
		<form action="admin_login" method="post">
			{{csrf_field()}}
			<div class="demo-table">
				<div class="form-head">Login</div>
				<div class="field-column">
					<div>
						<label for="username">Username</label><span id="user_info" class="error-info"></span>
					</div>
					<div>
						<input name="user_name" id="user_name" type="text" class="demo-input-body"/>
						<?php echo $errors->first('user_name')?>
					</div>
				</div>
				<div class="field-column">
					<div>
						<label for="password">Password</label><span id="password_info" class="error-info"></span>
					</div>
					<div>
						<input name="password" id="password" type="text" class="demo-input-body"/>
						<?php echo $errors->first('password')?>
					</div>
				</div>
			</div>
			<div class="field-column">
				<input type="submit" class="btnLogin">
			</div>
		</form>
	@endsection