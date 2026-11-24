<?php

namespace Tests\Feature;

use App\Models\Pengaduan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PengaduanSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeder_ulang_tidak_menggandakan_atau_menimpa_pengaduan(): void
    {
        $this->seed();
        $this->assertDatabaseCount('pengaduan', 3);

        Pengaduan::findOrFail(20)->update(['status' => 'Selesai']);

        $this->seed();

        $this->assertDatabaseCount('pengaduan', 3);
        $this->assertDatabaseHas('pengaduan', [
            'id' => 20,
            'created_at' => '2026-10-05 00:56:52',
            'status' => 'Selesai',
        ]);
    }
}
