
@extends('__master')
@push('Links')
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{asset('/vendors/styles/core.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('/vendors/styles/style.css')}}>
    <link rel="stylesheet" href={{ asset('/css/stylePages/style.css') }}>
    <link rel="stylesheet" href={{ asset('/css/stylePages/scrollup.css') }}>
    <link rel="stylesheet" href={{ asset('/css/stylePages/likestack.css') }}>
    <link rel="stylesheet" href={{ asset('/css/stylePages/style2.css') }}>
    <link rel="stylesheet" href="{{asset('/css/screenbehavior.css')}}">
    <script src={{asset("/vendors/clipboard.js-master/dist/clipboard.min.js")}}></script>
    <style>
        .list-unstyled > li > ul li {
            list-style: none;
        }

        .card-box .progress{
            direction: ltr;
        }

        @media (max-width: 500px) {
            .sidebar2{
                display: none !important;
            }
            .Recomender{
                display: none !important;
            }
            .social-container{
                display:none;
            }
            .sendText{
                display: none;
            }

            #loaderin{
                display: none !important;
            }
        }


    </style>
@endpush
@section('loader')
    <div class="loader" id="loaderin"></div>
@endsection
@section('navbar')
    @include($dir.'.layouts.header')
    <div class="container-fluid mt-3">

        @endsection
        @section('content')
            <div class="row">
                <div class="col-md-2 col-sm-12 collright">

                    @component('partials.GroupingMobile',['treeUl'=>$treeUl])@endcomponent
                     @component('partials.Recomender',['getviewquestion'=>$getviewquestion]) @endcomponent


                </div>
                <div class="col-md-7 col-sm-12 ">
                    <div class="faq-wrap">





                            <div class="col-8">
                            <form action="{{route('search')}}" method="get" id="searchForm">
                                <div class="input-group">


                                        <input class="form-control  vazirfont"  id="myInput" name="q"  type="text" placeholder='{{__('public.search1')}}'  aria-describedby="button-search">

                                    <button class="btn bg-green " id="button-search" type="submit"><i class="fa fa-search"></i></button>
                                </div>

                            </form>

                        </div>









                        <div class="title vazirfont" >

                            @if(is_array($results) && count($results)>0)

                                @foreach($results['data'] as $i=>$result)


                                    @if($results['data'][$i]['id']== $id)
                                          @php
                                        session_start();

                                        if(isset($_SESSION['views']))
                                        $_SESSION['views'] = $_SESSION['views']+1;
                                        else
                                        $_SESSION['views']=1;
                                        @endphp


                        </div>
                        <div id="accordion">

                            <div class="card ">
                                @if(is_array($results) && count($results)>0)
                                    <span  class="text-muted  p-3 vazirfont">
                                    @foreach($results['data'] as $i=>$result)

                                        @if(is_array($result['category']))
                                            @foreach($result['category'] as $category)

                                             {{$category}}&nbsp;/
                                            @endforeach
                                        @endif
                                    @endforeach
                                        </span>
                                @endif
                                <div class="card-header">
                                </div>
                                    <div class="parentbox mt-3 mr-3 d-flex ">

                                        <div class="box10 d-flex justify-content-center align-items-center" >
                                            <i class="fa fa-bookmark"></i>
                                        </div>
                                        <div class="box10 d-flex justify-content-center align-items-center ml-2 mr-2" >
                                            <i class="fa fa-copy btncopy"  data-clipboard-action="copy" data-clipboard-target="#paragraph"></i>

                                        </div>

                                        <div class="box10 d-flex justify-content-center align-items-center" >
                                            <i class="fa fa-share-alt"></i>
                                        </div>

                                    </div>

                                    <div class="w-100 text-right pt-3">

                                       <?php

                                        function reading_time( $content ) {
                                            $words_per_minute = 200;
                                            if(is_array($content)){
                                                $word = count($content);
                                            }
                                           else if(is_string($content)){

                                               $word = count( explode(" ", strip_tags( $content ) ) );
                                            }
                                            return (ceil($word / $words_per_minute));
                                        }

                                        ?>
                                           <p class="font-size-9 text-danger">{{__('public.Estimation of study time')}}

                                               {{reading_time($results['data'][$i]['answer'])}} {{__('public.minute')}}</p>

                                    </div>

                                    <h5 class="vazirfont  mt-2 text-justify p-4"><?php
                                        echo strip_tags($results['data'][$i]['question']);
                                        ?></h5>
                                    <p class="text-justify  fontBN" id="paragraph">


                                        <br>
                                          @if(isset( $results['data'][$i]['answer'] ) && is_array( $results['data'][$i]['answer']))
                                        @foreach( $results['data'][$i]['answer'] as $answer)
                                            {!! html_entity_decode($answer) !!}
                                        @endforeach
                                        @elseif(isset( $results['data'][$i]['answer'] ) && is_string( $results['data'][$i]['answer']))
                                            {!! html_entity_decode($results['data'][$i]['answer'] ) !!}
                                        @endif

                                        <br>
                                        <br>
                                    </p>
                                    <div class="s-post-summary--meta">
                                        <div
                                            class="s-post-summary--meta-tags tags js-tags t-python t-pdf t-visual-studio-code t-jupyter-notebook  ">

                                            @if(is_array($result['category']))
                                                @foreach($result['category'] as $category)
                                                    {{--                                                <a href="" class="p-2 bg-danger" style="margin-bottom: 20px;margin-top: 20px">{{$category}}</a>--}}
                                                    <a href="{{route('cats',['cat'=>$category])}}" class="post-tag flex--item mt0 js-tagname-python" style="background-color: #AEFEFF" title="" rel="tag"> {{$category}}</a>


                                                @endforeach
                                            @endif


                                        </div>




                                    </div>




                                    <div class="s-post-summary--meta">
                                        <div
                                            class="s-post-summary--meta-tags tags js-tags t-python t-pdf t-visual-studio-code t-jupyter-notebook  ">

                                            @if(is_array($result['tags']))
                                                @foreach($result['tags'] as $tag)



                                                    <a href="{{route('GetAllTags',['tag'=>$tag])}}"
                                                       class="post-tag flex--item mt0 js-tagname-python"
                                                       title="" rel="tag"> {{$tag}}</a>
                                                @endforeach
                                            @endif

                                        </div>




                                    </div>


                                    <p class="text-justify mt-4 fontBN  border border-light p-2 ">



                                        {{$result['source']['persian_name']}}


                                    </p>

                                    <p class="text-justify mt-4  fontBN border border-light p-2 ">

                                        <a href="#">{{ __('public.Reference') }}:   {{$results['data'][$i]['marja']}}</a>


                                    </p>



                                    <p class="text-justify mt-4 fontBN  border border-light p-2">
                                        <a href="#" class="s-link s-link__muted text-muted">{{ __('public.Created in')}}
                                            @if(isset($result['date']))
                                                <span title=""

                                                      class="relativetime vazirfont">{{$result['date']}}  </span></a>
                                        @else
                                            <span title=""

                                                  class="relativetime vazirfont">سه روز پیش   </span></a>
                                        @endif
                                    </p>
                                    <p class="text-justify mt-4  fontBN  p-2" style="">
                                        <a href="{{$results['data'][$i]['link']}}" target="_blank" class="post-tag flex--item mt0  shortlink" title="" rel="tag" style="background-color: #AEFEFF"> {{ __('public.Short link') }}</a>


                                    </p>

                                    <p class="text-justify mt-4 fontBN text-secondary">


                                        <br>
                                        <br>

                                    </p>

                                    @endif

                                    <p class="text-justify mt-4 fontBN">


                                    </p>

                                    @endforeach
                                    @endif



                                <div class="card-footer fontBN text-left">
                                    <button class="bubbly-button"><i class="fa fa-thumbs-up  " ></i>  </button>
                                    <button class="bubbly-button"><i class="fa fa-thumbs-down  " ></i>  </button>
                                    <p>



                                        @if(isset($relatedQuestions) && $relatedQuestions != [])

                                            @foreach($relatedQuestions as $question)
                                                <?php dd($relatedQuestions); die()?>
                                                class="list-group-item list-group-item-{{ ($question["similarity"] < 40 ? "danger" : ($question["similarity"] > 60 ? "success" : "warning")) }}">
                                                <a href="{{ route('getOne', ['id' => $question["id"]]) }}"
                                                   class="text-decoration-none link-{{ ($question["similarity"] < 40 ? "danger" : ($question["similarity"] > 60 ? "success" : "warning")) }}">
          <span>
            {{ $question["question"] }}
          </span>
                                                    <span
                                                        class="badge bg-{{ ($question["similarity"] < 40 ? "danger" : ($question["similarity"] > 60 ? "success" : "warning")) }}">{{ $question["similarity"] }}%</span>
                                                </a>
                                                </li>
                                            @endforeach
                                        @else

                                        @endif
                                    </p>



                                </div>
                            </div>

                        </div>





                    </div>






{{--                    /////////--}}
                    <div class="card text-center mb-3">
                        <div class="card-header text-right vazirfont ">
                            <span class="text-danger">{{count($comment)}}</span>
                        دیدگاه
                        </div>
                        <div class="card-body text-right">
                  @if(isset($comment) && count($comment)>0)
                                @foreach($comment as $commentchild)
                                    <p class="vazirfont">  <span class="text-danger vazirfont">{{$commentchild['name']}}:</span>
                                        {{$commentchild['body']}}</p>
                                    <br>


                                @endforeach
                            @else
                            برای این پست دیدگاهی وجود ندارد
                            @endif
                        </div>

                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>خطا!!</strong></p>
                        </div>
                    @endif
                    @if(session()->has('status'))
                        <div class="alert alert-success">
                           نظر شما با موفقیت ثبت شد
{{--                            {{session()->get('status')}}--}}
                        </div>
                    @endif
{{--                    @guest--}}
{{--                        <div class="blog-post__comments-respond">--}}
{{--                            <h5>Leave a Comment</h5>--}}
{{--                            <form action="{{route('insert_comment',['id'=>$id])}}" method="post">--}}

{{--                                @csrf--}}
{{--                                <p class="blog-post__comments-respond-comment">--}}
{{--                                    <label for="comment">Comment</label>--}}
{{--                                    <textarea id="comment" name="comment" cols="45" aria-required="true">{{old('comment')}}</textarea>--}}
{{--                                <ul>@foreach($errors->all() as $error)--}}
{{--                                        <li>{{$error}}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                                </p>--}}
{{--                                <p class="blog-post__comments-respond-author">--}}
{{--                                    <label for="author">Name*</label>--}}
{{--                                    <input id="author" type="text" name="name" size="30" aria-required="true" value="{{old('name')}}" required>--}}

{{--                                </p>--}}
{{--                                <p class="blog-post__comments-respond-email">--}}
{{--                                    <label for="email-form">Email*</label>--}}
{{--                                    <input id="email-form" type="email" name="email" size="30" aria-required="true" value="{{old('email')}}" required>--}}

{{--                                </p>--}}

{{--                                <p class="blog-post__comments-respond-submit">--}}
{{--                                    <input id="submit" type="submit" name="submit" size="30" value="Post Comment">--}}
{{--                                </p>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div class="blog-post__comments-respond">--}}
{{--                            <h5>Leave a Comment</h5>--}}
{{--                            <form action="single-post.html" method="post">--}}
{{--                                <p class="blog-post__comments-respond-comment">--}}
{{--                                    <label for="comment">Comment</label>--}}
{{--                                    <textarea id="comment" name="comment" cols="45" aria-required="true"></textarea>--}}
{{--                                </p>--}}

{{--                                <p class="blog-post__comments-respond-submit">--}}
{{--                                    <input id="submit" type="submit" name="submit" size="30" value="Post Comment">--}}
{{--                                </p>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    @endguest--}}


{{--                    //////////--}}
                    @guest

                    <div class="pd-20 card-box mb-30 sendText">
                        <div class="clearfix">
                            <h4 class=" h3 fontBN textcomment">{{ __('public.Post a comment') }} </h4>

                        </div>
                        <div class="wizard-content">
                                <form action="{{route('insert_comment',['id'=>$id])}}" method="post" class="tab-wizard wizard-circle wizard vertical">

                                    @csrf
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >  {{ __('public.name') }} :</label>
                                                <input id="author" type="text" name="name" size="30" aria-required="true" value="{{old('name')}}" class="form-control" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('public.email') }} :</label>
                                                <input id="email-form" type="email" name="email" size="30" aria-required="true" value="{{old('email')}}" class="form-control" required>

                                            </div>
                                        </div>
                                    </div>


                                </section>
                                <!-- Step 2 -->
                                <!--                        <h5>ثبت دیدگاه </h5>-->
                                <section>
                                    <div class="row">


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('public.Text') }}</label>
                                                <textarea id="comment" name="comment" cols="45"  class="form-control" aria-required="true">{{old('comment')}}</textarea>

                                                <ul>@foreach($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 4 -->
{{--                                <button class="btn btnsub vazirfont">{{ __('public.submit') }}</button>--}}
                                    <input id="submit" type="submit" name="submit" size="30" value="ثبت" class="btnsub vazir-font">
                                <section>

                                </section>
                            </form>
                        </div>
                    </div>
                @endguest
                    <div class="social-container mt-5">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fab fa-telegram"></i></a></li>

                        </ul>
                    </div>
                    <!-- success Popup html Start -->
                    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center font-18">
                                    <h3 class="mb-20 fontBN">اطلاعات شما ارسال شد </h3>
                                    <div class="mb-30 text-center"><img src="../../images/success.png"></div>
                                    سپاس از دیدگاه شما
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">تایید</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- success Popup html End -->

                </div>
                <div class="col-md-3 col-sm-12 ">


                    <br>
                    @component('partials.Simularity',['simularityquestionlast'=>$simularityquestionlast]) @endcomponent
                    <br>
                    @include('partials.Latestarticle',['getLatestquestion'=>$getLatestquestion])
                </div>
            </div>
    </div>
@endsection

@section('footer')
    <div class="box2">

        @include($dir.'.layouts.footer')

    </div>

@endsection
@push('js-libraries')
    <script>
        var arrow=document.getElementById("arrow");
        var cardmore = document.querySelectorAll(".cardmore");
        function  showboxes(){

            if (arrow.classList.contains("fa-arrow-down-to-dotted-line")) {


                for (var i = 0; i < cardmore.length; i++) {
                    cardmore[i].classList.remove('d-none');
                }
                arrow.classList.remove('fa-arrow-down-to-dotted-line');
                arrow.classList.add('fa-arrow-up-to-dotted-line');
            }
            else
            if (arrow.classList.contains("fa-arrow-up-to-dotted-line")) {


                for (var i = 0; i < cardmore.length; i++) {
                    cardmore[i].classList.add('d-none');
                }
                arrow.classList.remove('fa-arrow-up-to-dotted-line');
                arrow.classList.add('fa-arrow-down-to-dotted-line');
            }

        }





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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


@endpush
