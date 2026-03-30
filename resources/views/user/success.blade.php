<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS Libraries -->
    @include('user.layouts.css')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
            text-align: center;
        }

        .btn-back {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: white;
            border-color: #bd2130;
            color: #bd2130;
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
                    <div class="card-body">
                        <h2 class="text-success mb-4">Terima kasih!</h2>
                        <p class="text-primary mb-4">Pembayaran Anda telah berhasil diproses.</p>
                        <a href="{{ url('show_order') }}" class="btn btn-back btn-lg btn-block">Lihat Pesanan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

    </body>

</html>
