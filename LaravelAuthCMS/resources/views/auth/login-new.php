@extends('layouts.app')

@section('content')
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Sign in to continue to {{ config('app.name', 'Laravel') }}.</h5>
                        <form class="form-horizontal m-t-30"  method="POST" action="{{ route('login') }}">
                        @csrf

                            <div class="form-group">
                                <div class="col-12">
                                        <label>{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
                            </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary">
                                            <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                                  </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                </div>
                            </div>
    
                            <div class="form-group row m-t-30 m-b-0">
                            @if (Route::has('password.request'))
                                <div class="col-sm-7">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> {{ __('Forgot Your Password?') }}</a>
                                </div>
                                @endif
                                @if (Route::has('register'))
                                <div class="col-sm-5 text-right">
                                    <a href="{{ route('register') }}" class="text-muted">Create an account</a>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->
@endsection