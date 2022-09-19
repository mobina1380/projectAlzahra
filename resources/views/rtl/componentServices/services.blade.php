
@extends('__master')
@push('Links')
    @component($dir.'.layouts.headerlinks')
        @slot('otherlinks')

            <link rel="stylesheet" href="{{asset('/css/stylePages/aboutus.css')}}">
            <link rel="stylesheet" href="{{asset('/css/stylePages/componentinput.css')}}">
            <style>
                body{
                    background-image: url("{{asset('images/bg-service.jpg')}}") ;
                    background-repeat: no-repeat;
                    background-position: center;
                }


            </style>
        @endslot
    @endcomponent
@endpush
@section('navbar')

    @component($dir.'.layouts.navbar')


        @slot('content')
            <h1 class="text-white mt-5  animated wow zoomInUp mr-5 akhbar" data-wow-delay="0.6s" id="demo1">
                &#10004;@yield('title')
                <br>
                <br>
            </h1>
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="container-xxl  ">
        <div class="container px-lg-5 newques ">
            <section id="services" class="services ">
                <div class="container">

                    <div class="mb-5 text-center mx-auto ">

                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="my-white-box my-text-style mb-5 wow zoomIn mr-5 akhbar" data-wow-delay="0.6s">
                                <span style="font-size:30px">&#128204;</span>@yield('text')
                            </div>
                        </div>
                    </div>

                </div>

            </section><!-- End Services Section -->
        </div>

    </div>

    @stack('othercode')

@endsection
@section('footer')

    <div class="container-fluid   text-light footer wow fadeIn footer" data-wow-delay="0.1s">
        @include($dir.'.layouts.footer')
    </div>

@endsection










