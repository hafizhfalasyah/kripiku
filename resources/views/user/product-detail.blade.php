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
            <h1 class="text-center text-primary display-6">Detail Produk</h1>
        </div>
        <!-- Single Page Header End -->

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <img src="{{ asset('product/' . $product->image) }}" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{ $product->title }}</h4>
                                <p class="mb-3">Kategori : {{ $product->catagory }}</p>
                                <h5 class="fw-bold mb-3">Rp. {{ $product->currency }}</h5>
                                <p class="mb-4">Deskripsi : {{ $product->description }}</p>
                                {{-- <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish</p> --}}

                                <form id="add-to-cart-form" action="{{ url('add_cart', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group quantity mb-5" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button id="btn-minus" class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="quantity" class="form-control form-control-sm text-center border-0" value="1" min="1">
                                        <div class="input-group-btn">
                                            <button id="btn-plus" class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button id="add-to-cart-button" type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var minusButton = document.getElementById('btn-minus');
            var plusButton = document.getElementById('btn-plus');
            var addToCartButton = document.getElementById('add-to-cart-button');

            // Handle minus button click
            minusButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            // Handle plus button click
            plusButton.addEventListener('click', function() {
                var currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            // Handle form submission
            addToCartButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                // Manually submit the form using JavaScript
                document.getElementById('add-to-cart-form').submit();
            });
        });
    </script>

    </body>

</html>
