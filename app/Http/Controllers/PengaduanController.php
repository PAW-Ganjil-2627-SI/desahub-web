<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;


class PengaduanController extends Controller
{
    public function daftar(){
        $pengaduan =  Pengaduan::orderByDesc('id')->get();
        return view ('pengaduan.daftar', compact('pengaduan'));
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
        // Admin boleh mengubah semua field, petugas hanya status
        if ($request->user()->can('updateDetail', $pengaduan)) {
            $data = $request->validate([
                'nama' => 'required|max:100',
                'email' => 'required|email|max:50',
                'kategori' => 'required|in:Jalan Rusak,Lampu Penerangan,Fasilitas Umum,Kebersihan,Lainnya',
                'status' => 'required|in:Pending,Diproses,Selesai',
                'deskripsi' => 'required|max:200',
            ]);
        } else {
            $data = $request->validate([
                'status' => 'required|in:Pending,Diproses,Selesai',
            ]);
        }

        $pengaduan->update($data);

        return redirect()->route('pengaduan.daftar')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.daftar')->with('success', 'Pengaduan berhasil dihapus.');
    }



}
