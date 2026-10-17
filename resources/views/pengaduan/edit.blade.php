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

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm p-4">
                    <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Pengaduan</h3>
                    <form action="{{ route('pengaduan.update', $pengaduan) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <input type="hidden" name="id" value="<?= $pengaduan['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $pengaduan->nama) }}"  required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $pengaduan->email) }}"  required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori Aduan</label>
                            <select class="form-select" name="kategori" required>
                            <option value="Jalan Rusak"
                                    @selected($pengaduan->kategori == 'Jalan Rusak')>
                                    Jalan Rusak</option>
                                <option value="Lampu Penerangan"
                                    @selected($pengaduan->kategori == 'Lampu Penerangan')>
                                    Lampu Penerangan</option>
                                <option value="Fasilitas Umum"
                                    @selected($pengaduan->kategori == 'Fasilitas Umum')>
                                    Fasilitas Umum</option>
                                <option value="Kebersihan"
                                    @selected($pengaduan->kategori == 'Kebersihan')>
                                    Kebersihan</option>
                                <option value="Lainnya"
                                    @selected($pengaduan->kategori == 'Lainnya')>
                                    Lainnya</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status Aduan</label>
                            <select class="form-select" name="status" required>
                            <option value="Pending"
                                    @selected($pengaduan->status == 'Pending')>
                                    Pending</option>
                                <option value="Diproses"
                                    @selected($pengaduan->status == 'Diproses')>
                                    Diproses</option>
                                <option value="Selesai"
                                    @selected($pengaduan->status == 'Selesai')>
                                    Selesai</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Laporan</label>
                            <textarea class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pengaduan.daftar') }}"  class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>