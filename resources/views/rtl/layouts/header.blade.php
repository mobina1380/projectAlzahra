
<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0    " >
    <div class="container">
        <a href="/{{App::getLocale()}}" class="navbar-brand p-0">

            <img src={{asset("/images/logoalzahra.png")}} alt="Logo" id="logoParsa" style="" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse" >
            <ul class="navbar-nav">
{{--                <li class="nav-item mr-3"><a class="nav-link active" aria-current="page" href="/">{{ __('public.Home') }}</a></li>--}}
                <li class="nav-item"><a class="nav-link" href="{{route('aboutus')}}">درباره دانشگاه </a></li>

                <li class="nav-item"><a class="nav-link" href="{{route('questionOthersite')}}">معاونت  </a></li>


                <div class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{__('دانشکده ها و پژوهشکده ها ')}}
                    </a>
                    <div class="dropdown-menu m-0 d-flex justify-content-around  universites">
                        <ul>
                            <li><a href="{{route('showActivity',['id'=>1])}}">دانشکده ادبیات</a></li>
                            <li><a href="{{route('showActivity',['id'=>2])}}">دانشکده الهیات</a></li>
                            <li><a href="{{route('showActivity',['id'=>3])}}">دانشکده علوم ورزشی</a></li>
                            <li><a href="{{route('showActivity',['id'=>4])}}">دانشکده علوم اجتماعی و اقتصادی</a></li>
                            <li><a href="{{route('showActivity',['id'=>5])}}">دانشکده علوم تربیتی و روانشناسی </a></li>

                        </ul>

                        <ul>
                            <li><a href="{{route('showActivity',['id'=>6])}}">دانشکده علوم ریاضی</a></li>
                            <li><a href="{{route('showActivity',['id'=>7])}}">دانشکده علوم زیستی </a></li>
                            <li><a href="{{route('showActivity',['id'=>8])}}">دانشکده فنی مهندسی </a></li>
                            <li><a href="{{route('showActivity',['id'=>9])}}">دانشکده فیزیک شیمی </a></li>
                            <li><a href="{{route('showActivity',['id'=>10])}}">دانشکده هنر</a></li>

                        </ul>
                        <ul>
                            <li><a href="{{route('showActivity',['id'=>11])}}">شعبه ارومیه</a></li>
                            <li><a href="{{route('showActivity',['id'=>12])}}">پژوهشکده زنان </a></li>
                            <li><a href="{{route('showActivity',['id'=>13])}}">پژوهشکده مطالعات اقتصادی </a></li>


                        </ul>



                    </div>
                </div>
                <div class="nav-item dropdown">


                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-earth  earth"></i>
                        @if(strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false)
                            {{ __('public.changeLangPersian') }}
                        @endif
                        @if(strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false)
                            {{ __('public.changeLangArabic') }}
                        @endif
                        @if(strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false)
                            {{ __('public.changeLangEnglish') }}
                        @endif
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ LaravelLocalization::getLocalizedURL('fa') }}" class="dropdown-item {{(Request::is('fa')) ? 'activelang' : ''}}" id=""> {{ __('public.changeLangPersian') }} </a>
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="dropdown-item {{(Request::is('ar')) ? 'activelang' : ''}}" id=""> {{ __('public.changeLangArabic') }} </a>
                        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item {{(Request::is('en')) ? 'activelang' : ''}}" id=""> {{ __('public.changeLangEnglish') }} </a>




                    </div>
                </div>
                @if(isset($_GET['name']))
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{$_GET['name']}}
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="{{App::getLocale()}}/login" class="dropdown-item " id=""> خروج </a>


                        </div>
                    </div>
            </ul>
            @else
            </ul>
            <a href="{{route('login')}}" class="btn rounded-pill py-2 px-4 mr-5 text-white"style="margin-right: 10%"  >
             ورود ادمین
            </a>




            @endif

        </div>

        <div class="progress" id="progress"></div>
    </div>
</nav>
