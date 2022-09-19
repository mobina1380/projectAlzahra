<div class="right-side-block">
    <aside>
        <span class="material-icons material-icons-outlined bars">menu</span>
        <div class="">
            <div class="">
                <img src="{{asset('images/logodash.png')}}" style="width:100px; height: auto; margin-right: 30%; margin-top: 10%">
            </div>
            <span class="profile__name mt-3"> داشبورد ادمین</span>

            @if(strpos(LaravelLocalization::getLocalizedURL(), 'news') !== false)
                @php $classActiveNews='is-active'; @endphp
            @else
                @php $classActiveNews=''; @endphp
            @endif

            @if(strpos(LaravelLocalization::getLocalizedURL(), '/events') !== false)
                @php $classActiveEvents='is-active'; @endphp
            @else
                @php $classActiveEvents=''; @endphp
            @endif
            @if(strpos(LaravelLocalization::getLocalizedURL(), '/listCollege') !== false)
                @php $classActiveListColleges='is-active'; @endphp
            @else
                @php $classActiveListColleges=''; @endphp
            @endif
{{--            <span class="profile__skill">مبینااسمعیلی</span>--}}
        </div>
        <br>
        <ul class="listitem">
            <li  class="{{$classActiveNews}}"><a href="/news" ><span class="material-icons material-icons-outlined ic">dashboard</span>اخبار </a></li>
            <li class="{{$classActiveEvents}}"><a href="/events"  ><span class="material-icons material-icons-outlined ic">table_view</span>رویداد ها</a></li>
            <li class="{{$classActiveListColleges}}"><a href="{{route('listCollege')}}"><span class="material-icons material-icons-outlined ic">dynamic_form</span>دانشکده ها </a></li>
            <li><a href="setting.html"><span class="material-icons material-icons-outlined ic">account_circle</span>حساب کاربری</a></li>
        </ul>
    </aside>

</div>
