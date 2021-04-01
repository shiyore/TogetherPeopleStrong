@extends('layouts.app')

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