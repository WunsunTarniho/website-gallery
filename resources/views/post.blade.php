@extends('main.body')

@section('container')
    <div class="row m-4 mb-0 gap-lg-5 mx-auto">
        <a class="post-image position-relative col-lg-7 d-flex align-items-center shadow bg-secondary" href="{{ asset('storage/' . $post->image) }}" style="height: 70vh">
            <img class="mw-100 mh-100 mx-auto" src="{{ asset('storage/' . $post->image) }}" alt="{{ $title }}">
            <h4 class="position-absolute text-white bottom-0 m-3">{{ $title }}</h4>
        </a>
        <div class="detail-post position-relative col-lg-4 pt-3 px-4 bg-white shadow rounded text-secondary overflow-auto" style="max-height: 70vh">
            <div class="dropdown position-absolute top-0 end-0">
                <button class="btn btn-transparent py-0 pb-2 fw-bold text-secondary" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    . . .
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/download/{{ str_replace("file-image/", '', $post->image) }}">Download</a></li>
                    @if (Auth::user()->id === $post->user->id)
                        <li><a class="dropdown-item" href="/post/{{ $post->id }}/edit">Edit</a></li>
                        <li>
                            <form class="mb-0" action="/post/{{ $post->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="dropdown-item">Hapus</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="category d-flex justify-content-between align-items-center border-bottom py-3">
                <a href="/profile/{{ $post->user->id }}">
                    <img class="rounded-circle me-3" src="{{ $post->user->image ? $post->user->image : '/profile.png' }}" alt=""
                        style="width: 3em; height: 3em">
                    <span class="d-sm-inline fw-bold" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</span>
                </a>
                <a href="/profile/{{ $post->user->id }}" class="border border-secondary rounded px-3 py-1">Profile</a>
            </div>
            <div class="category d-flex flex-row justify-content-around my-4">
                <form class="border border-secondary rounded px-2 py-1 mb-0" id="addLike">
                    {{-- @csrf --}}
                    <input type="hidden" id="post" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="like-button border-0 bg-transparent outline-none">
                        {!! $liked ? '<i class="bi bi-heart-fill text-danger"></i>' : '<i class="bi bi-heart"></i>' !!}
                        <span id="totalLike" class="mx-1">{{ $like }}</span>
                    </button>
                </form>
                <a class="border border-secondary rounded px-3 py-1" href="">
                    <i class="bi bi-bookmark"></i>
                    <span class="d-sm-block d-none mx-1">Simpan</span>
                </a>
                <a class="border border-secondary rounded px-3 py-1" onclick="getComment()">
                    <i class="bi bi-chat"></i>
                </a>
                <a class="border border-secondary rounded px-3 py-1">
                    <i class="bi bi-share"></i>
                </a>
            </div>
            <div class="my-2 text-secondary">
                <div class="d-flex justify-content-between my-2">
                    <span>Ukuran</span>
                    <span>{{ $post->size }}</span>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <span>Resolusi</span>
                    <span>{{ $post->resolution }}</span>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <span>Tipe</span>
                    <span>{{ $post->type }}</span>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <span>Publikasi</span>
                    <span>{{ $post->created_at }}</span>
                </div>
            </div>
            <div class="my-3 border-top border-secondary py-2">
                <div class="my-2">Deskripsi</div>
                <div>
                    @if ($post->description)
                        {{ $post->description }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 mh-50 my-2 px-4">
            <div class="fw-bold my-2">{{ $totalComment . ' Komentar' }}</div>
            <form class="mb-2" action="/post/{{ $post->id }}/comment" method="POST">
                @csrf
                <div class="d-flex align-items-center">
                    <img class="rounded-circle me-2 bg-danger" src="{{ $post->user->image ? $post->user->image : '/profile.png' }}" alt=""
                        style="width: 2.5em; height: 2.5em">
                    <input class="form-control bg-secondary-subtle pb-2 px-4 bg-white" id="comment" name="comment"
                        type="text" placeholder="Komentar" style="border-radius: 30px; width: 93% !important">
                </div>
            </form>
            <div class="text-secondary">
                @foreach ($comments as $comment)
                    <div class="d-flex justify-content-between py-2">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="{{ $post->user->image ? $post->user->image : '/profile.png' }}" alt="{{ $title }}"
                                style="width: 2.5em; height: 2.5em;">
                            <div>
                                <div>
                                    <span class="me-2 text-dark">{{ $comment->user->username }}</span>
                                    <span style="font-size: 0.8em">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="">{{ $comment->comment }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

<script>
    const getComment = () => {
        comment.focus();
    }
</script>
