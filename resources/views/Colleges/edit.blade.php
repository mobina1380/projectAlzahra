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
                            <div class="col-lg-12 margin-tb mb-3">
                                <div class="pull-left">
                                    <h2>ویرایش فعاليت ها </h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary text-light" href="{{route('author',['id'=>$list->user_id])}}" enctype="multipart/form-data">
                                        بازگشت</a>
                                </div>
                            </div>
                        </div>
                        @if(session('status'))
                            <div class="alert alert-success mb-1 mt-1">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <form action="{{ route('edit-article',$list->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{--        @method('PUT')--}}
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>عنوان فعالیت:</strong>
                                            <input type="hidden" value="{{$list->user_id}}" name="user_id">
                                            <input type="text" name="title" value="{{ $list->title }}" class="form-control"
                                                   placeholder="Company Address">
                                            @error('title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--            {{$list->category->title}}--}}
                                    {{--            {{$list->user->name}}--}}
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>متن فعالیت:</strong>


                                            <textarea class="form-control" name="information" id="exampleFormControlTextarea1"  placeholder="" rows="3">{{ $list->information }}</textarea>
                                            @error('title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>









                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-4">
                                            <strong>انتخاب دسته بندی:</strong>
                                            <select class="form-select" aria-label="Default select example" name="category_id">
                                                <option selected  hidden  name="category_id" value="{{$list->category->id}}">{{$list->category->title}} </option>
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
                                            <input type="text" name="count" class="form-control" placeholder="" value="{{$list->count}}">
                                            @error('count')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group p-3">
                                            <strong>تاریخ :</strong>
                                            <input type="date"  name="time" class="form-control" placeholder="" value="{{$list->time}}">
                                            {{$list->time}}
                                            @error('count')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group p-3">
                                            <label class="form-label" for="inputFile" >File:</label>

                                            <input
                                                type="file"
                                                name="file"
                                                id="inputFile"
                                                value="{{$list->file}}"
                                                class="form-control @error('file') is-invalid @enderror">
                                            {{$list->file}}
                                            @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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




