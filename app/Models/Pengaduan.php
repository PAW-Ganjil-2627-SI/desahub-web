<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    const UPDATED_AT = null;

    protected $fillable = [
        'nama',
        'email',
        'kategori',
        'deskripsi',
        'foto',
        'status',
    ];

    protected $attributes = [
        'status' => 'Pending',
    ];

    public const KATEGORI = [
        'Jalan Rusak',
        'Lampu Penerangan',
        'Fasilitas Umum',
        'Kebersihan',
        'Lainnya',
    ];

    public const STATUS = ['Pending', 'Diproses', 'Selesai'];

    public function statusLabel(): string
    {
        return $this->status ?: 'Pending';
    }

    public function badgeClass(): string
    {
        return match ($this->statusLabel()) {
            'Diproses' => 'bg-info text-dark',
            'Selesai' => 'bg-success',
            default => 'bg-warning text-dark',
        };
    }
}
