<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DesaHub - Layanan Pengaduan Warga Desa Sukamaju')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon_title.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('partials.navbar')

    @yield('content')

    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-0">Kantor Pemerintah Desa Sukamaju: Jl. Raya Sukamaju No. 12, Kecamatan Dayeuhkolot,
                Kabupaten Bandung, Jawa Barat 12345 | &copy; 2026 DesaHub Sukamaju</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



