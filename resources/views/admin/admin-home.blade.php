<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.layouts.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.sidebar')
      <!-- partial -->
      @include('admin.layouts.header')
        <!-- partial -->
        @include('admin.layouts.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.layouts.script')
    <!-- End custom js for this page -->
  </body>
</html>
