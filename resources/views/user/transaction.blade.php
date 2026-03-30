<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS Libraries -->
    @include('user.layouts.css')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .page-header {
            background-image: url('background.jpg'); /* Ganti 'background.jpg' dengan nama file gambar latar belakang Anda */
            background-size: cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .card {
            margin-top: 50px;
            max-width: 500px;
        }

        #pay-button {
            color: white;
            transition: transform 0.3s ease-in-out;
        }

        #pay-button:hover {
            color: white;
            background-color: #ffb524;
        }

        #pay-button:hover {
            transform: scale(1.05);
        }

        .tooltip-inner {
            background-color: #343a40;
        }

        .tooltip.bs-tooltip-right .arrow::before {
            border-right-color: #343a40;
        }

    </style>
</head>

<body>
    <!-- Header -->
    @include('user.layouts.header')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-primary display-6">Halaman Pembayaran</h1>
        </div>
        <!-- Single Page Header End -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Anda akan melakukan pembelian produk</p>
                        <div class="mb-3">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                            <div data-toggle="tooltip" data-placement="right" title="{{ $order->product_description }}">
                                <strong>{{ $i++ }}. {{ $order->product_title }} : Rp. {{ $order->price }}</strong>
                            </div>
                            @endforeach
                        </div>
                        <p><strong>Total Harga : Rp. {{ number_format($order->total_price, 0, ',', '.') }}</strong></p>
                        <button type="button" class="btn btn-primary py-3 px-4 mt-3" id="pay-button">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            // SnapToken acquired from previous step
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result){
                    // Redirect to success page, assuming user_id is the same for all orders
                    window.location.href = '{{ url("success", $orders[0]->user_id) }}';
                },
                // Optional
                onPending: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>

    </body>

</html>
