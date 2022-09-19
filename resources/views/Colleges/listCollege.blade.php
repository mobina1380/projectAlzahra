@extends('dashbord')
@push('Links')
@endpush
@section('sidebar')
@component('partials.sidebar')
@endcomponent
@endsection
@section('content')
    <div class="left-side-block">

        @component('partials.headerdashbord')
        @endcomponent

        <main>
            <div class="col-lg-12 mt-4">
                <div class="row">
                    <h1 class="logo">لیست دانشکده ها </h1>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author',['id'=>1])}}">دانشکده ادبیات</a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>2])}}">دانشکده الهیات</a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>3])}}">دانشکده علوم ورزشی</a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>4])}}">دانشکده علوم اجتماعی</a></h5>
                            </div>
                        </div></div>




                </div>
                <div class="row mt-3">
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>5])}}">دانشکده علوم تربیتی </a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>6])}}">دانشکده علوم ریاضی</a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>7])}}">دانشکده علوم زیستی</a></h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>8])}}">دانشکده فنی مهندسی</a> </h5>
                            </div>
                        </div></div>




                </div>
                <div class="row mt-3">
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"> <a href="{{route('author2',['id'=>9])}}">دانشکده فیزیک شیمی</a> </h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>10])}}">دانشکده هنر</a> </h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>11])}}">شعبه ارومیه</a> </h5>
                            </div>
                        </div></div>
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>12])}}"> پژوهشکده زنان</a></h5>
                            </div>
                        </div></div>




                </div>
                <div class="row mt-3">
                    <div class="col-lg-3"><div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('author2',['id'=>13])}}"> پژوهشکده مطالعات اقتصادی </a>  </h5>
                            </div>
                        </div></div>





                </div>
            </div>
        </main>
    </div>
@endsection




