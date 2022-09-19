



<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>{{__('public.title')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('/images/ok1.png')}}" rel="icon" />
    <meta name="keywords" content="پرس و جوی دینی ، پرسش و پاسخ  ، پارسا"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">
    <link href="https://v1.fontapi.ir/css/Vazir" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/csslogin/stylelogin.css')}}">
    <style>
        @media (max-width: 500px) {
            .overlay-right h1 {
                font-size: 15px !important;
            }
            #signUp{
                font-size: 15px !important;
            }
            form h1{
                font-size: 15px !important;
            }
        }

    </style>
</head>
<body>
<!-- partial:index.partial.html -->

<div class="container" id="container">

    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>{{__('public.Sign in')}}</h1>



                    <input id="user_name" type="text" class="form-control @error('email') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus placeholder="{{__('public.user name')}}" >

                    @error('user_name')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror



                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{__('public.password')}}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    {{--                                    <div class="form-check">--}}
                    {{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                                        <label class="form-check-label" for="remember">--}}
                    {{--                                            {{ __('Remember Me') }}--}}
                    {{--                                        </label>--}}
                    {{--                                    </div>--}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
{{--                    <a href="{{ route('register-user') }}">حساب کاربری ندارم</a>--}}
                </div>
            </div>
            <br>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                       {{__('public.Sign in')}}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">


                <button class="ghost" id="signIn"> {{__('public.Sign in')}}</button>
            </div>
            <div class="overlay-panel overlay-right">


                <h1>داشبورد ادمین</h1>


            </div>
        </div>
    </div>
</div>
<a href="/{{App::getLocale()}}">{{__('public.Return to main page')}}</a>

<!-- partial -->
<script  src="./script.js"></script>
{{--<script>--}}
{{--    const signUpButton = document.getElementById('signUp');--}}
{{--    const signInButton = document.getElementById('signIn');--}}
{{--    const container = document.getElementById('container');--}}

{{--    signUpButton.addEventListener('click', () => {--}}
{{--    container.classList.add("right-panel-active");--}}
{{--    });--}}

{{--    signInButton.addEventListener('click', () => {--}}
{{--    container.classList.remove("right-panel-active");--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>








{{--@extends('auth.dashboard')--}}
{{--@section('content')--}}
{{--        <div class="container mt-5">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="card" style="z-index: 2000">--}}
{{--                    <div class="card-header text-center">ورود</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}


{{--                            <div class="row mb-3">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('public.email') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('public.password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <a href="{{ route('register-user') }}">حساب کاربری ندارم</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                       ورود--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--    </div>--}}
{{--        <div class="bg"></div>--}}
{{--        <div class="bg bg2"></div>--}}
{{--        <div class="bg bg3"></div>--}}


{{--@endsection--}}
