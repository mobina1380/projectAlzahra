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
                                <h2>رویداد ها</h2>
                            </div>
                            <div class="pull-right mb-2">
                                <a class="btn btn-success text-light" href="{{ route('events.create') }}"> ایجاد یک رویداد جدید</a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="col-lg-12  mb-3 ">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>عنوان رویداد</th>
                                <th>متن رویداد</th>
                                {{--                        <th>آیدی رویداد</th>--}}

                                <th>عملیات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td> {{\Illuminate\Support\Str::limit($event->title, 20, $end='...')}}</td>

                                    <td> {{\Illuminate\Support\Str::limit($event->body, 20, $end='...')}}</td>

                                    {{--                            <td>{{$event->id}}</td>--}}
                                    <td>
                                        <form action="{{ route('events.destroy',$event->id) }}" method="Post">
                                            <a class="btn btn-primary text-light" href="{{ route('events.edit',$event->id) }}">ویرایش</a>
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

                    {!! $events->links() !!}


                </div>
            </main>
    </div>
@endsection




