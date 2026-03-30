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
            <h1 class="text-center text-primary display-6">Keranjang</h1>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-1">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"><a href="{{ route('shop') }}" type="button" class="btn btn-md rounded-circle bg-light border"><i class="fa fa-plus text-primary"></i></a></th>
                          </tr>
                          <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Banyak Produk</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php $totalprice = 0; ?>
                            @foreach ($cart as $cart)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('product/' . $cart->image) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cart->product_title }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cart->pricePerItem }}</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mb-4" style="width: 100px;">
                                            {{-- <div class="input-group-btn">
                                                <button id="btn-minus" class="btn btn-sm btn-minus rounded-circle bg-light border" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div> --}}
                                            <input type="text" name="quantity" class="form-control form-control-sm text-center border-0" value="{{ $cart->quantity }}" min="1" readonly style="background-color: white; margin-top: 20px;">
                                            {{-- <div class="input-group-btn">
                                                <button id="btn-plus" class="btn btn-sm btn-plus rounded-circle bg-light border" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $cart->curren }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ url('remove_cart', $cart->id) }}" onclick="return confirm('Apakah kamu yakin untuk menghapus ini?')">
                                            <button class="btn btn-md rounded-circle bg-light border mt-4">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php $totalprice = $totalprice + $cart->price; ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded shadow">
                            {{-- <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div> --}}
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total Harga</h5>
                                <p class="mb-0 pe-4">{{ $totalprice; }}</p>
                            </div>
                            <a type="button" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" href="{{ url('make_order') }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


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
