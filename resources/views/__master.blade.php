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
    <link rel="stylesheet" href={{asset('FontAwesome.Pro.6.0.0.Beta3/Web/css/all.css')}}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src={{asset("js/jsproject/progress.js")}} defer></script>
    <script src={{asset("js/scrollup.js")}}></script>
    @stack('Links')
    @if(LaravelLocalization::getCurrentLocaleDirection() =="ltr")
        <link rel="stylesheet" href="{{asset('/css/stylePages/ltrstyle.css')}}">
    @endif

</head>


    <body  style="direction: {{LaravelLocalization::getCurrentLocaleDirection()}}">


@yield('loader')
@yield('navbar')
@yield('content')
@yield('footer')




<script>

    $(document).ready(function(){

        if ($('.text-slider').length == 1) {
            var typed_strings = $('.text-slider-items').text();
            var typed = new Typed('.text-slider', {
                strings: typed_strings.split(','),
                typeSpeed: 120,
                loop: true,
                backDelay: 1100,
                backSpeed: 100
            });
        }



        $('#microphone').click(function (e){
            e.preventDefault();
            Swal.fire({
                icon: "warning",
                title: 'توجه!!',
                text: "امکان جست و جوی صوتی به زودی درسایت فعال میشود ",
                confirmButtonText: 'باشه',
            })

        })

    });
</script>
<script>
    const downloadLink = document.getElementById('download');
    const start = document.getElementById('start');
    const stopButton = document.getElementById('stop');


    const handleSuccess = function(stream) {
        const options = {mimeType: 'audio/webm'};
        const recordedChunks = [];
        const mediaRecorder = new MediaRecorder(stream, options);

        mediaRecorder.addEventListener('dataavailable', function(e) {
            if (e.data.size > 0) recordedChunks.push(e.data);
        });

        mediaRecorder.addEventListener('stop', function() {
            downloadLink.href = URL.createObjectURL(new Blob(recordedChunks));
            downloadLink.download = 'acetest.wav';
        });

        stopButton.addEventListener('click', function() {
            mediaRecorder.stop();
        });

        mediaRecorder.start();
    };




    start.addEventListener('click', function (){
        navigator.mediaDevices.getUserMedia({ audio: true, video: false })
            .then(handleSuccess);
    });








    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
</script>
<script>
var i;
    function changeLocation(i) {
         window.open('{{ LaravelLocalization::getCurrentLocale() }}/'+i);

    }
function changeLocLatesquestion(id) {
   let url="{{route('search2',':id')}}";
   url=url.replace(':id',id);
   window.open(url);

}

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
    var input = document.getElementById("myInput");
    input.addEventListener("keyup", function (event) {

        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("myBtn").click();
        }
    });



    const myBtns = [...document.querySelectorAll('.myBtn')]
    const mores = [...document.querySelectorAll('.more')]

    myBtns.forEach((item, index) => {
        item.addEventListener('click', () => {
            const currentItem = mores[index]
            const currentItem2 = myBtns[index]

            currentItem.style.display = 'block'
            currentItem2.style.display = 'none'
        })
    })

//Get the button
var mybutton = document.getElementsByClassName("scrollToTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        mybutton.style.display = "block";
        mybutton.style.visibility="visible";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

    function myFunction() {

    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("morbtn");

    if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "بیشتر ";
    moreText.style.display = "none";
} else {
    dots.style.display = "none";
    btnText.innerHTML = "کمتر ";
    moreText.style.display = "inline";
}
}

</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('/lib/easing/easing.min.js') }}"></script>
<script src=" {{ asset('/lib/waypoints/waypoints.min.js') }}"></script>
<script src=" {{ asset('/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
@stack('js-libraries')
</body>

</html>
