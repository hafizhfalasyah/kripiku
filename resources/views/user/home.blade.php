<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- CSS Libraries -->
        @include('user.layouts.css')

        <style>
            .btn:hover {
                background-color: #765827;
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        @include('user.layouts.header')

        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">Kripiku</h4>
                        <h1 class="mb-5 display-3 text-primary">Keripik<br>Tempe Lesti</h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Kata Kunci....">
                            <a href="{{ route('shop') }}"><button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Cari</button></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="{{ asset('user/img/tempe1.jpg') }}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">

                                </div>
                                <div class="carousel-item rounded">
                                    <img src="{{ asset('user/img/tempe2.jpg') }}" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- About Us Section Start -->
        <div class="container-fluid about-us py-5" id="tentang">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-6 order-md-2">
                        <img src="{{ asset('user/img/toko.png') }}" width="600" height="450">
                    </div>
                    <div class="col-md-6 order-md-2">
                        <h1 class="section-title mb-3">Tentang Kami</h1>
                        <p>Selamat datang di Keripik Tempe Lesti, tempat di mana kelezatan dan kualitas bertemu dengan inovasi sejak tahun 1994. Kami memulai perjalanan kami dengan resep buatan sendiri yang telah teruji dan disukai oleh banyak orang.</p>
                        <p>Pada awal pendirian kami, kami melakukan penjualan dengan cara berkeliling untuk mencari konsumen yang menghargai cita rasa yang kami tawarkan. Namun, seiring berjalannya waktu, kami mulai mendapatkan tempat tetap untuk memproduksi dan menjual keripik tempe kami.</p>
                        <p>Saat ini, Keripik Tempe Lesti telah berkembang menjadi penyedia layanan penjualan offline dan online. Toko kami sudah memiliki website yang dimana dapat digunakan masyarakat untuk membeli keripik tempe kami dengan cara online.</p>
                        <p>Kami berkomitmen untuk terus memberikan produk berkualitas tinggi dan pelayanan yang memuaskan kepada pelanggan kami. Kami percaya bahwa setiap gigitan dari keripik tempe kami mengandung kelezatan yang menggoda dan kesempurnaan dalam setiap rasa.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us Section End -->

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5" id="produk">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4 mb-5">
                        <div class="col-lg-12 text-start">
                            <h1>Produk Kami</h1>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">

                                        @foreach(\App\Models\Product::query()->get()->slice(0, 4) as $products)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <a href="{{ url('product_detail', $products->id) }}" style="cursor: pointer;">
                                                            <img src="product/{{ $products->image }}" class="img-fluid w-100 rounded-top" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4><a href="{{ url('product_detail', $products->id) }}" style="color: black; cursor: pointer;">{{ Str::limit($products->title, 19, '...') }}</a></h4>
                                                        <p>{{ Str::limit($products->description, 70, '...') }}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                                            <p class="text-dark fs-5 fw-bold mb-0">Rp. {{ $products->currency }}</p>
                                                            <a href="{{ url('product_detail', $products->id) }}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Keranjang</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <center>
                                            <div id="load-more"><a href="{{ url('shop') }}">Lihat Lainnya</a></div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        <!-- Contact Us Start -->
        <div class="container-fluid contact py-5" id="kontak">
            <div class="container py-5">
                <div class="contact-header text-center">
                    <h4 class="text-primary">Hubungi Kami</h4>
                    <h1 class="display-5 mb-5 text-dark">Kami Siap Membantu Anda</h1>
                </div>
                <div class="row" style="margin-top: 5rem;">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h3>Informasi Kontak</h3>
                        <p style="margin-top: 1rem;">Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan <br> atau ingin berbagi umpan balik. Kami senang dapat membantu Anda.</p>
                        <ul class="list-unstyled">
                            <li style="margin-top: 0.5rem;"><i class="fas fa-map-marker-alt me-2"></i>Alamat: Jl. Lesti Gg. I No.44, Malang</li>
                            <li style="margin-top: 0.5rem;"><i class="fas fa-phone-alt me-2"></i>Telepon: 0813 3437 8585</li>
                            <li style="margin-top: 0.5rem;"><i class="fas fa-envelope me-2"></i>Email: kripikutempe@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <form action="https://wa.me/6281334378585" method="GET" target="_blank">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan alamat email Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Tulis pesan Anda di sini" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="color: #f2efea;">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us End -->


        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

    </body>

</html>
