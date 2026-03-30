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
            <h1 class="text-center text-primary display-6">Buat Pesanan</h1>
        </div>
        <!-- Single Page Header End -->

        <!-- Checkout Page Start -->
        <div class="container-fluid py-2">
            <div class="container py-5">
                <h1 class="mb-4">Detail Pemesanan</h1>
                <form action="{{ url('transaction') }}" method="POST">
                    @csrf
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-6">

                        @if($carts->isNotEmpty()) <!-- Pastikan koleksi tidak kosong -->
                            @php $cart = $carts->first(); @endphp <!-- Ambil item pertama dari koleksi -->
                                <div class="form-item">
                                    <label class="form-label my-3">Nama</label>
                                    <input type="text" class="form-control" value="{{ $cart->name }}" readonly style="background-color: white;">
                                </div>
                                <div class="form-item">
                                    <label class="form-label my-3">Email</label>
                                    <input type="email" class="form-control" value="{{ $cart->email }}" readonly style="background-color: white;">
                                </div>
                                <div class="form-item">
                                    <label class="form-label my-3">No. HP</label>
                                    <input type="text" class="form-control" value="{{ $cart->phone }}" readonly style="background-color: white;">
                                </div>
                                <div class="form-item">
                                    <label class="form-label my-3">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $cart->address }}" readonly style="background-color: white;">
                                </div>
                        @endif

                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Banyak</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $subtotal = 0; ?>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center mt-2">
                                                        <img src="{{ asset('product/' . $cart->image) }}" class="img-fluid rounded-circle" style="width: 75px; height: 75px;" alt="">
                                                    </div>
                                                </th>
                                                <td class="py-5">{{ $cart->product_title }}</td>
                                                <td class="py-5">{{ $cart->pricePerItem }}</td>
                                                <td class="py-5">{{ $cart->quantity }}</td>
                                                <td class="py-5">{{ $cart->curren }}</td>
                                            </tr>
                                        <?php $subtotal = $subtotal + $cart->price; ?>
                                        @endforeach
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-3">Subtotal</p>
                                            </td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark">{{ $subtotal; }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark py-4">Biaya Pengiriman</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top" id="cekButtonContainer" @if($ongkir) style="display: none;" @endif>
                                                    <a id="cekButton" type="button" class="btn border-secondary py-2 px-3 text-primary" href="{{ url('cek_ongkir') }}">Cek</a>
                                                </div>
                                                <div class="py-3 border-bottom border-top" id="ongkirData" @if(!$ongkir) style="display: none;" @endif>
                                                    @if ($ongkir)
                                                        @foreach ($ongkir as $item)
                                                            <div class="form-check text-start" style="margin-bottom: 2rem;">
                                                                <label class="form-check-label" for="name">{{ $item['name'] }}</label>
                                                            </div>
                                                            @foreach ($item['costs'] as $cost)
                                                                @foreach ($cost['cost'] as $harga)
                                                                    <div class="form-check text-start">
                                                                        <input type="checkbox" class="form-check-input bg-primary border-0 hargaCheckbox" id="harga" name="harga" value="{{ $harga['value'] }}" data-value="{{ $harga['value'] }}">
                                                                        <label class="form-check-label" for="harga">Harga : {{ $harga['value'] }} <br> (est : {{ $harga['etd'] }})</label>
                                                                    </div>
                                                                @endforeach

                                                                <div class="form-check text-start">
                                                                    <label class="form-check-label" for="service">Service : {{ $cost['service'] }}</label>
                                                                </div>

                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <input type="hidden" name="selectedValues" id="selectedValuesInput">
                                                <div class="py-3 border-bottom border-top" @if(!$ongkir) style="display: none;" @endif>
                                                    <a id="cekButton" type="button" class="btn border-secondary py-2 px-3 text-primary" href="{{ url('cek_ongkir') }}">Cek Kembali</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php $total = $subtotal ?>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    {{-- <p class="mb-0 text-dark" id="total" value=""></p> --}}
                                                    <input type="text" class="mb-0 text-dark" id="total" value="" style="background-color: #f2efea; border: none; color: black;">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" class="btn border-secondary py-3 px-2 text-uppercase w-100 text-primary">Lanjutkan ke Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // Uncheck all checkboxes with the same name except the current one
                        var currentCheckbox = this;
                        document.querySelectorAll('input[name="' + this.name + '"]').forEach(function(siblingCheckbox) {
                            if (siblingCheckbox !== currentCheckbox) {
                                siblingCheckbox.checked = false;
                            }
                        });
                    }

                    var selectedValues = [];
                    // Loop through all checkboxes with the same name
                    document.querySelectorAll('input[name="' + this.name + '"]:checked').forEach(function(checkedCheckbox) {
                        selectedValues.push(checkedCheckbox.value); // Push the value of checked checkbox
                    });
                    // Set the value of the input
                    document.getElementById("selectedValuesInput").value = selectedValues.join(", ");
                });
            });
        });

        var subtotal = <?php echo $subtotal; ?>;

        document.addEventListener("DOMContentLoaded", function() {
            var totalPriceElement = document.getElementById('total');
            var hargaCheckboxes = document.querySelectorAll('.hargaCheckbox');

            hargaCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var totalPrice = subtotal;

                    // Add the value of each checked checkbox to the total price
                    hargaCheckboxes.forEach(function(checkbox) {
                        if (checkbox.checked) {
                            totalPrice += parseFloat(checkbox.getAttribute('data-value'));
                        }
                    });

                    // Update the total price element
                    var formattedTotalPrice = "Rp. " + totalPrice; // Format the total price
                    totalPriceElement.value = formattedTotalPrice; // Update the value attribute of the input element
                });
            });
        });
    </script>

    </body>

</html>
