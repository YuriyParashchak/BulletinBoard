@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="post__container">
                    <div class="post__photo">
                        <img src="{{asset('storage/image/'.$post->image)}}" alt="{{$post->image}}">
                    </div>
                    <div class="post__context">
                        <div class="post__context_h">
                            <div>{{$post->user->fullName()}}</div>
                            <div>{{$post->created_at->format('d-m-Y H:i')}}</div>
                        </div>
                        <div>
                           <strong>{{$post->title}}</strong>
                        </div>
                        <div>
                            {{$post->descriptions}}
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
@endsection
