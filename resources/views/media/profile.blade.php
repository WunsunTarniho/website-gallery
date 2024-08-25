@extends('main.body')

@section('container')
    <div class="row d-flex align-items-center fw-bold" style="height: 30vh">
        <div class="col-5 d-flex justify-content-center align-items-center gap-3">
            <img class="bg-success rounded-circle" src="{{ $user->image ? $user->image : '/profile.png' }}" alt="" style="width: 6em; height: 6em;">
        </div>
        <div class="col-7">
            <h5>{{ $user->username }}</h5>
            <div>Postingan</div>
            <div>{{ $posts->count() }}</div>
        </div>
    </div>
    <ul class="d-flex justify-content-center border-top border-bottom border-secondary-subtle bg-white py-3 gap-4 w-100 px-0">
        <li class="list-group-item">
            <a class="{{ $title === 'Media' ? 'text-primary' : '' }}" href="/profile/{{ $user->id }}">Media</a>
        </li>
        <li class="list-group-item">
            <a class="{{ $title === 'Album' ? 'text-primary' : '' }}" href="/profile/album/{{ $user->id }}">Album</a>
        </li>
    </ul>

    @yield('content')
@endsection
