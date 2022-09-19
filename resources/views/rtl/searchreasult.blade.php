
@extends('__master')
@push('Links')
    <link rel="stylesheet" type="text/css" href={{asset('/vendors/styles/style.css')}}>
    <link rel="stylesheet" href="{{asset('/css/stylePages/style.css')}}">
    <link rel="stylesheet" href={{asset('/css/stylePages/scrollup.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/StyleSearchResult.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/likestack.css')}}>
    <link rel="stylesheet" href="{{asset('/css/screenbehavior.css')}}">
    <link rel="stylesheet" href={{asset('/css/stylePages/addstylesearch.css')}}>
    <style>
        .btn-toggle::after {
            margin-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}: 80% !important;
        }

        .highlightspan {
            color:orange;
            font-weight: bold;
        }

        .list-unstyled > li > ul li {
            list-style: none;
        }
        .sidbarmenue{
            height: auto;
        }
        .atag22{
            font-size: 10px;
        }
.palayesh{
    background-color: #AEFEFF;
}
li.dropdown{
    cursor: pointer;
}
        @media (max-width: 500px) {
            .s-post-summary--stats {
                width: 35px;
            }
            .tree_Facet{
                display: none;
            }
        }


    </style>
@endpush
@section('loader')
    <div class="loader" id="loaderin"></div>
@endsection
@section('navbar')
    @include('partials.Navbaesearch')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 col-sm-12 tree_Facet">

            @component('partials.GroupingMobile',['treeUl'=>$treeUl])@endcomponent
            @component('partials.Facets',['results'=>$results])@endcomponent

        </div>
        <div class="col-md-7 col-sm-12 ">
            <div class="faq-wrap">
                <div class="col-8">
                    <form action="{{route('search')}}" method="get" id="searchForm">
                        <div class="input-group">
                            @if(is_array($results) && count($results)>0)
                                <input class="form-control  fontina vazirfont" id="myInput" name="q"  type="text" value=" {{$results['query']}}"  aria-describedby="button-search">
                            @else
                                <input class="form-control  vazirfont"  id="myInput" name="q"  type="text" placeholder={{__('public.search1')}}  aria-describedby="button-search">
                            @endif
                            <button class="btn bg-green " id="button-search" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <p id="result-stats" class="text-muted font-14 mb-3">تقریباً {{$results['count']}} نتیجه<nobr> ({{@round($results['took']/60,3)}} {{__('public.Seconds')}})&nbsp;</nobr></p>
                    </form>

                </div>



                 @if(isset($newText) && $newText!=$text)
                    <div class="alert alert-info"> <a href="{{route('search',['q'=> $newText])}}">
                           {{__('public.Textspellcorrection1')}}
                            <span class="text-danger vazirfont">{{$newText}}</span>
                            {{__('public.you are')}}
                        </a>
                        <br>
                        <br>
                        <p>  {{__('public.otherwise to')}} <a href="/{{App::getLocale()}}" class="text-primary">{{__('public.Main Page')}}</a> {{__('public.go')}}</p>
                    </div>

                @endif
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


            @if(!(isset($newText) && $newText!=$text))
            <div class="blog-pagination">

                <div class="btn-toolbar justify-content-center mb-15">
                    <div class="btn-group">
                        @if(isset($_GET['section']))
                            <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>$_GET['section']+1

                      ])}}" class="btn  prev">
                                <i class="fa fa-angle-double-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}"></i>
                            </a>
                        @else
                            <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>2

                      ])}}" class="btn  prev">
                                <i class="fa fa-angle-double-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}"></i>
                            </a>
                        @endif

                        @if(isset($results['sec']))
                            @if($results['sec']<=10)
                                @for($i=1;$i<=$results['sec'];$i++)

                                    <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>$i

                      ])}}" class="btn ">
                                        @if(isset($request->section))
                                            @if($i==$_GET['section'])
                                                <div class="active">  {{$i}}</div>

                                            @else

                                                {{$i}}
                                            @endif
                                        @else
                                            {{$i}}
                                        @endif
                                    </a>

                                @endfor
                            @endif
                            @if($results['sec']>=10)
                                @for($i=1;$i<=10;$i++)

                                    <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>$i

                      ])}}" class="btn ">
                                        @if(isset($_GET['section']))
                                            @if($i==$_GET['section'])
                                                <div class=" active">  {{$i}}</div>

                                            @else

                                                {{$i}}
                                            @endif
                                        @else
                                            {{$i}}
                                        @endif
                                    </a>


                                @endfor
                                <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>$i

                      ])}}" class="btn ">
                                    ...
                                </a>
                            @endif
                        @endif

                        @if(isset($_GET['section']))
                            <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>$_GET['section']-1

                      ])}}" class="  btn  next">
                                <i class="fa fa-angle-double-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'left' : 'right'}}"></i>
                            </a>
                        @else
                            <a href="{{route('search',['q'=>$_REQUEST['q'] ,'section'=>1

                      ])}}" class="  btn  next">
                                <i class="fa fa-angle-double-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'left' : 'right'}}"></i>
                            </a>

                        @endif
                    </div>
                </div>
            </div>
            @endif

        </div>
        <div class="col-md-3 col-sm-12 {{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'colleft' : ' '}}" >

