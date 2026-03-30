<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.layouts.css')

    <style type="text/css">
    .td_dex{
        color:#342604
    }
        .center {
            margin: auto;
            width: 90%;
            border: 1px solid #342604;
            text-align: center;
            margin-top: 40px;
        }

        .h2_font {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
            color: #342604
        }

        .img_size {
            width: 100px;
            height: 100px;
        }

        .th_color {
            background: #342604;
        }

        .th_deg {
            padding: 20px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->
        @include('admin.layouts.header')
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h2 class="h2_font">Semua Produk</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">No</th>
                        <th class="th_deg">Nama Produk</th>
                        <th class="th_deg">Deskripsi</th>
                        <th class="th_deg">Harga</th>
                        <th class="th_deg">Banyak Produk</th>
                        <th class="th_deg">Kategori</th>
                        <th class="th_deg">Gambar</th>
                        <th class="th_deg">Aksi</th>
                    </tr>

                    @php
                        $i = 1;
                    @endphp
                    @foreach ($product as $product)
                    <tr>
                        <td class="td_dex">{{ $i++ }}.</td>
                        <td class="td_dex">{{ $product->title }}</td>
                        <td class="td_dex">{{ $product->description }}</td>
                        <td class="td_dex">{{ $product->price }}</td>
                        <td class="td_dex">{{ $product->quantity }}</td>
                        <td class="td_dex">{{ $product->catagory }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}" style="margin: 7px;">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('update_product', $product->id) }}" style="margin: 2px;">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_product', $product->id) }}" style="margin: 2px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
                <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.layouts.script')
    <!-- End custom js for this page -->
  </body>
</html>
