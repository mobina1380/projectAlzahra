<!-- content Start -->
{{--colors--}}
{{--rgb(66,110,23)=#426e17--}}
{{--rgb(122,187,59)=#79ba3b--}}
{{--#426e17--}}
{{--#7abb3b--}}
{{--#2f510f--}}
{{--#528125--}}
{{--rgba(47,81,15,.9)--}}
{{--#bad3a3--}}

<div class="container-xxl py-6">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="section-title text-secondary justify-content-center"><span></span>اخبار <span></span></p>
            <h1 class="text-center mb-5"> اخبار  </h1>
        </div>
        <div class="row g-4">
{{--            @if(isset($news) && count($news)>0)--}}
{{--                @foreach($news as $new)--}}
{{--            {{$new['title']}}--}}
{{--                    <hr>--}}
{{--                @endforeach--}}
{{--            @endif--}}

                <br>
                @if(isset($news) && count($news)>0)
                @for($i=0;$i<4;$i++)

                    @if(strlen($news[$i]['title'])<=100)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"   onclick="changeLocLatesquestion({{$news[$i]['id']}})">
                            <div class="service-item2 rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-question fa-2x"></i>
                                    </div>
                                    <a class="service-btn" href="">
                                        <i class="fa fa-link fa-2x"></i>
                                    </a>
                                </div>
                                <div class="p-5">

                                    <span>
                                     {{$news[$i]['title']}}</span>


                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"  onclick="changeLocLatesquestion({{$news[$i]['title']}})">
                            <div class="service-item2 rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-question fa-2x"></i>
                                    </div>
                                    <a class="service-btn" href="">
                                        <i class="fa fa-link fa-2x"></i>
                                    </a>
                                </div>
                                <div class="p-5">

                                    <span>
                                      {{\Illuminate\Support\Str::limit($news[$i]['title'], 65, $end='.....')}}</span>



                                </div>
                            </div>
                        </div>


                    @endif




                    @endfor


            @else

            @endif

            <span id="dots"></span><span id="more">
                <div class="row g-4">
                          @if(isset($news) && count($news)>0)
                            @for($i=3;$i<sizeof($news);$i++)
                        @if(strlen($news[$i]['title'])<=100)
                                <div class="col-lg-3 col-md-6 " onclick="changeLocLatesquestion({{$news[$i]['id']}})">
                            <div class="service-item2 rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-question fa-2x"></i>
                                    </div>
                                    <a class="service-btn" href="">
                                        <i class="fa fa-link fa-2x"></i>
                                    </a>
                                </div>
                                <div class="p-5">

                                    <span>
                                      {{$news[$i]['title']}}</span>
                                </div>
                            </div>
                        </div>
                            @else
                                <div class="col-lg-3 col-md-6 " onclick="changeLocLatesquestion({{$news[$i]['id']}})">
                            <div class="service-item2 rounded h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="service-icon">
                                        <i class="fa fa-question fa-2x"></i>
                                    </div>
                                    <a class="service-btn" href="">
                                        <i class="fa fa-link fa-2x"></i>
                                    </a>
                                </div>
                                <div class="p-5">

                                    <span>
                                      {{\Illuminate\Support\Str::limit($news[$i]['title'], 65, $end='.....')}}</span>
                                </div>
                            </div>
                        </div>


                            @endif




                        @endfor


                    @else

                    @endif


 </div>

            </span>





            <button onclick="myFunction()" id="morbtn" class="glow-on-hover"> بیشتر</button>

        </div>
    </div>
</div>
<div class="container-xxl py-5 ">

    <div class="container py-5 px-lg-5">
        <div class="row g-4 wow fadeInUp"  data-wow-delay="0.1s">
            <h5 class="section-title text-secondary justify-content-center "><span></span>رویداد <span></span></h5>
            <h1 class="text-center mb-5 wow fadeInDown"  data-wow-delay="0.4s">رویداد ها  </h1>
            @if(isset($events) && count($events)>0)

                @for($event=0;$event<sizeof($events);$event++)
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item  rounded text-center p-4 boxs">

                    @if(strlen($events[$event]['title'])<=150)
                        <h5 class="mb-3">
                            <a href=" " target="_blank" class="text-light" >{{$events[$event]['title']}}</a>
                        </h5>
                    @else
                        <h6 class="mb-3">
                            <a href="" target="-_blank" class="text-light"> {{\Illuminate\Support\Str::limit($events[$event]['title'], 100, $end='.....')}}
                            </a>
                        </h6>
                    @endif



                </div>
            </div>

                @endfor


            @else

            @endif

        </div>
    </div>
</div>

<div class="container-xxl py-5 groupingtree">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp"  data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>دستاورد  <span></span></p>
            <h1 class="text-center mb-5"> دستاورد ها</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-md-6 wow fadeInUp" onclick="changeLocation('semantic_search')" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-search fa-2x"></i>
                    </div>
                    <h5 class="mb-3">دستاورد های علمی پژوهشی</h5>

                    <a class="btn btn-square" href="{{route('semantic_search')}}"><i class="fa fa-arrow-right" ></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-laptop-code fa-2x"></i>
                    </div>
                    <h5 class="mb-3">دستاورد  های دانشجویی فرهنگی  </h5>

                    <a class="btn btn-square" href="{{route('question_similarity')}}"><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container-xxl py-5 groupingtree">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp"  data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>اخبار  <span></span></p>
            <h1 class="text-center mb-5">  اخبار</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-md-12 wow fadeInUp" onclick="changeLocation('semantic_search')" data-wow-delay="0.1s">
                <div class="card bg-dark text-white">
                    <img src="{{asset('images/1.jpg')}}" class="card-img" alt="...">
                    <div class="card-img-overlay">

                        <p class="card-text">برگزاری نشست مسئولان دانشگاه الزهرا و دانشگاه بصره</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/2.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">برگزاری نشست مسئولان دانشگاه الزهرا و دانشگاه بصره</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp"  onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/3.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">حضور دانشجویان بین‌الملل دانشگاه الزهرا در مراسم تعزیه‌خوانی دانشگاه تهران</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-4 mt-5 d-flex flex-nowrap">
            <div class="col-lg-3 col-md-12 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/4.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">با همکاری دانشگاه الزهرا(س)؛ نخستین مجمع بین‌المللی دانشگاهی زنان جهان اسلام برگزار می شود</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s" >
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/5.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">انتخاب مقالۀ محقق پسادکتری دانشگاه الزهرا به عنوان مقالۀ برگزیده در کنفرانس بین المللی نانو مواد و نانو تکنولوژی پایدار ۲۰۲۲</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 wow fadeInUp"  style="margin-right: 1%" onclick="changeLocation('semantic_search')" data-wow-delay="0.1s">
                <div class="card bg-dark text-white">
                    <img src="{{asset('images/6.jpg')}}" class="card-img" alt="...">
                    <div class="card-img-overlay">

                        <p class="card-text">برگزیدگان مرحله اول بیست و هفتمین المپیاد علمی دانشجویی سال ۱۴۰۱</p>
                    </div>
                </div>
            </div>

        </div>











        <div class="row g-4 mt-3">

            <div class="col-lg-3 col-md-12 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/2.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">برگزاری نشست مسئولان دانشگاه الزهرا و دانشگاه بصره</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp" onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/2.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">برگزاری نشست مسئولان دانشگاه الزهرا و دانشگاه بصره</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp"  onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/3.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">حضور دانشجویان بین‌الملل دانشگاه الزهرا در مراسم تعزیه‌خوانی دانشگاه تهران</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp"  onclick="changeLocation('question_similarity')" data-wow-delay="0.3s">
                <div class="col-lg-3  col-md-12 col-sm-12 ">
                    <div class="card" style="width: 16rem;height: 340px ">
                        <img src="{{asset('images/3.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <p class="card-text">حضور دانشجویان بین‌الملل دانشگاه الزهرا در مراسم تعزیه‌خوانی دانشگاه تهران</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
</div>











{{--<div class="container-xxl py-5">--}}

{{--    <div class="container py-3 mb-5 px-lg-5">--}}
{{--        <div class="row g-4">--}}
{{--            <h5 class="section-title text-secondary justify-content-center"><span></span>{{ __('public.Introduction') }}<span></span></h5>--}}
{{--            <h1 class="text-center mb-5">    {{ __('public.Introducing the goals of the Parsa team') }}     </h1>--}}
{{--            <div class="col-lg-6 ml-3">--}}
{{--                <img src="{{asset('images/gitfirst.gif')}}" alt="">--}}

{{--            </div>--}}
{{--            <div class="col-lg-6 ">--}}
{{--                <div class="card  wow fadeInUp " data-wow-delay="0.1s" style="">--}}

{{--                    <video  height="240"  class="mr-5"  controls >--}}
{{--                        <source src={{ asset('/images/video/parsaqa.mp4') }}  type="video/mp4" >--}}
{{--                        <source src="movie.ogg" type="video/ogg">--}}
{{--                        Your browser does not support the video tag.--}}
{{--                    </video>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                <h2 class="mb-5"> درباره ما</h2>
                <p class="mb-4 goaltext">
                    {{ __('public.TextObjectives') }}</p>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2"> {{ __('public.The comprehensiveness of the crawled questions') }}</p>
                        <p class="mb-2">95%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bar1" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">{{ __('public.The accuracy of intelligent classification of questions') }} </p>
                        <p class="mb-2">90%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bar2" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2"> {{ __('public.The rate of progress of the intelligent search engine questions') }} </p>
                        <p class="mb-2">80%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bar3" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <a href="{{route('aboutus')}}" class="btn  py-sm-3 px-sm-5 rounded-pill mt-3 btnmore">{{ __('public.Read more') }} </a>
            </div>
            <div class="col-lg-6 mr-3">
                <img class="img-fluid wow zoomIn mr-5" data-wow-delay="0.5s" src="{{asset('images/bg-lg.png')}}" alt="">

            </div>
        </div>
    </div>
</div>

<div class="container-xxl   py-5 wow fadeInUp counter" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-4 justify-content-center ">
            <div class="col-md-6 col-lg-2 text-center wow fadeIn p-1" data-wow-delay="0.1s">
                <i class="fa fa-book fa-3x text-light mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{$data['total']}}</h1>
                <p class="text-white mb-0">عضو هیئت علمی  </p>
            </div>
            <div class="col-md-6 col-lg-2 text-center wow fadeIn p-1" data-wow-delay="0.3s">
                <i class="fa fa-user fa-3x text-light mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">9</h1>
                <p class="text-white mb-0">دانشکده  </p>
            </div>
            <div class="col-md-6 col-lg-2 text-center wow fadeIn p-1" data-wow-delay="0.5s">
                <i class="fa fa-question fa-3x text-light mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{($data['tags']['value'])}}</h1>
                <p class="text-white mb-0">دانشجو  </p>
            </div>
            <div class="col-md-6 col-lg-2 text-center wow fadeIn p-1" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-light mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{($data['source']['value'])}}</h1>
                <p class="text-white mb-0">گروه آموزشی </p>
            </div>
            <div class="col-md-6 col-lg-2 text-center wow fadeIn p-1" data-wow-delay="0.7s">
                <i class="fa fa-language fa-3x text-light mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{($data['lang']['value'])}}</h1>
                <p class="text-white mb-0">دانشجو بین الملل </p>
            </div>
        </div>
    </div>
</div>

