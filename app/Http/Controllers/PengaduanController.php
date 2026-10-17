<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PengaduanController extends Controller
{
	   public function daftar()
    {
        $pengaduan = Pengaduan::orderByDesc('id')->get();

        return view('pengaduan.daftar', compact('pengaduan'));
    }

    public function index()
    {
        return view('pengaduan.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email|max:50',
            'kategori' => 'required|in:Jalan Rusak,Lampu Penerangan,Fasilitas Umum,Kebersihan,Lainnya',
            'deskripsi' => 'required|max:200',
        ]);

        $data['status'] = 'Pending'; 
        Pengaduan::create($data);

        return redirect()->route('pengaduan.daftar')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email|max:50',
            'kategori' => 'required|in:Jalan Rusak,Lampu Penerangan,Fasilitas Umum,Kebersihan,Lainnya',
            'status' => 'required|in:Pending,Diproses,Selesai',
            'deskripsi' => 'required|max:200',
        ]);

        $pengaduan->update($data);

        return redirect()->route('pengaduan.daftar')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.daftar')->with('success', 'Pengaduan berhasil dihapus.');
    }


    
}
