
    <div class="container py-1 px-lg-5">
        <div class="row g-5">
            <div class="col-md-4 col-lg-3">
                <p class=" text-white  h5 links mb-4 vazirfont">{{ __('public.contact us') }} </p>
                <p>{{ __('public.Address') }}</p>
                <p class="mr-10"></p>
                <p><i class="fa fa-phone-alt me-3"></i>09111169156</p>
                <p><i class="fa fa-envelope me-3"></i>info@parsaqa.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">

                <a class="btn btn-link queicklink mb-4 h3" href=""> {{ __('public.Quick links') }} </a>
                <a class="btn btn-link" href=""> {{ __('public.search') }} </a>
                <a class="btn btn-link" href="{{route('privacy')}}"> {{ __('public.titleprivacy') }} </a>
                <a class="btn btn-link" href=""> {{ __('public.Daily news') }}  </a>
                <a class="btn btn-link" href="">{{ __('public.The most visited') }}  </a>
                <a class="btn btn-link" href="{{route('aboutus')}}">{{ __('public.aboutus') }}</a>
            </div>






            <div class="col-lg-4 col-md-12 col-sm-12 mr-2 aspanser">
                <p class="section-title text-white h5 vazirfont " style="margin-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}: 30%">{{ __('public.supporters') }}</p>
                <img class="img-fluid" src={{ asset('/images/bmn.logo.png') }} alt="Image">
                <img class="img-fluid" src={{ asset('/images/Shahrud.logo.png') }}  alt="Image" >

                <img class="img-fluid" src={{ asset('/images/hoze.logo.png') }} alt="Image" >
                <p class="section-title text-white h5  vazirfont   mt-3" style="margin-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}: 30% ">{{ __('public.Our colleagues') }} </p>
                <img class="img-fluid"  src={{ asset('/images/almojib.png') }} alt="Image" style="width:50px;height: 50px;margin-{{(LaravelLocalization::getCurrentLocaleDirection() =="rtl") ? 'right' : 'left'}}: 35%">
                <img class="img-fluid "  src={{ asset('/images/rasekhoon1.png') }} alt="Image" style="width:80px;height: 50px">

            </div>


        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                    <p>
                        {{ __('public.textendfooter') }}

                    </p>



                </div>

            </div>
        </div>
    </div>
    <button class="scrollToTop" onclick="topFunction()"><i class="fa fa-arrow-up"></i></button>
{{--    PrivacyPolicy--}}
    <script async src="https://www.privacypolicygenerator.info/live.php?token=2V18AyaP5z7zJpZThkuaVr8GiyHE7312"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QTS8TV8CCV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-QTS8TV8CCV');
    </script>
