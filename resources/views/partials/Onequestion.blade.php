

<div id="question-summary-71567913" class="s-post-summary js-post-summary"
     data-post-id="71567913" data-post-type-id="1">
    <div class="s-post-summary--stats js-post-summary-stats">


        <div
            class="s-post-summary--stats-item s-post-summary--stats-item__emphasized text-secondary"
            title="Score of 0">
                                                        <span
                                                            class="s-post-summary--stats-item-number mr4">@if(isset($result['vote'])){{$result['vote']}}@endif</span><span
                class="s-post-summary--stats-item-unit mr-1  "> {{ __('public.Vote') }} </span>
        </div>
        <div class="s-post-summary--stats-item  text-secondary"
             title="0 answers">
                                                        <span
                                                            class="s-post-summary--stats-item-number mr4">

                                                               @if(isset( $results['data'][$i]['answer'] ) && is_array( $results['data'][$i]['answer']))
                                                          <?php $siz=(sizeof($results['data'][$i]['answer']));  echo $siz;?>


                                                                   @else
                                                            1
                                                            @endif

                                                        </span><span
                class="s-post-summary--stats-item-unit  mr-1 ">{{ __('public.Response') }}    </span>
        </div>
        <div class="s-post-summary--stats-item text-secondary vazirfont"
             title="2 views">
                                                        <span
                                                            class="s-post-summary--stats-item-number vazirfont mr4">@if(isset($result['view'])) {{$result['view']}}@endif</span><span
                class="s-post-summary--stats-item-unit mr-1   ">{{ __('public.Visit') }}  </span>
        </div>


    </div>
    <div class="s-post-summary--content">

        <p class="s-post-summary--content-title " data-bs-toggle="tooltip"
           data-bs-placement="top" title="{{$result['question']}}">
            @if(isset($_GET['section']))
                <a href="{{route('search2',['id'=>$result['id'],'subject'=>$result['subject']

                      ])}}" target="_blank" class="s-link  text-primary">

                    @else
                        <a href="{{route('search2',['id'=>$result['id'],'subject'=>$result['subject']

                      ])}}" target="_blank" class="s-link text-primary">
                            @endif


                            <?php
                            $str1 = $results['data'][$i]['question'];

                            $word = 'Q';
                            if(!is_array($str1)){
                            if(strpos($str1, $word) !== false){

                                $first_pos = strpos($str1, $word);

                                $last_pos = strrpos($str1, $word);

                                $sub1 = substr($str1, $first_pos + 1, $last_pos - ($first_pos + 1));
                                $str2 = str_replace('{Q', " ", $str1);
                                $str3 = str_replace('Q}', " ", $str2);
                                $finalstr = str_replace($sub1, "<b class='text-success vazirfont'>$sub1</b>", $str3);
                                echo $finalstr;
                            } else{ ?>


                            @if(isset($results['data'][$i]['highlight']))
                                @if(isset($results['data'][$i]['highlight']['question.stem'][1]))
                                    {!! $results['data'][$i]['highlight']['question.stem'][1] !!}
                                @elseif(isset($results['data'][$i]['highlight']['question.stem'][0]))
                                   {!! $results['data'][$i]['highlight']['question.stem'][0] !!}
                                @endif
                            @else
                                @if( isset($result['question']) &&  strlen($result['question'])<=400)
                                    {{$result['question']}}
                                @else
                                    {!! \Illuminate\Support\Str::limit($result['question'],200, $end='....') !!}

<!--                                    --><?php //echo   substr($result['question'], 0, 200).' <a href="" class="text-success"> مطالعه بیشتر...</a>';
//                                    ?>
                                @endif
                            @endif


                            <?php

                            }

                            }


                            ?>
                        </a>
        </p>
        <div class="s-post-summary--meta">
            <div
                class="s-post-summary--meta-tags tags js-tags t-python t-pdf t-visual-studio-code t-jupyter-notebook">

                @if(is_array($result['tags']))
                    @foreach($result['tags'] as $tag)

                    @if(isset($_GET['q']) && $tag==$_GET['q'])
                            <a href="{{route('GetAllTags',['tag'=>$tag])}}"
                               class="post-tag flex--item mt0 js-tagname-python" style="color: orange"
                               title="" rel="tag"> {{$tag}}</a>
                        @else
                            <a href="{{route('GetAllTags',['tag'=>$tag])}}"
                               class="post-tag flex--item mt0 js-tagname-python"
                               title="" rel="tag"> {{$tag}}</a>
                        @endif


                    @endforeach
                @endif
                    <br>

                @if(isset($_GET['category']))

                    @foreach($result['category'] as $category)

                        <a href="{{route('cats',['category'=>$category])}}" class="post-tag flex--item mt0  js-tagname-python " style="background-color: #AEFEFF" title="" rel="tag"> {{$category}}</a>
                    @endforeach
                @endif
            </div>


            <div class="s-user-card s-user-card__minimal ">
                <time class="s-user-card--time ">
                    @if(isset($result['date']))
                    <a href="#" class="s-link s-link__muted text-muted">{{__('public.Created in')}}

                            <span title=""

                                  class="relativetime vazirfont">{{$result['date']}}  </span></a>



                    @endif


                    @if(isset($result['source']['url']))
                       @php

                        $owned_urls = array('https://','www.','.net','.com','http://','.ir','us','.');
                        $string=$result['source']['url'];
                        foreach ($owned_urls as $url) {
                            if (strpos($string, $url) !== FALSE) {
                                       $urlme=str_replace($url,'',$string);
                                      $string=$urlme;
                            }
                        }
                        @endphp

                    <a href="{{$result['link']}}" target="_blank"
                       class="text-primary"> {{$string}}</a>

                </time>
                <a href=""
                   class="s-avatar s-avatar__16 s-user-card--avatar">
                    <div class="gravatar-wrapper-16 js-user-hover-target"
                         data-user-id="5854688">

                       @php  if (strpos($result['source']['url'],'//') !== FALSE) {
                                   $link=explode('//',$result['source']['url'])[1];

                            }
                       else{
                           $link=$result['source']['url'];
                       }
                       @endphp


                        <a href="{{route('dyscriptlinks',['link'=>$link,'persianname'=>$result['source']['persian_name'],'string'=>$string,'marjaname'=>$result['marja']])}} " target="_blank" >   <img src="/images/{{$string}}.png" alt="user avatar"
                                                                                                                                                   width="20" ,="" height="20"
                                                                                                                                                   class="s-avatar--image"></a>

                    </div>
                </a>
                @endif


            </div>

        </div>
    </div>
</div>
