<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aduan - DesaHub Desa Sukamaju</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon_title.png') }}">
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Header & Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">DesaHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/daftar-aduan') }}">Daftar Aduan</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link">Logout ({{ Auth::user()->username }})</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->is('login')])
                            href="{{ url('/login') }}">Login</a>
                    </li>
                @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Profil Desa / Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-7 text-start">
                    <h1 class="h2 fw-bold mb-1">Desa Sukamaju</h1>
                    <p class="text-muted mb-3">Kecamatan Dayeuhkolot, Kabupaten Bandung</p>
                    <p class="mb-4">
                        Desa Sukamaju merupakan wilayah pemukiman dan pertanian yang berkomitmen untuk meningkatkan
                        kualitas pelayanan publik serta sarana prasarana desa. Melalui platform DesaHub, warga dapat
                        menyampaikan pengaduan, aspirasi, dan laporan kerusakan fasilitas umum secara langsung kepada
                        pihak pemerintah desa untuk ditindaklanjuti secara transparan.
                    </p>
                    <a href="#form-pengaduan" class="btn btn-primary-custom px-4 py-2">Buat Laporan Aduan</a>
                </div>
                <div class="col-md-5 text-center">
                    <img src="{{ asset('assets/desa.jpg') }}" alt="Foto Kantor Desa Sukamaju" class="hero-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Formulir Pengaduan Warga -->
    <section id="form-pengaduan" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-card">
                        <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Formulir Pengaduan Warga</h2>
                        @include('pengaduan.form')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-0">Kantor Pemerintah Desa Sukamaju: Jl. Raya Sukamaju No. 12, Kecamatan Dayeuhkolot, Kabupaten
                Bandung, Jawa Barat 12345 | &copy; 2026 DesaHub Sukamaju</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>