<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS Libraries -->
    @include('user.layouts.css')
</head>

<body>
    <!-- Header -->
    @include('user.layouts.header')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-primary display-6">Daftar Produk</h1>
    </div>
    <!-- Single Page Header End -->

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite">
            <div class="container py-2">
                <div class="row g-4">
                    <div class="col-lg-12">

                        <div class="col-lg-12">
                            <div class="row g-4 justify-content-center">

                                @foreach(\App\Models\Product::query()->get() as $products)
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

                                {{-- <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

    </body>

</html>
