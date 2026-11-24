<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /**
     * Isi data awal pengaduan. Baris dengan id yang sudah ada tidak ditimpa.
     */
    public function run(): void
    {
        DB::table('pengaduan')->insertOrIgnore([
            [
                'id' => 20,
                'nama' => 'hilda aliza',
                'email' => 'hildaaliza@telkomuniversity.ac.id',
                'kategori' => 'Lampu Penerangan',
                'deskripsi' => 'jalan gelap',
                'created_at' => '2026-10-05 00:56:52',
                'status' => 'Pending',
            ],
            [
                'id' => 21,
                'nama' => 'Deyana',
                'email' => 'deyana@mail.com',
                'kategori' => 'Jalan Rusak',
                'deskripsi' => 'bebatu',
                'created_at' => '2026-10-05 01:04:05',
                'status' => 'Diproses',
            ],
            [
                'id' => 24,
                'nama' => 'hilda',
                'email' => 'hildanuraliza1801@gmail.com',
                'kategori' => 'Lampu Penerangan',
                'deskripsi' => 'lampu gelap',
                'created_at' => '2026-10-07 01:08:42',
                'status' => 'Selesai',
            ],
        ]);
    }
}
