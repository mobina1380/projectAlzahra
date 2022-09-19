@extends('__master')
@push('Links')
    @component($dir.'.layouts.headerlinks')
        @slot('otherlinks')
            <link rel="stylesheet" href="{{asset('/css/stylePages/aboutus.css')}}">
        @endslot
    @endcomponent



@endpush
@section('navbar')

    @component($dir.'.layouts.navbar')


        @slot('content')
            <h1 class="text-white mt-5  animated wow zoomInUp mr-5 akhbar" data-wow-delay="0.6s" id="demo1">
                {{ __('public.aboutus') }}
                <br>
                <br>

            </h1>
        @endslot
    @endcomponent
@endsection
@section('content')
    @include($dir.'.layouts.contentaboutus')

@endsection
@section('footer')

    <div class="container-fluid   text-light footer wow fadeIn footer" data-wow-delay="0.1s">
        @include($dir.'.layouts.footer')
    </div>

@endsection





