<div class="row d-block my-4 mx-1 min-vh-100">
    @foreach ($posts as $post)
        <div class="posts col-md-3 col-4 d-inline-block position-relative overflow-hidden">
            <div class="button-post m-2 opacity-0 position-absolute d-none d-md-flex gap-2">
                <form id="save">
                    <button class="btn border-white px-1 py-1">
                        <i class="bi bi-bookmark m-0 mx-auto px-1 text-white"></i>
                    </button>
                </form>
                <form id="addLike">
                    <input type="hidden" id="post" name="post_id" value="{{ $post->id }}">
                    <button class="btn border-white px-1 py-1">
                        <i class="inline-flex bi bi-heart m-0 mx-auto px-1 text-white"></i>
                    </button>
                </form>
            </div>
            <a href="/post/{{ $post->id }}">
                <img src="{{ asset('storage/' . $post->image) }}" alt="" style="max-width: 100%">
            </a>
            <div class="title-post opacity-0 d-none d-md-block position-absolute w-100 py-2 px-3 bottom-0 text-white">{{ $post->title }}</div>
        </div>
    @endforeach
</div>

{{ $posts->links() }}
