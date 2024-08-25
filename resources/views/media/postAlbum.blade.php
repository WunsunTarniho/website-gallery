@include('main.head')

@include('component.sidebar')

<h3 class="text-center my-4">Album {{ $title }}</h3>
<div class="row col-md-8 mx-auto min-vh-100">
    @foreach ($posts as $post)
        <div class="p-2 col-md-4">
            <a class="my-media mx-auto" href="/post/{{ $post->id }}"
                style="background-image: url('{{ asset('storage/' . $post->image) }}');">
            </a>    
        </div>
    @endforeach
</div>

@include('main.footer')
