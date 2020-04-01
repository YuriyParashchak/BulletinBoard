@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" href="#editProfile">Редактирование профиля</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#createPost">Добавление объявления</a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show m-4 " id="editProfile">
            @include('includes.profile_edit',['user' => Auth::user()])
        </div>
        <div class="tab-pane fade m-4" id="createPost">
            @include('includes.post_create')
        </div>

{{--    <div class="container-fluid ">--}}
{{--        <div class="container__cabinet">--}}
{{--            <a href="{{route('profile.edit')}}" type="button" class="btn btn-success">Редактирование профиля</a>--}}
{{--            <a href="{{route('post.create')}}" type="button" class="btn btn-success">Добавление объявления</a>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
