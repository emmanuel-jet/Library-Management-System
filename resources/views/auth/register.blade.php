@extends('layouts.app')

@section('title')
Create Admin
@endsection

@section('content')
	<div class="limiter">
	<div class="container-login100">
    <div class="wrap-login100">
			<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}
					<span class="login100-form-title p-b-26">
						Register New Admin
					</span>
					<div class="wrap-input100 validate-input form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<input id="name" type="text" class="input100" name="name" value="{{ old('name') }}" required autofocus>
						<span class="focus-input100" data-placeholder="Name"></span>
						@if ($errors->has('name'))
							<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
							</span>
					@endif
					</div>
					<div class="wrap-input100 validate-input form-group{{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Valid email is: example@domian.com">
						<input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required>
						<span class="focus-input100" data-placeholder="Email"></span>
						@if ($errors->has('email'))
						<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					</div>
					<div class="wrap-input100 validate-input form-group{{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye-off"></i>
						</span>
						<input id="password" type="password" class="input100" name="password" required>
						@if ($errors->has('password'))
							<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye-off"></i>
						</span>
						<input id="password-confirm" type="password" class="input100" name="password_confirmation" required>
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button type="submit" class="login100-form-btn">
										Register
								</button>
							</div>
					</div>
			</form>
		</div>
	</div>
</div>	

<div id="dropDownSelect1"></div>

@endsection