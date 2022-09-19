<div class="card-box mb-30 boxdesktop ">

    <div class="sidebar dastabandi">
        <ul class="bg-green">
            <li><a href="#" class=" bg-green"><h5
                        class="pd-2 h5 mb-0 vazirfont text-white mr-3 text-center ">{{ __('public.All categories') }}</h5></a></li>
        </ul>
        <ul>

            <li class="dropdown "><a href="{{route('Treeclassification',['cat'=>__('public.The Holy Quran')])}}"><span class=" pr-20 pl-4 "> {{ __('public.The Holy Quran') }}</span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>

                    <li><a href="#">علوم قرآن</a></li>
                    <li><a href="#" class="">اعتقادات در قرآن</a></li>
                    <li><a href="#" class="">ترجمه و تفسیر</a></li>


                    <li><a href="#">آداب و اخلاق در قرآن</a></li>
                    <li><a href="#">احکام در قرآن</a></li>
                    <li><a href="#">علوم انسانی ، طبیعی و مهندسی در قرآن  </a></li>
                    <li><a href="#">قصه ها و تمثیلات قرآن  </a></li>
                    <li><a href="#">شبهات درباره قرآن </a></li>
                    <li><a href="#">سیرمطالعاتی ، شخصیت ها ، منابع و مراکز قرآنی  </a></li>
                    <li><a href="#">مفاهیم و معارف قرآنی  </a></li>
                </ul>
            </li>

        </ul>
        <ul>
            <li class="dropdown "><a href="#"><span class=" pr-20 pl-4">  {{ __('public.Hadith') }}</span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#" >تاریخ حدیث</a></li>
                    <li><a href="#" >منبع و سند حدیث</a></li>

                    <li><a href="#">متن و محتوای حدیث</a></li>
                    <li><a href="#">اصطلاحات حدیث</a></li>
                    <li><a href="#">اسرائیلیات در حدیث </a></li>
                </ul>
            </li>

        </ul>
        <ul>
            <li class="dropdown "><a href="#"><span class=" pr-20 pl-4"> {{ __('public.Beliefs and words') }} </span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#" class="">شناخت شناسی</a></li>
                    <li><a href="#" class="">خدا شناسی</a></li>
                    <li><a href="#" class="">پیامبر شناسی</a></li>
                    <li><a href="#" class="">امام شناسی</a></li>
                    <li><a href="#" class="">معاد شناسی</a></li>
                    <li><a href="#" class="">هستی شناسی</a></li>
                    <li><a href="#" class=""> مسائل گوناگون اعتقادی</a></li>
                    <li><a href="#" class="">مباحثی از کلام جدید</a></li>

                </ul>
            </li>


        </ul>
        <ul>
            <li class="dropdown"><a href="#"><span class="pr-20 pl-4">{{ __('public.Rulings') }} </span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#">اجتهاد و تقلید </a>
                    <li><a href="#">تکلیف و بلوغ</a>
                    <li><a href="#">طهارت</a>
                    <li><a href="#">نماز</a>
                    <li><a href="#">روزه </a>
                    <li><a href="#">اعتکاف </a>
                    <li><a href="#">خمس </a>
                    <li><a href="#">زکات </a>
                    <li><a href="#">حج </a>
                    <li><a href="#">جهاد </a>
                    <li><a href="#">ازدواج </a>
                    <li><a href="#">طلاق </a>
                    <li><a href="#">محرم و نامحرم </a>
                    <li><a href="#">نگاه، پوشش و معاشرت </a>
                    <li><a href="#">خانواده </a>
                    <li><a href="#">خوردنی ها و آشامیدنی ها </a>
                    <li><a href="#">امر به معروف ونهی از منکر </a>
                    <li><a href="#">موسیقی ، غنا و لهویات </a>
                    <li><a href="#">مالی،بانکی،معاملات </a>
                    <li><a href="#">حدود،قصاص،دیات </a>
                    <li><a href="#">اموات </a>
                    <li><a href="#">نذر،عهدوقسم </a>
                    <li><a href="#">احکام قضائی </a>
                    <li><a href="#">احکام اخلاقی </a>
                    <li><a href="#">پزشکی </a>
                    <li><a href="#">مسابقات،تفریحات </a>
                    <li><a href="#">فلسفه،احکام </a>
                    <li><a href="#">اصطلاحات فقهی </a>
                    <li><a href="#">گوناگون </a>


                    </li>
                </ul>

            </li>
        </ul>
        <ul>
            <li class="dropdown"><a href="#"><span class="pr-20 pl-4">{{ __('public.History and manners') }}</span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#">اجتهاد و تقلید </a>
                    <li><a href="#">تکلیف و بلوغ</a>
                    <li><a href="#">طهارت</a>
                    <li><a href="#">نماز</a>
                    <li><a href="#">روزه </a>
                    <li><a href="#">اعتکاف </a>
                    <li><a href="#">خمس </a>
                    <li><a href="#">زکات </a>
                    <li><a href="#">حج </a>
                    <li><a href="#">جهاد </a>
                    <li><a href="#">ازدواج </a>
                    <li><a href="#">طلاق </a>
                    <li><a href="#">محرم و نامحرم </a>
                    <li><a href="#">نگاه، پوشش و معاشرت </a>
                    <li><a href="#">خانواده </a>
                    <li><a href="#">خوردنی ها و آشامیدنی ها </a>
                    <li><a href="#">امر به معروف ونهی از منکر </a>
                    <li><a href="#">موسیقی ، غنا و لهویات </a>
                    <li><a href="#">مالی،بانکی،معاملات </a>
                    <li><a href="#">حدود،قصاص،دیات </a>
                    <li><a href="#">اموات </a>
                    <li><a href="#">نذر،عهدوقسم </a>
                    <li><a href="#">احکام قضائی </a>
                    <li><a href="#">احکام اخلاقی </a>
                    <li><a href="#">پزشکی </a>
                    <li><a href="#">مسابقات،تفریحات </a>
                    <li><a href="#">فلسفه،احکام </a>
                    <li><a href="#">اصطلاحات فقهی </a>
                    <li><a href="#">گوناگون </a>


                    </li>
                </ul>

            </li>
        </ul>
        <ul>
            <li class="dropdown"><a href="#"><span class="pr-20 pl-4">{{ __('public.Islamic ethics and education') }}</span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#">اجتهاد و تقلید </a>
                    <li><a href="#">تکلیف و بلوغ</a>
                    <li><a href="#">طهارت</a>
                    <li><a href="#">نماز</a>
                    <li><a href="#">روزه </a>
                    <li><a href="#">اعتکاف </a>
                    <li><a href="#">خمس </a>
                    <li><a href="#">زکات </a>
                    <li><a href="#">حج </a>
                    <li><a href="#">جهاد </a>
                    <li><a href="#">ازدواج </a>
                    <li><a href="#">طلاق </a>
                    <li><a href="#">محرم و نامحرم </a>
                    <li><a href="#">نگاه، پوشش و معاشرت </a>
                    <li><a href="#">خانواده </a>
                    <li><a href="#">خوردنی ها و آشامیدنی ها </a>
                    <li><a href="#">امر به معروف ونهی از منکر </a>
                    <li><a href="#">موسیقی ، غنا و لهویات </a>
                    <li><a href="#">مالی،بانکی،معاملات </a>
                    <li><a href="#">حدود،قصاص،دیات </a>
                    <li><a href="#">اموات </a>
                    <li><a href="#">نذر،عهدوقسم </a>
                    <li><a href="#">احکام قضائی </a>
                    <li><a href="#">احکام اخلاقی </a>
                    <li><a href="#">پزشکی </a>
                    <li><a href="#">مسابقات،تفریحات </a>
                    <li><a href="#">فلسفه،احکام </a>
                    <li><a href="#">اصطلاحات فقهی </a>
                    <li><a href="#">گوناگون </a>


                    </li>
                </ul>

            </li>
        </ul>
        <ul>
            <li class="dropdown"><a href="#"><span class="pr-20 pl-4"> {{ __('public.Social and political') }}</span> <i class="fa fa-arrow-{{(LaravelLocalization::getCurrentLocaleDirection() =="ltr") ? 'right' : 'left'}}"></i></a>
                <ul>
                    <li><a href="#">اجتهاد و تقلید </a>
                    <li><a href="#">تکلیف و بلوغ</a>
                    <li><a href="#">طهارت</a>
                    <li><a href="#">نماز</a>
                    <li><a href="#">روزه </a>
                    <li><a href="#">اعتکاف </a>
                    <li><a href="#">خمس </a>
                    <li><a href="#">زکات </a>
                    <li><a href="#">حج </a>
                    <li><a href="#">جهاد </a>
                    <li><a href="#">ازدواج </a>
                    <li><a href="#">طلاق </a>
                    <li><a href="#">محرم و نامحرم </a>
                    <li><a href="#">نگاه، پوشش و معاشرت </a>
                    <li><a href="#">خانواده </a>
                    <li><a href="#">خوردنی ها و آشامیدنی ها </a>
                    <li><a href="#">امر به معروف ونهی از منکر </a>
                    <li><a href="#">موسیقی ، غنا و لهویات </a>
                    <li><a href="#">مالی،بانکی،معاملات </a>
                    <li><a href="#">حدود،قصاص،دیات </a>
                    <li><a href="#">اموات </a>
                    <li><a href="#">نذر،عهدوقسم </a>
                    <li><a href="#">احکام قضائی </a>
                    <li><a href="#">احکام اخلاقی </a>
                    <li><a href="#">پزشکی </a>
                    <li><a href="#">مسابقات،تفریحات </a>
                    <li><a href="#">فلسفه،احکام </a>
                    <li><a href="#">اصطلاحات فقهی </a>
                    <li><a href="#">گوناگون </a>


                    </li>
                </ul>

            </li>
        </ul>
        <ul><li><a href="#"><span class="pr-20 pl-4">{{ __('public.Miscellaneous') }}</span></a> </li></ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

    </div>
</div>
