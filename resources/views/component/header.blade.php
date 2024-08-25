<header class="navbar sticky-top z-2 flex-md-nowrap p-0 shadow bg-white" data-bs-theme="dark">

    <a class="d-flex items-center col-md-3 gap-2 col-lg-2 me-0 px-3 py-3 fs-6 text-dark" href="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
            class="bi bi-badge-8k-fill text-dark" viewBox="0 0 16 16">
            <path
                d="M3.9 6.605c0 .51.405.866.95.866s.945-.356.945-.866-.4-.852-.945-.852-.95.343-.95.852m-.192 2.668c0 .589.492.984 1.142.984.646 0 1.143-.395 1.143-.984S5.496 8.28 4.85 8.28c-.65 0-1.142.404-1.142.993" />
            <path
                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm5.17 7.348c0 1.041-.927 1.766-2.333 1.766s-2.312-.72-2.312-1.762c0-.954.712-1.384 1.257-1.494v-.053c-.51-.154-1.02-.558-1.02-1.331 0-.914.831-1.587 2.088-1.587 1.253 0 2.083.673 2.083 1.587 0 .782-.523 1.182-1.02 1.331v.053c.545.11 1.257.545 1.257 1.49M12.102 5h1.306l-2.14 2.584 2.232 3.415h-1.428l-1.679-2.624-.615.699v1.925H8.59V5h1.187v2.685h.057z" />
        </svg>
        Website Gallery
    </a>
    <ul class="navbar-nav flex-row gap-1 justify-content-center align-items-center">
        <li class="nav-item text-nowrap">
            <a class="btn btn-transparent d-flex align-items-center gap-2 text-dark" href="/post/create">
                <span class="d-none d-md-inline">Upload</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-upload mx-0 text-dark"
                    viewBox="0 0 16 16">
                    <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                </svg>
            </a>
        </li>
        @auth
            <li class="nav-item text-nowrap">
                <button class="d-flex align-items-center nav-link text-dark" type="button" data-bs-toggle="modal"
                    data-bs-target="#searchbar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search text-dark"
                        viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </li>
        @endauth
        <li class="nav-item text-nowrap">
            <button class="nav-link d-flex align-items-center text-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list text-dark"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>
        </li>
    </ul>
</header>

<div class="modal fade" id="searchbar" tabindex="-1" aria-labelledby="searchbarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body d-flex align-items-center gap-2">
                <form id="navbarSearch" class="mx-auto w-100">
                    <input class="d-inline bg-white form-control border-primary px-5 text-dark"
                        style="border-radius: 50px !important;" type="text" name="search"
                        placeholder="Cari semua gambar di website gallery" aria-label="Search">
                    <div class="position-absolute mx-3" style="top: calc(50% - 14px);">
                        <svg class="bi-search">
                            <use xlink:href="#search" />
                        </svg>
                    </div>
                </form>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
