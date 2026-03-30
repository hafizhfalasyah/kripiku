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
            <h1 class="text-center text-primary display-6">Halaman Cek Ongkir</h1>
        </div>
        <!-- Single Page Header End -->

        <div class="container">
            <div class="row justify-content-center"> <!-- Menambahkan kelas justify-content-center -->
                <div class="col-md-6"> <!-- Menambahkan kelas col-md-6 -->
                    <form action="" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="origin">Asal Kota</label>
                            <select name="origin" id="origin" class="form-control" style="background-color: white;" required>
                                <option value="">Pilih Kota Asal</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="destination">Kota Tujuan</label>
                            <select name="destination" id="destination" class="form-control" style="background-color: white;" required>
                                <option value="">Pilih Kota Tujuan</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="weight">Berat Paket</label>
                            <input type="number" name="weight" id="weight" class="form-control" style="background-color: white;" required>
                        </div>
                        <div class="mt-3">
                            <label for="courier">Jasa Pengiriman</label>
                            <select name="courier" id="courier" class="form-control" style="background-color: white;" required>
                                <option value="">Pilih Jasa Pengiriman</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                        </div>
                        <div class="mt-3 py-3 text-center">
                            <input type="submit" name="cekOngkir" class="btn border-secondary py-2 px-4 text-uppercase text-primary">
                        </div>
                    </form>

                    <div class="mt-5">
                        @if ($ongkir != '')
                            <h3>Rincian Ongkir</h3>

                            @foreach ($ongkir as $item)
                                <div>
                                    <label for="name">{{ $item['name'] }}</label>
                                    @foreach ($item['costs'] as $cost)
                                        <div class="mb-3">
                                            <label for="service">Service : {{ $cost['service'] }}</label>
                                            @foreach ($cost['cost'] as $harga)
                                                <div class="mb-3">
                                                    <label for="harga">Harga : {{ $harga['value'] }} (est : {{ $harga['etd'] }})</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
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
