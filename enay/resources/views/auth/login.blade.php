@extends('layouts.app')

@section('content')
    <div class="container login-container">
        <div class="row">
            <div id="col-md-6 left">
                <div class="logopic">
                    <img src="images/enay logo.png" alt="enay logo">
                </div>
            </div>
        
    <div class="col-md-6 right">
        <div class="login">
             <h3>LOGIN</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row email_box">
                            <div class="col-md-12 username">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            <input for="email" type="email" placeholder="EMAIL" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                    <!--  <input type="password" class="form-control" placeholder="PASSWORD" value="" /> -->
                            <div class="col-md-12 pass">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>                                
                                <input id="password" type="password" placeholder="PASSWORD" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary login_btn">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link pull-right forgot_pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
