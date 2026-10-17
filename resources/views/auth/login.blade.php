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

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="form-card">
                        <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Login Aparat Desa</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

 <form action="{{ route('login.proses') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username') }}" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100 py-2">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
