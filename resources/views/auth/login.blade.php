@extends('layouts.app')
@section('title')
Library Login
@endsection
@section('content')


<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }} 
                    <span class="login100-form-title p-b-26">
                        Library Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b">
                        <input class="input100" type="text" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye-off"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                     <div class="form-group">
                         
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                          
                        </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                   
                           <a class="txt1 btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
               
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
@endsection
