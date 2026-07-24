<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of registrations for admin.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new registration.
     */
    public function create()
    {
        return view('daftar');
    }

    /**
     * Store a newly created registration in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'sekolah' => 'required|string|in:SMA,MA,SMK',
            'sekolah_nama' => 'required|string|max:255',
            'mtk' => 'required|numeric|min:0|max:100',
            'inggris' => 'required|numeric|min:0|max:100',
            'indo' => 'required|numeric|min:0|max:100',
            'jurusan1' => 'required|string',
            'jurusan2' => 'required|string',
            'alasan' => 'required|string',
        ]);

        $pendaftaran = Pendaftaran::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'sekolah_asal' => $request->sekolah,
            'nama_sekolah' => $request->sekolah_nama,
            'matematika' => $request->mtk,
            'inggris' => $request->inggris,
            'indonesia' => $request->indo,
            'pilihan1' => $request->jurusan1,
            'pilihan2' => $request->jurusan2,
            'alasan' => $request->alasan,
        ]);

        return view('daftar_success', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified registration.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Update the specified registration in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'sekolah' => 'required|string|in:SMA,MA,SMK',
            'sekolah_nama' => 'required|string|max:255',
            'mtk' => 'required|numeric|min:0|max:100',
            'inggris' => 'required|numeric|min:0|max:100',
            'indo' => 'required|numeric|min:0|max:100',
            'jurusan1' => 'required|string',
            'jurusan2' => 'required|string',
            'alasan' => 'required|string',
        ]);

        $pendaftaran->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'sekolah_asal' => $request->sekolah,
            'nama_sekolah' => $request->sekolah_nama,
            'matematika' => $request->mtk,
            'inggris' => $request->inggris,
            'indonesia' => $request->indo,
            'pilihan1' => $request->jurusan1,
            'pilihan2' => $request->jurusan2,
            'alasan' => $request->alasan,
        ]);

        return redirect()->route('uas.pendaftaran.index')->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    /**
     * Remove the specified registration from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('uas.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}
