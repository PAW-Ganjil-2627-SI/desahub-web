<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - DesaHub Desa Sukamaju</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon_title.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <main class="py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">403</h1>
            <p class="lead mb-1">Akses Ditolak</p>
            <p class="text-muted mb-4">{{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk melakukan aksi ini.' }}</p>
            <a href="{{ route('pengaduan.daftar') }}" class="btn btn-primary">Kembali ke Daftar Aduan</a>
        </div>
    </main>
</body>

</html>
