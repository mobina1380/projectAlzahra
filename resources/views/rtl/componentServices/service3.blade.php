@component($dir.'.componentServices.services')
@section('title')
    {{__('public.Writing error correction service')}}
@endsection
@section('text')
    {{ __('public.Writing error correction service Text') }}
@endsection

@push('othercode')


    <div class="row mx-auto d-flex justify-content-center">
        <div class="col-lg-8 wow fadeInRight  mr-3  mt-4 formexample"  data-wow-delay="0.5s"  >



                    <form method="post" >
                        <div class="inputs">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="mb-1 text-right">نمونه ورودی خود را وارد نمایید </label>
                                {{--                            <input type="text" class="form-control text-right" name="text">--}}

                                <textarea  class="form-control text-right" id="w3review" name="text" rows="4" cols="50"></textarea>
                            </div>

                            <button type="submit" class="btn  mb-3 submit sabt">ارسال</button>

                        </div>
                    </form>
                    <br>
                    <div class="output" style="height: auto"></div>
                </div>


        <div class="col-lg-4">  <img src="{{asset('images/tt.png')}}" alt="" class="wow fadeInLeft " data-wow-delay="0.5s"></div>
    </div>
<div class="div" style="width: 100%;height: 300px">
</div>
@endpush
@endcomponent

<script>

    $("form").submit(function (ev) {
        $.ajax({
            "url": "{{route('submit')}}",
            "type" : "POST",
            dataType: "json",
            "data":$("form").serialize(),
            "success":function(res){
                console.log(res['Output'])
                //const parser = new DOMParser();
                //let doc = parser.parseFromString(res, "text/html");
                $(".output").html(`

 <div class="container-xxl mb-4">
        <div class="row">
            <div class="col-lg-12 col-md-12  mx-auto">


<div class="card   mb-3" style="background-color: #AEFEFF">
  <div class="card-header">خروجی نمونه  :</div>
  <div class="card-body">

    <p class="card-text">
${res['Output']}</p>
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
