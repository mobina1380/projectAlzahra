
@component($dir.'.componentServices.services')
@section('title')
    {{__('public.Question text classification service')}}
@endsection
@section('text')
    <p style="color:#35858B">{{__('public.classificationText1')}}
    </p>
    <h5 style="background-color:#AEFEFF">{{__('public.classificationText2')}}</h5>
    <p>{{__('public.classificationText3')}}
    </p>
     <h5 style="background-color:#AEFEFF">{{__('public.classificationText4')}}</h5>
    <p>
        {{__('public.classificationText5')}}
    </p>
    <h5 style="background-color:#AEFEFF">{{__('public.classificationText6')}}</h5>
    <p>{{__('public.classificationText7')}}</p>
    <h5 style="background-color:#AEFEFF">{{__('public.classificationText8')}}</h5>
   <p>{{__('public.classificationText9')}}
   </p>
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
                    <br>
                    <select class="form-select mb-3"  id="select" aria-label="Default select example">
                        <option selected hidden>مدل رده بندی خود را انتخاب نمایید </option>
                        <option value="category">دسته بندی</option>
                        <option value="age">سن</option>
                        <option value="gender">جنسیت</option>
                    </select>
                    <select class="form-select"  id="select2" aria-label="Default select example">
                        <option selected hidden>زبان خود را انتخاب کنید </option>
                        <option value="fa">فارسی</option>
                        <option value="ar">عربی</option>

                    </select>
                    <button type="" class="btn  mb-3 submit sabt">ارسال</button>

                </div>
            </form>
            <br>
            <div class="output" style="height: auto"></div>
        </div>


        <div class="col-lg-4">  <img src="{{asset('images/classific.png')}}" alt="" class="wow fadeInLeft " data-wow-delay="0.5s"></div>
    </div>
    <div class="div" style="width: 100%;height:auto">
    </div>
@endpush

@endcomponent

<script>

    $("form").submit(function (ev) {
        let resonsearray= [];
        var your_selected_value = $('#select option:selected').val();
        var language = $('#select2 option:selected').val();
        $.ajax({
            "url": "{{route('Classification')}}",
            "type" : "POST",
            dataType: "json",
            "data":{
               'text': $("form").serialize(),
                'model':your_selected_value,
                'lang':language,
            },
            "success":function(res){
                console.log(res)
             //   console.log($("form").serialize());
              //  console.log(your_selected_value)
                // $.each(res, function (key, value) {
                //     resonsearray=value;
                // })

                $(".output").html(`

 <div class="container-xxl mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-12  mx-auto">
<div class="card   mb-3" style="background-color: #AEFEFF">
  <div class="card-header"> رده بندی متن سوال شما   :</div>
  <div class="card-body">
    <p class="card-text text-danger "> 1 )  رده بندی   :  ${res}</p>


<br>
  </div>
</div></div></div></div>

            `)
            },
            "error":function(){
                alert("error")
            }
        })
        ev.preventDefault();
    })
</script>
