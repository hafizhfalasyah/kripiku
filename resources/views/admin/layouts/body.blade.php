<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-4" style="color: orange;">{{ DB::table('users')->count() }}</h3>
                  </div>
                </div>
              </div>
              <h6 class="text-white font-weight-normal">Total User</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-4" style="color: orange;">{{ DB::table('catagories')->count() }}</h3>
                  </div>
                </div>
              </div>
              <h6 class="text-white font-weight-normal">Total Kategori</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-4" style="color: orange;">{{ DB::table('products')->count() }}</h3>
                  </div>
                </div>
              </div>
              <h6 class="text-white font-weight-normal">Total Produk</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-4" style="color: orange;">{{ DB::table('orders')->count() }}</h3>
                  </div>
                </div>
              </div>
              <h6 class="text-white font-weight-normal">Total Pesanan</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Status Pemesanan</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr style="text-align: center;">
                      <th scope="col" class="text-white" style="border: 1px solid white;">No</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Nama</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">No. HP</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Alamat</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Nama Produk</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Harga</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Banyak Produk</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Total Harga</th>
                      <th scope="col" class="text-white" style="border: 1px solid white;">Status Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>

                    @php
                        $i = 1;
                    @endphp
                    @foreach(\App\Models\Order::query()->get() as $order)
                        <tr style="text-align: center;">
                            <td class="text-white" style="border: 1px solid white;">{{ $i++ }}.</td>
                            <td class="text-white" style="border: 1px solid white;">{{ $order->name }}</td>
                            <td class="text-white" style="border: 1px solid white;">{{ $order->phone }}</td>
                            <td class="text-white" style="border: 1px solid white;">{{ $order->address }}</td>

                            <td class="text-white" style="border: 1px solid white;">{{ $order->product_title }}</td>
                            <td class="text-white" style="border: 1px solid white;">{{ $order->price }}</td>
                            <td class="text-white" style="border: 1px solid white;">{{ $order->quantity }}</td>

                            <td class="text-white" style="border: 1px solid white;">{{ $order->total_price }}</td>
                            <td class="text-white" style="border: 1px solid white; text-align: center;">
                                <div style="background-color: {{ $order->payment_status === 'Belum Dibayar' ? 'orange' : 'green' }}; padding: 5px; color: white; width: 80%; border-radius: 20px; margin-left: 20px;">
                                    {{ $order->payment_status }}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© Kripiku</a>, Hak cipta dilindungi Undang-undang.</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
