
@extends('__master')
@push('Links')
    <link rel="stylesheet" type="text/css" href={{asset('/vendors/styles/style.css')}}>
    <link rel="stylesheet" href="{{asset('/css/stylePages/style.css')}}">
    <link rel="stylesheet" href={{asset('/css/stylePages/scrollup.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/StyleSearchResult.css')}}>
    <link rel="stylesheet" href={{asset('/css/stylePages/likestack.css')}}>
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
                <div class="col-md-3 col-sm-12 ">
                    @include('partials.Grouping')
{{--                    @include('partials.Latestarticle',['getLatestquestion'=>$getLatestquestion])--}}
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="faq-wrap">
                        <div class="col-8">
                            <form action="{{route('search')}}" method="get" id="searchForm">
                                <div class="input-group">

                                    <input class="form-control  vazirfont"  id="myInput" name="q"  type="text" placeholder='{{__('public.inputsearch')}}'  aria-describedby="button-search">

                                    <button class="btn bg-green " id="button-search" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                <p id="result-stats" class="text-muted font-14 mb-3"> سوالات مرتبط با  {{__('public.category')}} {{$cat}} </p>
                            </form>

                        </div>

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">

                                    <div id="question-mini-list ">
                                        <div>



                                            @if(is_array($data) && count($data)>0)
                                                @foreach($data as $i=>$result)
{{--                                                         @php  dd($data); die();@endphp--}}
                                                    <div id="question-summary-71567913" class="s-post-summary js-post-summary"
                                                         data-post-id="71567913" data-post-type-id="1">
                                                        <div class="s-post-summary--stats js-post-summary-stats">


                                                            <div
                                                                class="s-post-summary--stats-item s-post-summary--stats-item__emphasized text-secondary"
                                                                title="Score of 0">
                                                        <span
                                                            class="s-post-summary--stats-item-number mr4">{{$result['vote']}}</span><span
                                                                    class="s-post-summary--stats-item-unit mr-1  "> {{ __('public.Vote') }} </span>
                                                            </div>
                                                            <div class="s-post-summary--stats-item  text-secondary"
                                                                 title="0 answers">
                                                        <span
                                                            class="s-post-summary--stats-item-number mr4">

                                                               @if(isset( $results['data'][$i]['answer'] ) && is_array( $results['data'][$i]['answer']))
                                                                <?php $siz=(sizeof($results['data'][$i]['answer']));  echo $siz;?>


                                                            @else
                                                                1
                                                            @endif

                                                        </span><span
                                                                    class="s-post-summary--stats-item-unit  mr-1 ">{{ __('public.Response') }}    </span>
                                                            </div>
                                                            <div class="s-post-summary--stats-item text-secondary vazirfont"
                                                                 title="2 views">
                                                        <span
                                                            class="s-post-summary--stats-item-number vazirfont mr4">{{$result['view']}}</span><span
                                                                    class="s-post-summary--stats-item-unit mr-1   ">{{ __('public.Visit') }}  </span>
                                                            </div>


                                                        </div>
                                                        <div class="s-post-summary--content">

                                                            <p class="s-post-summary--content-title " data-bs-toggle="tooltip"
                                                               data-bs-placement="top" title="{{$result['question']}}">
                                                                @if(isset($_GET['section']))
                                                                    <a href="{{route('search2',['id'=>$result['id'],'subject'=>$result['subject']

                      ])}}" target="_blank" class="s-link  text-primary">

                                                                        @else
                                                                            <a href="{{route('search2',['id'=>$result['id'],'subject'=>$result['subject']

                      ])}}" target="_blank" class="s-link text-primary">
                                                                                @endif





                                                                                <?php
                                                                                ?>
                                                                                @if(strlen($result['question'])<=400)
                                                                                    {{$result['question']}}
                                                                                @else
                                                                                    <?php echo   substr($result['question'], 0, 200).' <a href="" class="text-success"> مطالعه بیشتر...</a>';
                                                                                    ?>
                                                                                @endif
                                                                                <?php



                                                                                ?>
                                                                            </a>
                                                            </p>
                                                            <div class="s-post-summary--meta">
                                                                <div
                                                                    class="s-post-summary--meta-tags tags js-tags t-python t-pdf t-visual-studio-code t-jupyter-notebook">

                                                                    @if(is_array($result['tags']))
                                                                        @foreach($result['tags'] as $tag)



                                                                            <a href="{{route('GetAllTags',['tag'=>$tag])}}"
                                                                               class="post-tag flex--item mt0 js-tagname-python"
                                                                               title="" rel="tag"> {{$tag}}</a>
                                                                        @endforeach
                                                                    @endif
                                                                    <br>
                                                                    <a href=""
                                                                       class="post-tag flex--item mt0 js-tagname-python text-dark {{(@round($result['score'],2)>30) ? ' bg-warning' : 'bg-danger'}}"
                                                                       title="" rel="tag">درصد شباهت : {{@round($result['score'],2)}}</a>

                                                                    @if(isset($_GET['category']))

                                                                        @foreach($result['category'] as $category)

                                                                            <a href="{{route('cats',['category'=>$category])}}" class="post-tag flex--item mt0  js-tagname-python " style="background-color: #AEFEFF" title="" rel="tag"> {{$category}}</a>
                                                                        @endforeach
                                                                    @endif
                                                                </div>


                                                                <div class="s-user-card s-user-card__minimal ">
                                                                    <time class="s-user-card--time ">
                                                                        @if(isset($result['date']))
                                                                            <a href="#" class="s-link s-link__muted text-muted">{{__('public.Created in')}}

                                                                                <span title=""

                                                                                      class="relativetime vazirfont">{{$result['date']}}  </span></a>
                                                                            {{--                    @else--}}
                                                                            {{--                        <span title=""--}}

                                                                            {{--                              class="relativetime vazirfont">{{__('public.three days ago')}}  </span></a>--}}
                                                                        @endif


                                                                        @if(isset($result['source']['url']))
                                                                            @php

                                                                                $owned_urls = array('https://','www.','.net','.com','http://','.ir','us','.');
                                                                                $string=$result['source']['url'];
                                                                                foreach ($owned_urls as $url) {
                                                                                    if (strpos($string, $url) !== FALSE) {
                                                                                               $urlme=str_replace($url,'',$string);
                                                                                              $string=$urlme;
                                                                                    }
                                                                                }
                                                                            @endphp

                                                                            <a href="{{$result['link']}}" target="_blank"
                                                                               class="text-primary"> {{$string}}</a>

                                                                    </time>
                                                                    <a href=""
                                                                       class="s-avatar s-avatar__16 s-user-card--avatar">
                                                                        <div class="gravatar-wrapper-16 js-user-hover-target"
                                                                             data-user-id="5854688">

                                                                            @php  if (strpos($result['source']['url'],'//') !== FALSE) {
                                   $link=explode('//',$result['source']['url'])[1];

                            }
                       else{
                           $link=$result['source']['url'];
                       }
                                                                            @endphp

                                                                            {{--                        <a href="{{route('dyscriptlinks',['link'=>$result['source']['url'] ,'marja'=>$result['marja'],'persianname'=>$result['source']['persian_name'],'string'=>$string])}} " target="_blank" >   <img src="/images/{{$string}}.png" alt="user avatar"--}}
                                                                            {{--                                                                                                                                                   width="20" ,="" height="20"--}}
                                                                            {{--                                                                                                                                                   class="s-avatar--image"></a>--}}
                                                                            <a href="{{route('dyscriptlinks',['link'=>$link,'persianname'=>$result['source']['persian_name'],'string'=>$string,'marjaname'=>$result['marja']])}} " target="_blank" >   <img src="/images/{{$string}}.png" alt="user avatar"
                                                                                                                                                                                                                                                            width="20" ,="" height="20"
                                                                                                                                                                                                                                                            class="s-avatar--image"></a>

                                                                        </div>
                                                                    </a>
                                                                    @endif


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


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


