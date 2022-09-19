@component($dir.'.componentServices.services')
@section('title')
    {{__('public.Question text summary service')}}
@endsection
@section('text')
    {{ __('public.Questionsummary2') }}
@endsection


@push('othercode')
    <div class="row mx-auto d-flex justify-content-center">
        <div class="col-lg-8 wow fadeInRight  mr-3  mt-4 formexample"  data-wow-delay="0.5s"  >

            <form method="post">
                <div class="inputs">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="mb-1 text-right">سوال خود را جهت خلاصه سازی وارد نمایید </label>
                        {{--                            <input type="text" class="form-control text-right" name="text">--}}

                        <textarea  class="form-control text-right" id="w3review" name="text" rows="4" cols="50"></textarea>
                    </div>

                    <button type="" class="btn  mb-3 submit sabt">ارسال</button>

                </div>
            </form>
            <br>
            <div class="output"></div>
        </div>


        <div class="col-lg-4 ">  <img src="{{asset('images/machine.gif')}}" alt="" class="wow fadeInLeft mt-3 mr-3" data-wow-delay="0.5s"></div>
    </div>
    <div class="div" style="width: 100%;height: 100px">
    </div>
@endpush
@endcomponent

<script>

    $("form").submit(function (ev) {
        let resonsearray= [];
        $.ajax({
            "url": "{{route('Summarization')}}",
            "type" : "POST",
            dataType: "json",
            "data":$("form").serialize(),
            "success":function(res){
                text1=res['question_summary1'];
                text2=res['question_summary2'];
                $.each(res, function (key, value) {
                    resonsearray=value;
                })

                $(".output").html(`

 <div class="container-xxl mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-12  mx-auto">
<div class="card   mb-3" style="background-color: #AEFEFF">
  <div class="card-header"> خلاصه شده ی سوال شما   :</div>
  <div class="card-body">
    <p class="card-text text-danger "> 1 )  متن خلاصه شده   :  ${text1}</p>
    <p class="card-text text-danger ">2 )    متن خلاصه شده  : ${text2}</p>

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
