<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">

    @include('admin.layouts.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #342604;
        }

        .input_color {
            color: black;
            padding-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 200px;
            color: #342604;
        }

        .div_design {
            padding-bottom: 15px;
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

                <div class="div_center">
                    <h2 class="h2_font">Perbarui Produk</h2>

                    <form action="{{ url('update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Nama Produk : </label>
                            <input class="input_color" type="text" name="title" placeholder="Tuliskan Nama Produk" required="" value="{{ $product->title }}">
                        </div>
                        <div class="div_design">
                            <label>Deskripsi Produk : </label>
                            <input class="input_color" type="text" name="description" placeholder="Tuliskan Deskripsi Produk" required="" value="{{ $product->description }}">
                        </div>
                        <div class="div_design">
                            <label>Harga Produk : </label>
                            <input class="input_color" type="number" name="price" placeholder="Tuliskan Harga Produk" required="" value="{{ $product->price }}">
                        </div>
                        <div class="div_design">
                            <label>Banyak Produk : </label>
                            <input class="input_color" type="number" min="0" name="quantity" placeholder="Tuliskan Banyak Produk" required="" value="{{ $product->quantity }}">
                        </div>
                        <div class="div_design">
                            <label>Kategori Produk : </label>
                            <select name="catagory" class="input_color" required="">
                                <option value="{{ $product->catagory }}" selected="">{{ $product->catagory }}</option>

                                @foreach ($catagory as $catagory)
                                    <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="div_design">
                            <label>Gambar Sebelumnya : </label>
                            <img src="/product/{{ $product->image }}" height="100" width="100" style="margin: auto;">
                        </div>
                        <div class="div_design">
                            <label>Ganti Gambar : </label>
                            <input type="file" name="image" required="" style="color: #342604;">
                        </div>

                        <div class="div_design">
                            <input type="submit" value="Perbarui Produk" class="btn" style="background-color: #342604;">
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.layouts.script')
    <!-- End custom js for this page -->
  </body>
</html>
