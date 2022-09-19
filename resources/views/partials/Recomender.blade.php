
<div class="card-box mb-30 Recomender" id="lasttext">

   <p class="font-14" style="text-align: center">سوال های پیشنهادی </p>


    <div class="list-group list2">





        @if(isset($getviewquestion) && count($getviewquestion)>0)

            @for($getview=0;$getview<8;$getview++)




                    <a href="{{route('search2',['id'=>$getviewquestion[$getview]['_id']

                      ])}}" target="-_blank" class="list-group-item d-flex align-items-center justify-content-between font-12"> &#128279;{{\Illuminate\Support\Str::limit($getviewquestion[$getview]['_source']['question'], 23, $end='...')}}
                        <br>


                    </a>


            @endfor
        @else

        @endif
















    </div>
</div>
