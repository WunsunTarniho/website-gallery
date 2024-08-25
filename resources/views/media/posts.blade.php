@extends('media.profile')

@section('content')
    <div class="row col-md-8 mx-auto mb-5">
        @if ($posts->count() !== 0)
            @foreach ($posts as $post)
                <div class="p-2 col-md-4">
                    <a class="my-media d-block mx-auto" href="/post/{{ $post->id }}"
                        style="background-image: url('{{ asset('storage/' . $post->image) }}');">
                    </a>
                </div>
            @endforeach
        @else
            <div class="icon d-flex flex-column gap-3 align-items-center justify-content-center" style="height: 50vh;">
                <h3 class="text-secondary">Anda Belum memiliki Postingan</h3>
                <a class="btn btn-dark px-4" href="/post/create"><i class="bi bi-card-image text-white fs-4 me-3"></i>Buat</a>
            </div>
        @endif
    </div>
@endsection
