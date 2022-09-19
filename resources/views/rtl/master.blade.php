
@extends('__master')
@push('Links')

    <link href="{{asset('/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/owlcarousel/asse ts/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('/css/stylecolor.css')}}">
    <link href="https://v1.fontapi.ir/css/Vazir" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/scrollup.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/resources/demos/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/screenbehavior.css')}}">
    <link rel="stylesheet" href="{{asset('/css/stylePages/addstylehome.css')}}">
    <script src="{{asset('/js/animatetext.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="{{asset('/js/co
ustom.js')}}" defer></script>
    <script src="{{ asset('/lib/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



    <style>
        ul.btn-toggle-nav > .nav-item{
            padding-right:10px !important; ;
        }
    .show >ul >li  >ul >ul > li> button{
            padding-right: 20px !important;

        }


        #microphone {
            position: relative;
            right: 45%;
            border: none;
            bottom: 35px;
            background-color: transparent;
            font-weight: bold;
            color: #0c5460;
            cursor: pointer;
        }
        .modal-backdrop.show {
            opacity: 0;
        }
        .modal-backdrop.show {
            background-color: transparent !important;

        }
        .modal-content a{
            cursor: pointer;
        }
        .hero-header {
            margin-bottom: 6rem;
            padding: 18rem 0;
            background-color: red !important;
        }
        .carousel-inner img{
            height: 500px ;
        }
        .navbar{
            background-color: white;
            color:black;
        }
        .universites{
            width: 600px;
        }
        .universites  a{
            padding: 3px;
            font-size: 14px;
            color:#528125;
        }
        .universites ul{
            list-style: square;

        }
     .universites   ul li::before {

            color: red;

        }
    </style>
@endpush
                 @section('loader')
    <div class="loader_bg">
{{--        <div class="logofirst"><img src="{{ asset('/images/logoalzahra.png') }}" class="" alt=""/></div>--}}
{{--      --}}
        <div class="loader"><img src="{{ asset('/images/loder1.gif') }}" alt="" style="width: 100px;height: 100px"/>


        </div>
    </div>
@endsection
                 @section('navbar')
    @component($dir.'.layouts.navbar')


        @slot('content')

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('images/1c.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/2c.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/3c.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>




                @endslot
                @endcomponent
                @endsection
                @section('content')
                    @include($dir.'.layouts.content')
                @endsection
                @section('footer')

                    <div class="container-xxl   text-light footer wow fadeIn footer" data-wow-delay="0.1s">
                        @include($dir.'.layouts.footer')
                    </div>
            @endsection
                @push('js-libraries')
                <!-- JavaScript Libraries -->

                    <script src="{{asset('lib/typed/typed.min.js')}}"></script>


            @endpush
