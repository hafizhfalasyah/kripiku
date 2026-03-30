<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.layouts.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            color: #342604
        }

        .input_color {
            color: black;
        }

        .center {
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 30px;
            border: 1px solid #342604;
        }
        .btn-primary {
            color: #342604
        }

        .th_color {
            background: #342604;
        }
        .color_text{
            color: #342604
        }
        .button{
            background-color: #342604;
            color: #ffffff
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
                    <h2 class="h2_font">Tambah Kategori</h2>

                    <form action="{{ url('add_catagory') }}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="catagory" placeholder="Tuliskan Nama Kategori">
                        <input type="submit" class="button" name="submit" value="Add Catagory">
                    </form>
                </div>

                <table class="center">
                    <tr class="th_color">
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>

                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $data)
                        <tr>
                            <td  class="color_text">{{ $i++ }}.</td>
                            <td class="color_text">{{ $data->catagory_name }}</td>
                            <td>
                                <a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{ url('delete_catagory', $data->id) }}" style="margin: 5px;">Delete</a>
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
