<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Barang;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('barang')->latest()->get();
        return view('pesan.index', compact('pesanans'));
    }

    public function create(Request $request)
    {
        $selectedBarang = null;
        if ($request->has('barang')) {
            $selectedBarang = Barang::find($request->barang);
        }
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('pesan.create', compact('barangs', 'selectedBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_pesanan' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        $barang = Barang::find($request->barang_id);

        if ($barang->stok < $request->jumlah_pesanan) {
            return back()->with('error', 'Stok barang tidak mencukupi. Sisa stok: ' . $barang->stok)->withInput();
        }

        Pesanan::create($request->all());

        // Update stok barang
        $barang->stok -= $request->jumlah_pesanan;
        $barang->save();

        return redirect()->route('uas.shop')->with('success', 'Pesanan berhasil dibuat! Kami akan segera menghubungi Anda.');
    }
}
