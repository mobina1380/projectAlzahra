@if(isset($simularityquestionlast) && count($simularityquestionlast)>0)
    <div class="card py-2">@if(isset($simularityquestionlast) && count($simularityquestionlast)>0)
            <h5 class="text-center mb-3">سوالات مشابه </h5>
            @for($j=0;$j<sizeof($simularityquestionlast)-1;$j++)

                @if(strlen($simularityquestionlast[$j]['hits']['hits'][0]['_source']['question'])<=25)

                    <div class="col-12 mb-2 d-flex justify-content-center no-wrap">
                        <div class="col-10 px-2">    <a href=" {{$simularityquestionlast[$j]['hits']['hits'][0]['_id']}}"   target="_blank" class=" d-flex align-items-center justify-content-between font-14 p-3 text-light">
                                &#10004; {{$simularityquestionlast[$j]['hits']['hits'][0]['_source']['question']}}
                            </a></div>

                        @else
                            <div class="col-12 mb-2 d-flex justify-content-center no-wrap">
                                <div class="col-10 px-2">     <a href="{{$simularityquestionlast[$j]['hits']['hits'][0]['_id']}}" target="-_blank" >  &#10004; {{\Illuminate\Support\Str::limit($simularityquestionlast[$j]['hits']['hits'][0]['_source']['question'], 25, $end='...')}}
                                    </a>
                                </div>


                                @endif
                                @php if(round($simularityquestionlast[$j]['0']*100,2)>90) {
                                         $colorclass='bg-success';
                                           }
                                           else if(round($simularityquestionlast[$j]['0']*100,2)>70){
                                                 $colorclass='bg-warning';
                                           }
                                           else if(round($simularityquestionlast[$j]['0']*100,2)>50){
                                                 $colorclass='bg-danger';
                                           }
                                           else if(round($simularityquestionlast[$j]['0']*100,2)<=50){
                                                 $colorclass='bg-danger';
                                           }
                                @endphp

                                <div class="col-2 px-2 {{$colorclass}}  text-center" style="font-size: 11px">{{@round($simularityquestionlast[$j]['0']*100,2)}}</div>


                            </div>
                            @endfor
                        @endif
                    </div>
                @else
    <div class="card-box  " id="lasttext">

        <h5 class="p-4 vazirfont text-center text-white"> سوالات مشابه </h5>


        <div class="list-group list2">

            <a href="#"   target="_blank" class="list-group-item d-flex align-items-center justify-content-between">
                <h6 class="p-1 vazirfont"> &#128543;متاسفانه سوال مشابهی یافت نشد </h6>
            </a>

        </div>
    </div>

@endif


















{{--<div class="pd-20 card-box boxsimularity">--}}

{{--    <h5 class="h5 mb-5 vazirfont">{{ __('public.Related questions') }} </h5>--}}
{{--    --}}{{--                @if(isset($relatedQuestionPercent) && $relatedQuestionPercent != [])--}}
{{--    --}}{{--                    @foreach($relatedQuestionPercent as $i=>$relatedQuestionPer)--}}

{{--    --}}{{--                        <hr>--}}
{{--    --}}{{--                        {{$relatedQuestionPer['sort'][0]}}--}}
{{--    --}}{{--                    <!--                                --><?php //dd($relatedQuestionPer['sort'][0]); ?>--}}

{{--    --}}{{--                    @endforeach--}}
{{--    --}}{{--                @endif--}}
{{--    @if( isset($relatedQuestion) && is_array($relatedQuestion) && count($relatedQuestion)>0)--}}
{{--        @foreach($relatedQuestion as $i=>$question)--}}

{{--<?php //dd($relatedQuestion); die(); ?>--}}



{{--            <p ><a href="{{route('test1',[ 'id'=>$question['_id']--}}

{{--                      ])}}" class="green1">--}}

{{--                    @if(isset($question['_source']['short_question']['question']))--}}

{{--                        {{$question['_source']['short_question']['question']}}--}}
{{--                    @else--}}

{{--                        {{$question['_source']['full_question']}}--}}
{{--                    @endif--}}


{{--                </a></p>--}}
{{--            <hr>--}}
{{--        @endforeach--}}
{{--    @else--}}
{{--        <p class="text-danger">{{ __('public.No related questions available') }}</p>--}}
{{--    @endif--}}

{{--</div>--}}
