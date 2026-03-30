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
            <h1 class="text-center text-primary display-6">Halaman Pesanan</h1>
        </div>
        <!-- Single Page Header End -->

        <!-- Tabel Pemesanan -->
        <div class="container">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="border: 1px solid #747d88;">No.</th>
                        <th scope="col" style="border: 1px solid #747d88;">Nama</th>
                        <th scope="col" style="border: 1px solid #747d88;">No. HP</th>
                        <th scope="col" style="border: 1px solid #747d88;">Alamat</th>
                        <th scope="col" style="border: 1px solid #747d88;">Nama Produk</th>
                        <th scope="col" style="border: 1px solid #747d88;">Harga Produk</th>
                        <th scope="col" style="border: 1px solid #747d88;">Banyak Produk</th>
                        <th scope="col" style="border: 1px solid #747d88;">Total Harga</th>
                        <th scope="col" style="border: 1px solid #747d88;">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td style="border: 1px solid #747d88;">{{ $i++ }}.</td>
                            <td style="border: 1px solid #747d88;">{{ $order->name }}</td>
                            <td style="border: 1px solid #747d88;">{{ $order->phone }}</td>
                            <td style="border: 1px solid #747d88;">{{ $order->address }}</td>

                            <td style="border: 1px solid #747d88;">{{ $order->product_title }}</td>
                            <td style="border: 1px solid #747d88;">{{ $order->price }}</td>
                            <td style="border: 1px solid #747d88;">{{ $order->quantity }}</td>

                            <td style="border: 1px solid #747d88;">{{ $order->total_price }}</td>
                            <td style="border: 1px solid #747d88; text-align: center;">
                                <div style="background-color: {{ $order->payment_status === 'Belum Dibayar' ? 'orange' : 'green' }}; padding: 5px; color: white; width: 80%; border-radius: 20px; margin-left: 20px;">
                                    {{ $order->payment_status }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>

        <!-- Footer -->
        @include('user.layouts.footer')

    <!-- JavaScript Libraries -->
    @include('user.layouts.script')

</body>

</html>
