@extends('layouts.admin.admin')
@section('content')
    <div class="col-4 box p-4 m-4">
        <h3>{{ __('news.news') }}</h3>
        @foreach($latestNews as $news)
            <div>
                <h4>{{ $news->title }}</h4>
                <p>{{ Str::limit($news->text, 100) }}</p>
                <a href ="{{ route('admin.news.show',$news->id) }}" class= "btn btn-info"> <i class="fa fa-eye"></i> {{ __('system.preview') }} </a>
            </div>
        @endforeach
    </div>
    @include('admin.tasks.tasks_calendar')
@endsection
