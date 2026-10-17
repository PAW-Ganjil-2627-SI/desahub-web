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
                    <a @class(['nav-link', 'active' => request()->is('/')]) href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('daftar-aduan')])
                        href="{{ url('/daftar-aduan') }}">Daftar Aduan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
