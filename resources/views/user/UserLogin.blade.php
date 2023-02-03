@extends('Userslayouts.userloginApp')
@section('content')
<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                    <a href=""><img src="{{asset('images/admin/rest.jpg')}}" alt="" width="60px"></a>
									</div>
                                    <h4 class="text-center mb-4">{{ __('Sign in your account') }}</h4>
                                    @if (session('message'))
                                    <div class="alert-success" style="text-align: center">{{session('message')}}</div>
                                    @endif
                                    @if (session('Credentials'))
                                    <div class="alert-danger" style="text-align: center">{{session('Credentials')}}</div>
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert-danger" style="text-align: center">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    
                                    <form method="post" action="{{url('user/auth')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('User Login ID') }}</strong></label>
                                            <span class="text-danger">*</span>
                                            <input id="UserMobile" type="text" class="form-control" name="UserMobile" value="{{ old('UserMobile') }}" required placeholder="Enter Your Mobile Number" autocomplete="UserMobile" autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('Password') }}</strong></label>
                                            <span class="text-danger">*</span>
                                            <input id="Password" type="password" class="form-control" name="Password" required autocomplete="Password" placeholder="Enter Your Password" autofocus>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
													<label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
												</div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{url('user/registration')}}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection