

    <!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            overflow-x: hidden ;
        }

        .bg {
            animation:slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(-60deg, #4FBDBA 50%, #AEFEFF 50%);
            bottom:0;
            left:-50%;
            opacity:.5;
            position:fixed;
            right:-50%;
            top:0;
            z-index:-1;
        }

        .bg2 {
            animation-direction:alternate-reverse;
            animation-duration:4s;
        }

        .bg3 {
            animation-duration:5s;
        }

        .content {
            background-color:rgba(255,255,255,.8);
            border-radius:.25em;
            box-shadow:0 0 .25em rgba(0,0,0,.25);
            box-sizing:border-box;
            left:50%;
            padding:10vmin;
            position:fixed;
            text-align:center;
            top:50%;
            transform:translate(-50%, -50%);
        }

        h1 {
            font-family:monospace;
        }

        @keyframes slide {
            0% {
                transform:translateX(-25%);
            }
            100% {
                transform:translateX(25%);
            }
        }
    </style>
</head>
<body>
{{--<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand mr-auto" href="#">PositronX</a>--}}
{{--        <a href="{{route('homePage',['name'=>$user[0]->name])}}">صفحه اصلی </a>--}}

{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"--}}
{{--                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav">--}}
{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('signout') }}">خروج</a>--}}
{{--                    </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('homePage',['name'=>$user[0]->name])}}">صفحه اصلی </a>--}}
{{--                </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>--}}
{{--                    </li>--}}
{{--                @endguest--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<div class="row justify-content-center mt-5" >
    <div class="col-4">
        <div class="alert alert-success text-center">
            @if(isset($user[0]->name))
                <p>{{$user[0]->name}}</p>
              خوش آمدید جهت ورود به سایت بر روی لینک زیر کلیک کنید
                <p ><a href="{{route('homePage',['name'=>$user[0]->name])}} " class="text-danger">ورود به سایت</a></p>
                <p class="text-dark"><a href="{{ route('signout') }}" class="text-danger">خروج از حساب کاربری</a></p>

            @endif
        </div>
    </div>
</div>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>


@yield('content')
</body>
</html>