@component('partials.Latestarticle',['getLatestquestion'=>$getLatestquestion])@endcomponent


        </div>










@endsection
@section('footer')
    <div class="box2">

        @include('rtl.layouts.footer')

    </div>

@endsection
@push('js-libraries')
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js'></script><script  src="./script.js"></script>


            <script>
                $(document).ready(function() {

                    var span = $('#arrow');


                    $(document).on( "click" , "#submenu1 li" , function () {


                        var text = $(this).text() ;

                        $("#added-item").append("<li><span class='ms-1 d-none d-sm-inline text-danger'> " + text + " <i class='fa fa-remove remove1  mr-5 text-danger' id='removetag'></i></span></li>") ;

                        $(this).remove();


                    });

                    $(document).on("click" ,".remove1" ,function () {
                        var text = $(this).parent().text() ;
                        let  str1 = text.replace( /[0-9]/g,'');
                        removeparameter('tags[]=')
                        $(this).parent().prepend().remove();
                        $(".menue1").append(" <li class='dropdown text-success' onclick=text346("+str1+")>  <span class=' pr-20 ' id='texttag'>" +
                            "" + text + " </span></li> ");
                    });


                    $(document).on( "click" , "#submenu2 li" , function () {

                        var text = $(this).text() ;

                        $("#added-item").append("<li><span class='ms-1 d-none d-sm-inline text-danger'> " + text + " <i class='fa fa-remove remove2  mr-5 text-danger' id='removetag'></i></span></li>") ;

                        $(this).remove();


                    });

                    $(document).on("click" ,".remove2" ,function () {
                        // alert('Mobinadjkfjd');
                        var text = $(this).parent().text() ;

                        $(this).parent().prepend().remove();
                        removeparameter('langs[]=')
                        $(".menue2").append(" <li class='dropdown text-success' onclick=text346()>  <span class=' pr-20 ' id='textlang'>" +
                            "" + text + " </span></li> ");
                    });


                    $(document).on( "click" , "#submenu3 li" , function () {

                        var text = $(this).find("a").text() ;

                        $("#added-item").append("<li><a href='#' class='link-dark rounded '><span class='ms-1 d-none d-sm-inline text-danger'> " + text + " <i class='fa fa-remove remove3  mr-5 text-danger' id='removetag'></i></span></a></li>") ;

                        $(this).remove();


                    });

                    $(document).on("click" ,".remove3" ,function () {
                        var text = $(this).parent().text() ;

                        $(this).parent().prepend().remove();

                        $("#submenu3").append(" <li class='dropdown'><a href='#' class='link-dark rounded text-danger'>  <span class='pr-20'>" +
                            "" + text + " </span> </a></li> ");
                    });

                    $(document).on( "click" , "#submenu4 li" , function () {

                        var text = $(this).find("a").text() ;

                        $("#added-item").append("<li><a href='#' class='link-dark rounded '><span class='ms-1 d-none d-sm-inline text-danger'> " + text + " <i class='fa fa-remove remove4  mr-5 text-danger' id='removetag'></i></span></a></li>") ;

                        $(this).remove();


                    });

                    $(document).on("click" ,".remove4" ,function () {
                        var text = $(this).parent().text() ;

                        $(this).parent().prepend().remove();

                        $("#submenu4").append(" <li class='dropdown'><a href='#' class='link-dark rounded text-danger'>  <span class='pr-20'>" +
                            "" + text + " </span> </a></li> ");
                    });
                    $(document).on( "click" , "#submenu5 li" , function () {

                        var text = $(this).find("a").text() ;

                        $("#added-item").append("<li><a href='#' class='link-dark rounded '><span class='ms-1 d-none d-sm-inline text-danger'> " + text + " <i class='fa fa-remove remove5  mr-5 text-danger' id='removetag'></i></span></a></li>") ;

                        $(this).remove();


                    });

                    $(document).on("click" ,".remove5" ,function () {
                        var text = $(this).parent().text() ;

                        $(this).parent().prepend().remove();

                        $("#submenu5").append(" <li class='dropdown'><a href='#' class='link-dark rounded text-danger'>  <span class='pr-20'>" +
                            "" + text + " </span> </a></li> ");
                    });




                    $(document).on( "click" , "#gofacet" , function () {
                     window.location.href=currentURL;


                    });

                });
                function text346(x){

                    var textparam= addparameter(x);

                }
                var currentURL='facet?';
                function  addparameter(param){
                    currentURL  = currentURL+param+'&';
                    return currentURL;
                }
                function  removeparameter(parameter){

                    var middle = currentURL.substring(
                        currentURL.indexOf(parameter) ,
                        currentURL.lastIndexOf('&')+1,
                    );
                    currentURL=currentURL.replace(middle,'');


                }
            </script>
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
