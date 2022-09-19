<!DOCTYPE html>
<html lang="{{$lang}}">

<head>
    <meta charset="utf-8">
    <title>{{__('public.title')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('/images/ok1.png')}}" rel="icon" />
    <meta name="keywords" content="پرس و جوی دینی ، پرسش و پاسخ  ، پارسا"/>
    <meta name="description" content="سامانه پرسش و پاسخ سوالات دینی و مذهبی پارسا"/>
    <meta name="subject" content="سامانه پاسخ به سوالات دینی پارسا"/>
    <meta name="copyright" content="parsaqa"/>
    <meta name="language" content="fa"/>
    <meta name="robots" content="index, follow"/>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/css-comps.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/re575.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/re768.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/re991.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord/admin/re1200.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|
    Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="preconnect" href="//fdn.fontcdn.ir">
    <link rel="preconnect" href="//v1.fontapi.ir">
    <link href="https://v1.fontapi.ir/css/Vazir" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('Links')
{{--    @if(LaravelLocalization::getCurrentLocaleDirection() =="ltr")--}}
{{--        <link rel="stylesheet" href="{{asset('/css/stylePages/ltrstyle.css')}}">--}}
{{--    @endif--}}
    <style>
        body{
            direction: rtl;
            font-family: Vazir, sans-serif;
        }
        .card  h5{
            font-family: Vazir, sans-serif;

        }
        a{
            text-decoration: none !important;
            color:#777777 !important;
        }
        .btn {
            margin-bottom: 1rem;
            letter-spacing: -0.025rem;
            text-transform: uppercase;
            box-shadow: 0 4px 7px -1px rgb(0 0 0 / 11%), 0 2px 4px -1px rgb(0 0 0 / 7%);
            background-size: 150%;
            background-position-x: 25%;
        }


</style>
</head>


<body>


@yield('sidebar')
@yield('content')



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('js/dashbordjs/admin/main.js')}}"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<script>
    $(document).ready(function () {

        $('.listitem li').click(function(e) {

            $('.listitem li.is-active').removeClass('is-active');
            $(this).addClass('is-active');

            e.default();
        });
    });

</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
            return true;
        }).catch(function(e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>
@stack('js-libraries')
</body>

</html>
