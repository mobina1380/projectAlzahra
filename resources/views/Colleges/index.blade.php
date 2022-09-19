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
                        <div class="col-lg-12 ">
                            <div class="pull-left">
                                <h2>{{$name}}</h2>
                            </div>
                            <div class="pull-right mb-2">
                                <a class="btn btn-success text-light" href="{{ route('lists.create',['id'=>$id]) }}">ایجاد یک فعالیت </a>
                            </div>
                        </div>
                    </div>

                    {{--    @if ($message = Session::get('success'))--}}
                    {{--        <div class="alert alert-success">--}}
                    {{--            <p>{{ $message }}</p>--}}
                    {{--        </div>--}}
                    {{--    @endif--}}
                    <div class="col-lg-12 mb-3 ">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                {{--                <th>نام دانشکده</th>--}}
                                <th>عنوان فعالیت</th>
                                <th>موضوع</th>
                                <th>زمان</th>
                                <th>تعداد</th>
                                <th>اطلاعات تکمیلی</th>
                                <th>دستاورد قابل دانلود</th>
                                <th>ویرایش</th>
                                <th>حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($articles) && isset($user)  && isset($categories))
                                @foreach($articles as $article)
                                    <tr>

                                        {{--                    <td> {{$article->user->name}}</td>--}}

                                        <td> {{$article->category->title}}</td>

                                        <td>{{\Illuminate\Support\Str::limit($article['title'], 20, $end='...')}}</td>
                                        <td>{{$article['time']}}</td>
                                        <td>{{$article['count']}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($article['information'], 20, $end='...')}}</td>

                                        {{--                    <td><a href="{{public_path('uploads/'.$article['file'])}}">{{$article['file']}}</a></td>--}}
                                        <td><a href="{{asset('uploads/'.$article['file'])}} " target="_blank">{{$article['file']}}</a></td>
                                        <td>

                                            <a class="btn btn-primary text-light" href="{{ route('lists.edit',$article['id']) }}">ویرایش</a>


                                        </td>
                                        <td>
                                            <form action="{{ route('delete-article',$article['id']) }}" method="Post">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    {{--                {!! $articles->links() !!}--}}




                </div>
            </main>
    </div>
@endsection




