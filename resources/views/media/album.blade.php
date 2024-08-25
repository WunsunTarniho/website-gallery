@extends('media.profile')

@section('content')
    <div class="row mx-auto col-md-8 mb-5">
        @if (Auth::user()->id === $user->id)
            <div class="col-md-3 col-4 d-flex align-items-center">
                <form class="d-flex flex-column mb-0 w-100" action="/album" method="POST">
                    @csrf
                    <svg class="add-album mx-auto text-dark-emphasis my-1" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16" style="max-width: 85%">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    <div class="input-album position-relative d-flex justify-content-center align-items-center mt-2">
                        <input class="text-dark rounded ps-2 pe-3" id="album" name="album" style="max-width: 100%">
                        <i class="position-absolute end-0 cancel mx-1 bi bi-x-lg p-0"></i>
                        <div class="fw-bold pb-0">Buat</div>
                    </div>
                </form>
            </div>
        @endif
        @foreach ($albums as $album)
            <div class="album col-md-3 col-4">
                <a href="/album/{{ $album->id }}">
                    <svg class="mw-100 mx-auto text-secondary" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-folder2" viewBox="0 0 16 16">
                        <path
                            d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5z" />
                    </svg>
                    <div class="text-center fw-bold">{{ $album->name . ' (' . $album->posts->count() . ')'  }}</div>
                </a>
            </div>
        @endforeach
    </div>
    <script>
        let inputAlbum = $('.input-album input');
        let text = $('.input-album div')

        album.style.border = '2px solid black';

        $('.cancel').hide();
        inputAlbum.hide();

        $('.add-album').on('click',
            function() {
                $('.cancel').show();
                inputAlbum.show();
                text.hide();
                album.focus();
            }
        );

        $('.cancel').on('click',
            function() {
                inputAlbum.hide();
                inputAlbum.val('');
                text.show();
                $('.cancel').hide();
            }
        )
    </script>
@endsection
