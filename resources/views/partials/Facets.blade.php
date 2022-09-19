
    <div class=" px-sm-2 px-0   parentsidbar">

        <h6 class="text-center text-white pt-3 pb-4 vazirfont">{{__('public.Refine search results')}}</h6>

        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-75 sidbarmenue" id="parentmenu" >

            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                <!-- کد اضافه شده -->
                <div id="added-item"></div>
                <!-- کد اضافه شده -->


                <li class="mb-3 pb-4 nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed vazirfont pt-2" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                        <i class="fa fa-file-word m-1" id="arrow"></i> {{ __('public.Key phrases') }}
                    </button>
                    <div class="collapse" id="home-collapse" style="">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small mo menue1" id="submenu1">

                            @if(is_array($results) && count($results)>0)



                                @for($k=0;$k<sizeof($results['aggre']['tags']['buckets']);$k++)

                                    <li class="dropdown " onclick="text346('tags[]='+'{{$results['aggre']['tags']['buckets'][$k]['key']}}')"><span class=" pr-20 " id="texttag">{{$results['aggre']['tags']['buckets'][$k]['key']}}</span>  <span class="badge rounded-pill text-white" id="idtag">{{$results['aggre']['tags']['buckets'][$k]['doc_count']}}</span>

                                    </li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="mb-3 pb-4 nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed vazirfont" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        <i class="fa fa-language m-1" id="arrow"></i> {{ __('public.languages') }}
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small mo menue2" id="submenu2" >
                            @if(is_array($results) && count($results)>0)



                                @for($k=0;$k<sizeof($results['aggre']['lang']['buckets']);$k++)

                                    <li class="dropdown  " onclick="text346('langs[]='+'{{$results['aggre']['lang']['buckets'][$k]['key']}}')"><span class=" pr-20 " id="textlang">{{$results['aggre']['lang']['buckets'][$k]['key']}}</span>  <span class="badge rounded-pill text-white">{{$results['aggre']['lang']['buckets'][$k]['doc_count']}}</span>

                                    </li>
                                @endfor
                            @endif

                        </ul>
                    </div>
                </li>
                <li class="mb-3 pb-4 nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed vazirfont" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        <i class="fa fa-check m-1"></i>{{ __('public.Creep resources') }}
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="submenu3">
                            @if(is_array($results) && count($results)>0)






                                @for($k=0;$k<sizeof($results['aggre']['source']['buckets']);$k++)

                                    @php

                                        $owned_urls = array('https://','www.','.net','.com','http://','.ir','us','.');
                                        $string=$results['aggre']['source']['buckets'][$k]['key'];
                                        foreach ($owned_urls as $url) {
                                            if (strpos($string, $url) !== FALSE) {
                                                       $urlme=str_replace($url,'',$string);
                                                      $string=$urlme;
                                            }
                                        }
                                    @endphp
                                    <li class="dropdown  " onclick="text346('source[]='+'{{$results['aggre']['source']['buckets'][$k]['key']}}')"><a href="#"><span class=" pr-20 ">{{$string}}</span>  <span class="badge rounded-pill text-white">{{$results['aggre']['source']['buckets'][$k]['doc_count']}}</span></a>

                                    </li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="mb-3 pb-4 nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed vazirfont" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        <i class="fa fa-user m-1"></i>{{ __('public.References') }}
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="submenu4">
                            @if(is_array($results) && count($results)>0)
                                @for($k=0;$k<sizeof($results['aggre']['marja']['buckets']);$k++)
                                    <li class="dropdown  "><a href="#"><span class=" pr-20 ">{{$results['aggre']['marja']['buckets'][$k]['key']}}</span>  <span class="badge rounded-pill text-white">{{$results['aggre']['marja']['buckets'][$k]['doc_count']}}</span></a>

                                    </li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="mb-3 pb-4 nav-item">
                    <button class="btn btn-toggle align-items-center rounded collapsed vazirfont" data-bs-toggle="collapse" data-bs-target="#account-collapse4" aria-expanded="false">
                        <i class="fa fa-book m-1"></i>{{ __('public.Classification') }}
                    </button>
                    <div class="collapse" id="account-collapse4">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" id="submenu5">
                            @if(is_array($results) && count($results)>0)



                                @for($k=0;$k<sizeof($results['aggre']['category']['buckets']);$k++)

                                    <li class="dropdown  "><a href="#"><span class=" pr-20 ">{{$results['aggre']['category']['buckets'][$k]['key']}}</span>  <span class="badge rounded-pill text-white">{{$results['aggre']['category']['buckets'][$k]['doc_count']}}</span></a>

                                    </li>
                                @endfor
                            @endif


                        </ul>
                    </div>
                </li>











            </ul>


            <hr>

        </div>
    </div>

    <button class="btn  btn-block vazirfont  w-100 mt-2  palayesh"  id="gofacet">اعمال  </button>

