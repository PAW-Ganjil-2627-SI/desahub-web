<form action="{{ route('pengaduan.store') }}" method="POST">

<div class="mb-3">
    <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
        placeholder="Masukkan nama lengkap Anda" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-semibold">Alamat Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
        placeholder="contoh: nama@email.com" required>
</div>

<div class="mb-3">
    <label for="kategori" class="form-label fw-semibold">Kategori Aduan</label>
    <select class="form-select" id="kategori" name="kategori" required>
        <option value="" selected disabled>-- Pilih Kategori --</option>
        <option value="Jalan Rusak">Jalan Rusak</option>
        <option value="Lampu Penerangan">Lampu Penerangan</option>
        <option value="Fasilitas Umum">Fasilitas Umum</option>
        <option value="Kebersihan">Kebersihan</option>
        <option value="Lainnya">Lainnya</option>
    </select>
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Laporan</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
        placeholder="Jelaskan detail pengaduan beserta lokasi spesifik..."
        required>{{ old('deskripsi') }}</textarea>

</div>

<button type="submit" class="btn btn-primary-custom w-100 py-2">Kirim Pengaduan</button>

</form>