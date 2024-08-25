@include('main.head')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')

        <main class="ms-sm-auto">
            @yield('container')
        </main>
    </div>
</div>
@include('main.footer')
