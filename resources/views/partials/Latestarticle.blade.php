
<div class="card-box mb-30 " id="lasttext">

        <img src="{{asset('images/lates.png')}}" class="card-img-top" alt="...">


    <div class="list-group list2">

        @if(is_array($getLatestquestion) && count($getLatestquestion)>0)

            @for($getLates=0;$getLates<sizeof($getLatestquestion)-1;$getLates++)


                        @if(strlen($getLatestquestion[$getLates]['_source']['question'])<=45)

                    <a href="{{route('search2',['id'=>$getLatestquestion[$getLates]['_id']

                      ])}}  "   target="_blank" class="list-group-item d-flex align-items-center justify-content-between font-12">
                       - {{$getLatestquestion[$getLates]['_source']['question']}}
                        <br>
                        تاریخ :{{$getLatestquestion[$getLates]['_source']['date']}}
                    </a>
                        @else
                                <a href="{{route('search2',['id'=>$getLatestquestion[$getLates]['_id']

                      ])}}" target="-_blank" class="list-group-item d-flex align-items-center justify-content-between font-12">- {{\Illuminate\Support\Str::limit($getLatestquestion[$getLates]['_source']['question'], 43, $end='...')}}
                                    <br>
                                    &#128204;   تاریخ :{{$getLatestquestion[$getLates]['_source']['date']}}

                                </a>

                        @endif


            @endfor
        @endif

    </div>
</div>


<div class="card-box mb-30 " id="lasttext">

        <img src="{{asset('images/abstract-brainstorm.gif')}}" class="card-img-top" alt="...">


    <div class="list-group list2">

        <a href="{{route('service',['id'=>1])}}"   target="_blank" class="list-group-item d-flex align-items-center justify-content-between">
        مشاهده محصوالات ما  -->
        </a>

    </div>
</div>
<div class="card-box mb-30 " id="lasttext">

        <img src="{{asset('images/11.png')}}" class="card-img-top" alt="...">


    <div class="list-group list2">

        <a href="https://www.aparat.com/v/iBdka"   target="_blank" class="list-group-item d-flex align-items-center justify-content-between">
         ویدیو معرفی تیم پارسا و اعضای آن
        </a>

    </div>
</div>