{{--                    <div class="blog-pagination">--}}
{{--                        <div class="btn-toolbar justify-content-center mb-15">--}}
{{--                            <div class="btn-group">--}}
{{--                                @if(isset($_GET['section']))--}}
{{--                                    <a href="{{route('search',['cat'=>$cat ,'section'=>$_GET['section']+1--}}

{{--                      ])}}" class="btn  prev">--}}
{{--                                        <i class="fa fa-angle-double-right"></i>--}}
{{--                                    </a>--}}
{{--                                @else--}}
{{--                                    <a href="{{route('search',['cat'=>$cat ,'section'=>2--}}

{{--                      ])}}" class="btn  prev">--}}
{{--                                        <i class="fa fa-angle-double-right"></i>--}}
{{--                                    </a>--}}
{{--                                @endif--}}

{{--                                @if(isset($results['sec']))--}}
{{--                                    @if($results['sec']<=10)--}}
{{--                                        @for($i=1;$i<=$results['sec'];$i++)--}}

{{--                                            <a href="{{route('search',['tag'=>$tag ,'section'=>$i--}}

{{--                      ])}}" class="btn ">--}}
{{--                                                @if(isset($request->section))--}}
{{--                                                    @if($i==$_GET['section'])--}}
{{--                                                        <div class="active">  {{$i}}</div>--}}

{{--                                                    @else--}}

{{--                                                        {{$i}}--}}
{{--                                                    @endif--}}
{{--                                                @else--}}
{{--                                                    {{$i}}--}}
{{--                                                @endif--}}
{{--                                            </a>--}}

{{--                                        @endfor--}}
{{--                                    @endif--}}
{{--                                    @if($results['sec']>=10)--}}
{{--                                        @for($i=1;$i<=10;$i++)--}}

{{--                                            <a href="{{route('search',['tag'=>$tag ,'section'=>$i--}}

{{--                      ])}}" class="btn ">--}}
{{--                                                @if(isset($_GET['section']))--}}
{{--                                                    @if($i==$_GET['section'])--}}
{{--                                                        <div class=" active">  {{$i}}</div>--}}

{{--                                                    @else--}}

{{--                                                        {{$i}}--}}
{{--                                                    @endif--}}
{{--                                                @else--}}
{{--                                                    {{$i}}--}}
{{--                                                @endif--}}
{{--                                            </a>--}}


{{--                                        @endfor--}}
{{--                                        <a href="{{route('search',['tag'=>$tag ,'section'=>$i--}}

{{--                      ])}}" class="btn ">--}}
{{--                                            ...--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                @endif--}}

{{--                                @if(isset($_GET['section']))--}}
{{--                                    <a href="{{route('search',['tag'=>$tag ,'section'=>$_GET['section']-1--}}

{{--                      ])}}" class="  btn  next">--}}
{{--                                        <i class="fa fa-angle-double-left"></i>--}}
{{--                                    </a>--}}
{{--                                @else--}}
{{--                                    <a href="{{route('search',['tag'=>$tag ,'section'=>1--}}

{{--                      ])}}" class="  btn  next">--}}
{{--                                        <i class="fa fa-angle-double-left"></i>--}}
{{--                                    </a>--}}

{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <div class="col-md-3 col-sm-12 ">
                    @include('partials.Newarticles')

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

