@include('rtl.layouts.header')
<div class="container-fluid mt-8">
{{--    <div class="page-header">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-sm-12">--}}


{{--                <form aria-label="breadcrumb " role="navigation" style="display: flex;justify-content: flex-end;" >--}}

{{--                    <ol class="  w-75 mt-3 mr-3">--}}


{{--                        @if(is_array($results) && count($results)>0)--}}
{{--                            <li class="breadcrumb-item "><a href="#" class="pr-2">--}}
{{--                                    <h5 class="mr-5 text-secondary"> {{$results['count']}} {{ __('public.items found') }}/   <span class="text-danger vazirfont">{{@round($results['took']/60,3)}}{{__('public.Seconds')}}</span> </h5>--}}
{{--                                </a></li>--}}


{{--                        @endif--}}

{{--                    </ol>--}}

{{--                    <div class="col-4">--}}
{{--                        <form action="{{route('search')}}" method="get" id="searchForm">--}}
{{--                            <div class="input-group">--}}
{{--                                @if(is_array($results) && count($results)>0)--}}
{{--                                    <input class="form-control  fontina vazirfont" id="myInput" name="q"  type="text" value=" {{$results['query']}}"  aria-describedby="button-search">--}}
{{--                                @else--}}
{{--                                    <input class="form-control  vazirfont"  id="myInput" name="q"  type="text" placeholder={{__('public.search1')}}  aria-describedby="button-search">--}}
{{--                                @endif--}}
{{--                                <button class="btn btn-secondary " id="button-search" type="submit"><i class="fa fa-search"></i></button>--}}
{{--                            </div>--}}
{{--                        </form></div>--}}

{{--                    </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
