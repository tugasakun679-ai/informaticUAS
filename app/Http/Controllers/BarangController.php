<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of goods for customer view.
     */
    public function shop(Request $request)
    {
        $query = Barang::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('kode_barang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $barangs = $query->latest()->get();
        
        // Get unique categories for filtering
        $categories = Barang::select('kategori')->distinct()->pluck('kategori');

        return view('shop', compact('barangs', 'categories'));
    }

    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $total_barang = Barang::count();
        $total_pendaftaran = Pendaftaran::count();
        $total_stok = Barang::sum('stok');
        $avg_harga = Barang::avg('harga') ?? 0;

        $recent_barangs = Barang::latest()->take(5)->get();
        $recent_pendaftarans = Pendaftaran::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'total_barang', 
            'total_pendaftaran', 
            'total_stok', 
            'avg_harga', 
            'recent_barangs', 
            'recent_pendaftarans'
        ));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('barangs', 'public');
            $data['gambar'] = $path;
        }

        Barang::create($data);

        return redirect()->route('uas.barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            // Delete old image if it exists and is not the default seed image path structure directly (or delete anyway)
            if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
                // If it is not one of the default seed images stored at public level, delete it
                // But for simplicity, delete if it exists
                Storage::disk('public')->delete($barang->gambar);
            }
            $path = $request->file('gambar')->store('barangs', 'public');
            $data['gambar'] = $path;
        }

        $barang->update($data);

        return redirect()->route('uas.barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
            Storage::disk('public')->delete($barang->gambar);
        }
        
        $barang->delete();

        return redirect()->route('uas.barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
