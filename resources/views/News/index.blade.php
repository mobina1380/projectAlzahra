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


                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>اخبار</h2>
                            </div>
                            <div class="pull-right mb-2">
                                <a class="btn btn-success text-light" href="{{ route('news.create') }}"> ایجاد یک خبر جدید</a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="col-lg-12  mb-3">

                        <table class="table table-bordered">
                            <thead style="background-color: #bad3a3">
                            <tr>
                                <th scope="col">عنوان خبر</th>
                                <th scope="col">متن خبر</th>

                                <th scope="col">عملیات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $new)
                                <tr cope="row">
                                    <td> {{\Illuminate\Support\Str::limit($new->title, 20, $end='...')}}</td>

                                    <td> {{\Illuminate\Support\Str::limit($new->body, 20, $end='...')}}</td>


                                    <td>
                                        <form action="{{ route('news.destroy',$new->id) }}" method="Post">
                                            <a class="btn btn-primary text-light" href="{{ route('news.edit',$new->id) }}">ویرایش</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>

                    {!! $news->links() !!}



                </div>
            </main>
    </div>
@endsection




