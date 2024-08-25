@extends('main.body')

@section('container')
    <form action="/post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row col-md-8 shadow rounded mx-auto mt-5 overflow-hidden" style="min-height: 70vh">
            <div class="position-relative d-flex bg-secondary-subtle align-items-center justify-content-center p-0 col-md-5"
                style="min-height: 50vh">
                @error('image')
                    <div class="position-relative text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <label for="image" id="btn-image" class="btn btn-primary position-absolute z-1 bottom-0 my-4">Upload
                    Image</label>
                <img class="position-absolute mw-100 mh-100" id="previewImg" src="" alt="">
                <input class="d-none" type="file" id="image" name="image" onchange="uploadImage()">
            </div>
            <div class="d-flex flex-column justify-content-center p-5 col-md-7">
                <h3 class="">Create Post</h3>
                <div class="mt-3 mb-2">
                    <label for="title" class="form-label mx-1 text-secondary">Judul Foto</label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                        name="title" placeholder="Judul Post" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger ms-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="album" class="form-label mx-1 text-secondary">Album</label>
                    <select id="album" class="form-select" name="album_id">
                        @foreach (Auth::user()->albums as $album)
                            @if ($album->name == 'Uncategory')
                                <option value="{{ $album->id }}" selected>{{ $album->name }}</option>
                            @else
                                <option value="{{ $album->id }}">{{ $album->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label mx-1 text-secondary">Deskripsi (Optional)</label>
                    <textarea class="form-control" name="description" id="description" value="{{ old('description') }}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

<script>
    const uploadImage = () => {
        const image = document.getElementById('image');

        const btnImage = $('#btn-image');
        const previewImg = $('#previewImg');


        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);

        reader.onload = (readerEvent) => {
            previewImg[0].src = readerEvent.target.result;
            console.log(readerEvent.target.result)
        }
    }
</script>
