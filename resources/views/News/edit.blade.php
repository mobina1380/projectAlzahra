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
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left mb-2">
                                <h2>ویرایش خبر</h2>
                            </div>
                            <div class="pull-right mb-3">
                                <a class="btn btn-primary text-light" href="{{ route('news.index') }}" enctype="multipart/form-data">
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
                        <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group p-3">
                                        <strong>عنوان خبر:</strong>
                                        <input type="text" name="title" value="{{ $news->title }}" class="form-control"
                                               placeholder="Company Address">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group p-3">
                                        <strong>متن خبر:</strong>


                                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1"  placeholder="" rows="6">{{ $news->body }}</textarea>
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
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
            </main>
    </div>
@endsection




