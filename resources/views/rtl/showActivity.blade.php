@extends('__master')
@push('Links')
    @component($dir.'.layouts.headerlinks')
        @slot('otherlinks')
{{--            <link href="{{ asset('/lib/animate/animate.min.css') }}" rel="stylesheet">--}}
{{--            <script src="{{ asset('/lib/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>--}}
{{--            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>--}}
{{--            <script src="{{ asset('/js/animatetext.js') }}" defer></script>--}}

        @endslot
    @endcomponent
    <style>
        table{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
    </style>
@endpush
@section('body-tag')
    <body onload="typeWriterr();">
    @endsection
    @section('navbar')

        @component($dir.'.layouts.navbar')


            @slot('content')

            @endslot
        @endcomponent
    @endsection
    @section('content')
        <div class="main-content container-fluid">


            <div class="row">
                <div class="col-lg-12 ">
                    <div class="pull-left mb-3">
                        <h2>فعالیت های    {{$name}}</h2>
                    </div>

                </div>
            </div>

            {{--    @if ($message = Session::get('success'))--}}
            {{--        <div class="alert alert-success">--}}
            {{--            <p>{{ $message }}</p>--}}
            {{--        </div>--}}
            {{--    @endif--}}
            <div class="col-lg-12 mb-3 ">
                <table class="table table-bordered  table-striped">
                    <thead>
                    <tr>
                        {{--                <th>نام دانشکده</th>--}}
                        <th>عنوان فعالیت</th>
                        <th>موضوع</th>
                        <th>زمان</th>
                        <th>تعداد</th>
                        <th>اطلاعات تکمیلی</th>
                        <th>دستاورد قابل دانلود</th>


                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($articles) && isset($user)  && isset($categories))
                        @foreach($articles as $article)
                            <tr>

                                {{--                    <td> {{$article->user->name}}</td>--}}

                                <td > {{$article->category->title}}</td>

                                <td>{{\Illuminate\Support\Str::limit($article['title'], 20, $end='...')}}</td>
                                <td>{{$article['time']}}</td>
                                <td>{{$article['count']}}</td>
                                <td>{{\Illuminate\Support\Str::limit($article['information'], 20, $end='...')}}</td>

                                {{--                    <td><a href="{{public_path('uploads/'.$article['file'])}}">{{$article['file']}}</a></td>--}}
                                <td><a href="{{asset('uploads/'.$article['file'])}} " target="_blank">{{$article['file']}}</a></td>


                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>

            {{--                {!! $articles->links() !!}--}}




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



