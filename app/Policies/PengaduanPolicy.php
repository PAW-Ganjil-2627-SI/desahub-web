<?php

namespace App\Policies;

use App\Models\Pengaduan;
use App\Models\User;

/**
 * Aturan otorisasi untuk data Pengaduan.
 *
 * - admin   : boleh mengubah seluruh data dan menghapus pengaduan
 * - petugas : hanya boleh mengubah status pengaduan
 * - tamu    : hanya boleh melihat dan mengirim pengaduan (tanpa login)
 */
class PengaduanPolicy
{
    /**
     * Boleh membuka form edit / mengubah pengaduan (minimal status).
     */
    public function update(User $user, Pengaduan $pengaduan): bool
    {
        return $user->hasRole('admin', 'petugas');
    }

    /**
     * Boleh mengubah detail pengaduan (nama, email, kategori, deskripsi).
     */
    public function updateDetail(User $user, Pengaduan $pengaduan): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Boleh menghapus pengaduan.
     */
    public function delete(User $user, Pengaduan $pengaduan): bool
    {
        return $user->hasRole('admin');
    }
}
