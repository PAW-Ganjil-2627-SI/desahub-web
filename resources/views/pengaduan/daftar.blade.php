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

    <!-- Konten Utama Daftar Aduan -->
    <main class="container py-5">
        <div class="mb-4">
            <h1 class="h3 fw-bold mb-1">Daftar Pengaduan Warga</h1>
            <p class="text-muted">Rekapitulasi laporan dan aspirasi masyarakat Desa Sukamaju yang masuk ke
                sistem.</p>
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col" style="width: 12%;">Tanggal</th>
                        <th scope="col" style="width: 15%;">Pelapor</th>
                        <th scope="col" style="width: 15%;">Kategori</th>
                        <th scope="col" style="width: 28%;">Ringkasan</th>
                        <th scope="col" class="text-center" style="width: 10%;">Status</th>
                        @auth
                        <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                        @endauth

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at?->format('d/m/Y') ?? '-' }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="text-center">
                                <span class="badge {{ $item->badgeClass() }} px-2 py-1">
                                    {{ $item->statusLabel() }}</span>
                            </td>
                            @auth
                            <td class="text-center">
                                <a href="{{ route('pengaduan.edit', $item) }}"
                                    class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('pengaduan.destroy', $item) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endauth

                            

                        </tr>
                    @endforeach

                    @if ($pengaduan->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada pengaduan yang masuk.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
