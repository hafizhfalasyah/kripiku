<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Kripiku | Masuk & Daftar</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>BUAT AKUN</h1>
                <span>Gunakan Email untuk membuat akun</span>
                <input id="name" type="text" name="name" placeholder="Nama">
                <input id="email" type="email" name="email" placeholder="Email">
                <input id="phone" type="text" name="phone" placeholder="Phone">
                <input id="address" type="text" name="address" placeholder="address">
                <input id="password" type="password" name="password" placeholder="Password">
                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                <button type="submit">Daftar</button>

            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>MASUK</h1>
                <span>Gunakan Email untuk login</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                {{-- <a href="{{ route('password.request') }}" style="color: #765827;">Lupa password ?</a> --}}
                <button type="submit">Masuk</button>

            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat Datang Kembali</h1>
                    <p>Masukkan data diri anda untuk menggunakan semua fitur</p>
                    {{-- <button class="hidden" id="login">Masuk</button> --}}
                    <button class="" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Halo, Gaiss</h1>
                    <p>Daftarkan data diri anda untuk menggunakan semua fitur</p>
                    {{-- <button class="hidden" id="register">Daftar</button> --}}
                    <button class="" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
