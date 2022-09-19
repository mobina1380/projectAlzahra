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
</head>
<body>
<!-- partial:index.partial.html -->

<div class="container right-panel-active" id="container">
    <div class="form-container sign-up-container">

        <form action="{{ route('register.custom') }}" method="POST">
            <h1>{{__('public.Sign up')}}</h1>
            @csrf

            <input type="text" placeholder="{{__('public.user name')}} " id="name" class="form-control" name="name"
                   required autofocus>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif


            <input type="text" placeholder="{{__('public.email')}}" id="email_address" class="form-control"
                   name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif


            <input type="password" placeholder="{{__('public.password')}}" id="password" class="form-control"
                   name="password" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            {{--                                <div class="form-group mb-3">--}}
            {{--                                    <div class="checkbox">--}}
            {{--                                        <label><input type="checkbox" name="remember"> Remember Me</label>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">  {{__('public.submit')}}</button>
            </div>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>{{__('public.SignIntext2')}}</h1>
                <p>{{__('public.SignIntext3')}}</p>

                <button class="ghost" id="signIn">   <a href="{{ route('login') }}">{{__('public.Sign in')}}</a></button>

            </div>
            <div class="overlay-panel overlay-right">
                <h1>{{__('public.SignIntext2')}}</h1>
                <p>{{__('public.SignIntext3')}}</p>
                <button class="ghost" id="signUp">{{__('public.Sign up')}}</button>

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
