<div class="card-box mb-30  ">

    <div class="sidebar dastabandi">
        <ul class="bg-green">
            <li><a href="#" class=" bg-green"><h5
                        class="pd-2 h5 mb-0 vazirfont text-white mr-3 text-center mb-2">{{ __('public.tags') }}</h5></a></li>
        </ul>

        @if(is_array($sim))

            @for($k=1;$k<=sizeof($sim)-1;$k++)


                <ul class="tagssim">
                    <li class="dropdown  "><a href="{{route('GetAllTags',['tag'=>$sim[$k]['key']])}}"><span class=" pr-20 ">  {{\Illuminate\Support\Str::limit($sim[$k]['key'], 10, $end='...')}}</span>  <span class="badge rounded-pill text-white">{{$sim[$k]['doc_count']}}</span></a>

                    </li>

                </ul>
            @endfor
        @endif



        <i class="bi bi-list mobile-nav-toggle"></i>

    </div>
</div>
