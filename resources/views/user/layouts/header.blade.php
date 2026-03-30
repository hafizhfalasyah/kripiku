<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Jl. Lesti Gg. I No.44, Malang</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">kripikutempe@gmail.com</a></small>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Kripiku</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('welcome') }}#" class="nav-item nav-link active">Beranda</a>
                    <a href="{{ route('welcome') }}#tentang" class="nav-item nav-link">Tentang</a>
                    <a href="{{ route('welcome') }}#produk" class="nav-item nav-link">Produk</a>
                    <a href="{{ route('welcome') }}#kontak" class="nav-item nav-link">Kontak</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Favorit</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ url('shop') }}" class="dropdown-item">Shops</a>
                        </div>
                    </div> --}}
                </div>

                <x-notification />
                    @guest
                        @if (Route::has('register'))
                            <a href="{{ route('login') }}" class="sign-up">Daftar</a>
                        @endif

                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="sign-in">Masuk</a>
                        @endif
                        @else
                            <div class="nav-item dropdown">
                                <a href="#" class=" dropdown-toggle disabled-link" data-bs-toggle="dropdown" ><i class="fas fa-user fa-2x"></i> </a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="" class="dropdown-item">{{ Auth::user()->name }}</a>
                                    <a class="dropdown-item" href="{{ url('show_order') }}">Lihat Pesanan</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari berdasarkan kata kunci</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="Kata Kunci...." aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
