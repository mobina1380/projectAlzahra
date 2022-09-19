
@extends('__master')
@push('Links')
    @component($dir.'.layouts.headerlinks')
        @slot('otherlinks')
            <link rel="stylesheet" href="{{asset('/css/stylePages/dyscriptslinks.css')}}">
            <style>

                #hero .btn-scroll {
                    transition: 0.4s;
                    color: rgba(255, 255, 255, 0.6);
                    animation: up-down 1s ease-in-out infinite alternate-reverse both;
                }
                @media (min-width: 950px) {
                    .box {
                        width: 80%;
                    }
                }

                @media (max-width: 550px) {
                    .picturemarja{
                        display: none;
                    }
                }
            </style>
        @endslot
    @endcomponent



@endpush

@section('navbar')

    @component($dir.'.layouts.navbar')

        @slot('content')

            <h1 class="text-white mt-5  animated wow fadeInDown" data-wow-delay="0.2s" id="demo1">
                @if(isset($marjaname))
                    {{$marjaname}}
                @endif
                <br>
                <a href="{{$link}}" class="text-light">{{$link}}</a>
            </h1>
            <p class="wow fadeInDown" data-wow-delay="0.4s">{{$persianname}}</p>

        @endslot
    @endcomponent



@endsection

@section('content')
    @if(isset($marja))
        <div class="container-xxl" style="margin-top: -15%">
<div class="row">
    <div class="col-lg-6 col-md-3 picturemarja">
        <img src="{{asset('images/start.png')}}" alt="">
    </div>
    <div class="col-lg-6">
        <div class="box box-down cyan wow fadeInDown text-justify" data-wow-delay="0.2s">
                        <h4 class="wow bounceInDown text-justify" data-wow-delay="0.4s"> {{ __('public.Number of marja') }}  :  {{$marja['aggregations']['marja_count']['value']}}</h4>
            <hr>
            <h4 class="wow bounceInDown" data-wow-delay="0.8s">{{ __('public.Number of diversity of categories') }}: {{$marja['aggregations']['category_count']['value']}}</h4>
            <hr>
            <h4 class="wow bounceInDown" data-wow-delay="1.4s">{{ __('public.Number of questions used from this source') }}: {{$marja['hits']['total']['value']}} </h4>
            <hr>
                          <h4 class="wow bounceInDown" data-wow-delay="1.9s">{{ __('public.The language from which most questions are repeated') }}:  </h4>
                        @foreach($marja['aggregations']['langs']['buckets'] as $i)
                           <span class="text-center wow bounceInDown" data-wow-delay="2.5s">
                               {{$i['key']}} :
                               {{$i['doc_count']}}
                           </span>
            @endforeach

                    </div>
    </div>
</div>
        </div>

    @endif

@endsection
@section('footer')

    <div class="container-fluid   text-light footer wow fadeIn footer" data-wow-delay="0.1s">
        @include($dir.'.layouts.footer')
    </div>

@endsection





