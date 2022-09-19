@component($dir.'.componentServices.services')
@section('title')
    {{__('public.Keyword extraction service')}}
@endsection
@section('text')
    {{ __('public.Keyword extraction service Text') }}
@endsection
@push('othercode')
    <div class="row mx-auto d-flex justify-content-center">
        <div class="col-lg-8 wow fadeInRight  mr-3  mt-4 formexample"  data-wow-delay="0.5s"  >



            <form method="post">
                <div class="inputs">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="mb-1 text-right">نمونه ورودی خود را وارد نمایید </label>
                        {{--                            <input type="text" class="form-control text-right" name="text">--}}

                        <textarea  class="form-control text-right" id="w3review" name="text" rows="4" cols="50"></textarea>
                    </div>

                    <button type="" class="btn  mb-3 submit sabt">ارسال</button>

                </div>
            </form>
            <br>
            <div class="output" id="output" style="height: auto"></div>
        </div>


        <div class="col-lg-4 ">  <img src="{{asset('images/key.png')}}" alt="" class="wow fadeInLeft mt-3 mr-3" data-wow-delay="0.5s"></div>
    </div>
    <div class="div" style="width: 100%;height: 400px">
    </div>
@endpush

@endcomponent
<script>

    $("form").submit(function (ev) {
        let resonsearray= [];
       let arraylist2=[];
        $.ajax({
            "url": "{{route('submitTag')}}",
            "type" : "POST",
            dataType: "json",
            "data":$("form").serialize(),
            "success":function(res){
                $.each(res, function (key, value) {
                    resonsearray=value;
                })

               // console.log(resonsearray[1])
                for(j=0;j<resonsearray.length;j++){
                    arraylist2=resonsearray[j];
                    console.log(arraylist2)
                }

                indexme=(`${resonsearray}`.split(','));
                for (attribute in indexme) {
                   // console.log(`${indexme[attribute]}`);
                }
                var array = ['salam', 'mobina'];

                var content = document.getElementById("output");

                for(var i=0; i<resonsearray.length;i++){
                    content.innerHTML += '  <div class="container-xxl ">  <div class="row"> <div class="col-lg-12 col-md-12  mx-auto"><div class="card " style="background-color: #AEFEFF">  <div class="card-body text-danger"><p>'+'&#9997;'+'تگ  '+ eval(i+1) + ' : '+  resonsearray[i] +'<br>' +'</p></div></div></div></div></div>';
                }
//                 $(".output").html(`
//
//  <div class="container-xxl mb-4">
//         <div class="row">
//             <div class="col-lg-12 col-md-12  mx-auto">
// <div class="card   mb-3" style="background-color: #AEFEFF">
//   <div class="card-header">تگ های نمونه ورودی   :</div>
//   <div class="card-body">
//     <p class="card-text">
// ${resonsearray}</p>
// <br>
//   </div>
// </div></div></div></div>
//
//             `)
            },
            "error":function(){
                alert("error")
            }
        })
        ev.preventDefault();
    })
</script>
