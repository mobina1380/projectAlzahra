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
                <div class="main-content container-fluid">


                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-lg-8 margin-tb">
                                <div class="pull-left mb-2">
                                    <h2>اضافه کردن یک فعالیت جدید</h2>
                                </div>
                                <div class="pull-right mb-3">
                                    <a class="btn btn-primary text-light" href="{{ route('author',['id'=>$_GET['id']]) }}"> بازگشت</a>
                                </div>
                            </div>
                        </div>
                        @if(session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <form action="{{route('insert-article',['id'=>$_GET['id']])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{$_GET['id']}}">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>عنوان فعالیت:</strong>
                                            <input type="text" name="title" class="form-control" placeholder="">
                                            @error('title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-4">
                                            <strong>متن فعالیت:</strong>
                                            {{--                     <input type="text" name="body" class="form-control" placeholder="Company Address">--}}
                                            <textarea class="form-control" name="information" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            @error('body')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-4">
                                            <strong>انتخاب دسته بندی:</strong>
                                            <select class="form-select" aria-label="Default select example" name="category_id">
                                                <option selected  hidden  name="category_id">دسته بندی مورد نظر خود را انتخاب کنید </option>
                                                <option value="1" name="category_id">چاپ مقاله در مجلات و نمایه های مختلف</option>
                                                <option value="2" name="category_id">چاپ کتاب</option>
                                                <option value="3" name="category_id">طرح ارتباط با صنعت ( داخلی / خارجی )</option>
                                                <option value="4" name="category_id">برگزاری همایش ( داخلی/ملی/بین المللی)</option>
                                                <option value="5" name="category_id">برگزاری سخنرانی</option>
                                                <option value="6" name="category_id">برگزاری کرسی ترویجی</option>
                                                <option value="7" name="category_id">برگزاری وبینار </option>
                                                <option value="8" name="category_id">حضور در همایش ها به عنوان سخنران ویژه</option>
                                                <option value="9" name="category_id">ارائه خلاصه مقاله /پوستر در همایش/وبینار</option>
                                                <option value="10" name="category_id">ارائه مقاله کامل درهمایش /وبینار </option>
                                                <option value="11" name="category_id">پایان نامه/رساله تحصیلات تکمیلی </option>
                                                <option value="12" name="category_id">طرح پسا دکتری</option>
                                                <option value="13" name="category_id">تشکیل شرکت دانش بنیان</option>
                                                <option value="14" name="category_id">تشکیل استارت آپ</option>
                                                <option value="15" name="category_id">سایر</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>تعداد :</strong>
                                            <input type="text" name="count" class="form-control" placeholder="">
                                            @error('count')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>تاریخ :</strong>
                                            <input type="date"  name="time" class="form-control" placeholder="">
                                            @error('count')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
                                    {{--                    <div class="form-group p-3">--}}
                                    {{--                        <strong>اپلود فایل :</strong>--}}

                                    {{--                        <input type="file"  name="achievement"   id="formFile" class="form-control" placeholder="فایل مورد نظر خود را آپلود کنید">--}}
                                    {{--                        @error('count')--}}
                                    {{--                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>--}}
                                    {{--                        @enderror--}}
                                    {{--                    </div>--}}
                                    {{--                </div>--}}
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <label class="form-label" for="inputFile">File:</label>
                                            <input
                                                type="file"
                                                name="file"
                                                id="inputFile"
                                                class="form-control @error('file') is-invalid @enderror">

                                            @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 mx-auto mr-5 ml-5" style="margin-right: 3%;">
                                            <button type="submit" class="btn btn-primary   " style="margin-right: 3% ;margin-bottom: 3%;">ثبت</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>




                </div>
            </main>
    </div>
@endsection




