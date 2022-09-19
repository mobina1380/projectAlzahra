@extends('__master')
@push('Links')
    @component($dir.'.layouts.headerlinks')
        @slot('otherlinks')
            <link href="{{ asset('/lib/animate/animate.min.css') }}" rel="stylesheet">
            <script src="{{ asset('/lib/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script src="{{ asset('/js/animatetext.js') }}" defer></script>

        @endslot
    @endcomponent
@endpush
@section('body-tag')
    <body onload="typeWriterr();">
    @endsection
    @section('navbar')

        @component($dir.'.layouts.navbar')


            @slot('content')

                <h1 class="text-white mt-5  animated  mr-5 akhbar  slideInDown"  id="">{{__('public.questionOther')}}</h1>
            @endslot
        @endcomponent
    @endsection
    @section('content')
        <div class="container py-3 px-lg-5 newques ">
            <section id="services" class="services ">
                <div class="container">

                    <div class="mb-5 text-center mx-auto ">
                        <h3 >{{ __('public.questionothersiteText') }}</h3>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <img class="question" src={{asset("images/porseman1.JPG")}}>
                            <br>
                            <a href="https://www.porseman.com/search" class="mt-4 mb-5">https://www.porseman.com/search</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 ">
                            <img  class="question" src={{asset("images/islamquestsoal.png")}} >
                            <br>
                            <br>
                            <a href="https://www.islamquest.net/fa/newquestion" class="mt-4 mb-5">https://www.islamquest.net/fa/newquestion</a>
                        </div>
                    </div>

            </section><!-- End Services Section -->





        </div>
        </div>

    @endsection



    @section('footer')

        <div class="container-fluid   text-light footer wow fadeIn footer" data-wow-delay="0.1s">
            @include($dir.'.layouts.footer')
        </div>

    @endsection


    @push('js-libraries')
        <!-- JavaScript Libraries -->
        <script src="{{asset('js/animatetext.js')}}"></script>
        <script>
            $(document).ready(function () {

                Swal.fire({
                    icon: "warning",
                    title: 'توجه!!',
                    text: " امکان ارسال پرسش های جدید در سامانه پارسا غیرفعال میباشد ؛ کاربران گرامی می توانند برای ارسال پرسش های خود به سامانه های پرسش و پاسخ دیگر مانند اسلام کوئست و پرسمان دانشگاهیان مراجعه فرمایند .",

                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله',
                    cancelButtonText: 'خیر',
                    reverseButtons: true
                }).then(function(result){

                })


                $('.swal2-cancel').click(function(){
                    window.location.href='../';

                })







            });



        </script>


        <!-- JavaScript Libraries -->

        <script src="../lib/wow/wow.min.js"></script>

        <script>
            $(document).ready(function () {

                Swal.fire({
                    icon: "warning",
                    title: '{{ __('public.attention') }}',
                    text: "{{ __('public.attentionText') }}",

                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله',
                    cancelButtonText: 'خیر',
                    reverseButtons: true
                }).then(function(result){

                })

                $('.swal2-cancel').click(function(){
                    window.location.href='../';

                })







            });



        </script>
        <!-- Template Javascript -->


    @endpush



