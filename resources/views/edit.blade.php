@extends('main.body')

@section('container')
    <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row col-md-8 shadow rounded mx-auto mt-5 overflow-hidden" style="min-height: 70vh">
            <div class="position-relative d-flex bg-secondary-subtle align-items-center justify-content-center p-0 col-md-5"
                style="min-height: 50vh">
                <img class="position-absolute mw-100 mh-100" id="previewImg" src="{{ asset('storage/' . $post->image) }}"
                    alt="">
            </div>
            <div class="d-flex flex-column justify-content-center p-5 col-md-7">
                <h3 class="">Edit Post</h3>
                <div class="mt-3 mb-2">
                    <label for="title" class="form-label mx-1 text-secondary">Judul Foto</label>
                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                        name="title" placeholder="Judul Post" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="text-danger ms-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="album" class="form-label mx-1 text-secondary">Album</label>
                    <select id="album" class="form-select" name="album_id">
                        <option value="1" selected>Uncategory</option>
                        <option value="1">Uncategory</option>
                        <option value="1">Uncategory</option>
                        <option value="1">Uncategory</option>
                        <option value="1">Uncategory</option>
                    </select>
                    @error('album_id')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label mx-1 text-secondary">Deskripsi (Optional)</label>
                    <textarea class="form-control" name="description" id="description">{{ old('description', $post->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

<script>
    $('.btn-image').hide();
</script>
