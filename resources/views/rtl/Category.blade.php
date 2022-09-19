@extends('__master')
@push('Links')
    <link rel="stylesheet" type="text/css" href={{asset('/vendors/styles/style.css')}}>
    <link rel="stylesheet" href="{{asset('/css/stylePages/style.css')}}">
    <link rel="stylesheet" href={{asset('/css/stylePages/scrollup.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/StyleSearchResult.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/likestack.css')}}>
    <link rel="stylesheet" href="{{asset('/css/screenbehavior.css')}}">
    <link rel="stylesheet" href={{asset('/css/stylePages/addstylesearch.css')}}>
@endpush
@section('loader')
    <div class="loader" id="loaderin"></div>
@endsection
@section('navbar')
    @include('rtl.layouts.header')

    <div class="container-fluid mt-8">


        @endsection
        @section('content')
            <div class="row">
                <div class="col-md-2 col-sm-12 ">
                    @component('partials.GroupingMobile',['treeUl'=>$treeUl])@endcomponent
                </div>
                <div class="col-md-7 col-sm-12 ">
                    <div class="faq-wrap">
                        <div class="col-8">
                            <form action="{{route('search')}}" method="get" id="searchForm">
                                <div class="input-group">

                                    <input class="form-control  vazirfont"  id="myInput" name="q"  type="text" placeholder='{{__('public.inputsearch')}}'  aria-describedby="button-search">

                                    <button class="btn bg-green " id="button-search" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                <p id="result-stats" class="text-muted font-14 mb-3"> {{__('public.category')}} : {{$cat}}  ->  تقریباً  {{$results['count']}}</p>
                            </form>

                        </div>

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">

                                    <div id="question-mini-list ">
                                        <div>



                                            @if(is_array($results) && count($results)>0)
                                                @foreach($results['data'] as $i=>$result)

                                                    @include('partials.Onequestion', ['result' => $result])


                                                @endforeach
                                            @else
                                                <div class="notexitst">
                                                    <h3 class="text-center m-5 vazirfont" id="">
                                                        نتیجه ای یافت نشد
                                                    </h3>

                                                    <h4 class="text-center m-5 vazirfont">
                                                        در انتخاب واژگان جهت جست و جو دقت بیشتری بفرمایید
                                                        چنانچه موضوع مد نظر خود را نیافتید میتوانید از دسته بندی های موجود به
                                                        دنبال آن باشید.
                                                    </h4>
                                                    <a href="/">بازگشت </a>
                                                </div>

                                            @endif
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="padding-bottom-30">
                            <div class="card">

                                <div id="faq1-1" class="collapse show">

                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-md-3 col-sm-12 ">

                    @include('partials.Latestarticle',['getLatestquestion'=>$getLatestquestion])
                </div>
            </div>
    </div>
@endsection

@section('footer')
    <div class="box2">

        @include('rtl.layouts.footer')

    </div>

@endsection
@push('js-libraries')
    <script>
        $(function () {

            $(window).on("load",function(){


                $(".loader").delay(1500).animate({width:'toggle'},2000);

            });
            $('input')
                .on('change', function (event) {
                    var $element = $(event.target);
                    var $container = $element.closest('.example');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');

                    $('code', $('pre.val', $container)).html(
                        $.isArray(val)
                            ? JSON.stringify(val)
                            : '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });
    </script>
    <script>
        $(function () {


            $("#myInput").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('autoComplete') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function (data) {

                            response(data);
                        }
                    });
                },
                select: function( event, ui, item ) {
                    $("#myInput").val(ui.item.value)
                    $("#searchForm").submit();
                },
                minLength: 2,

            });

            setTimeout(function () {

                $('.loader_bg').fadeToggle();
            }, 2000);
        });
    </script>
@endpush
