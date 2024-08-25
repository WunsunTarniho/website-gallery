@extends('main.body')

@section('container')
    <div class="row home-image d-flex align-items-center justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="mx-auto">
                <p class="text-white fs-3 mx-3 my-0 fw-bold">Temukan Gambar yang Menakjubkan</p>
                <form id="navbarSearch" class="position-relative navbar-search overflow-hidden px-2">
                    <input class="form-control bg-white w-100 border-primary py-md-3 py-2 px-5 text-dark"
                        style="border-radius: 50px !important" type="text" name="search"
                        placeholder="Cari semua gambar di website gallery" aria-label="Search">
                    <div class="position-absolute" style="top: calc(50% - 14px); left: 20px">
                        <svg class="bi-search">
                            <use class="absolute top-0" xlink:href="#search" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('component.category')
    <h3 class="mt-4 mx-4">Semua Gambar</h3>
    @include('posts')
    <script src="/js/home.js"></script>
@endsection
