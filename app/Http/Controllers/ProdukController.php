<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::all();
        $produks = Produk::with('kategori');

        if ($request->has('search')) {
            $produks->where('nama_produk', 'like', "%" . $request->search . "%");
        }

        if ($request->has('id_kategori') && $request->id_kategori != '') {
            $produks->where('id_kategori', $request->id_kategori);
        }

        $produks = $produks->get();

        return view('produk.index', compact('produks', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'kode_produk' => 'required|string|unique:produks|max:255',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'satuan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produks', 'public');
            $input['gambar'] = $path;
        }

        Produk::create($input);

        return redirect()->route('produk.index')
                        ->with('success','Produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'kode_produk' => 'required|string|max:255|unique:produks,kode_produk,'.$produk->id,
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'satuan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer',
        ]);

        $input = $request->except('stok');

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $path = $request->file('gambar')->store('produks', 'public');
            $input['gambar'] = $path;
        }

        $produk->update($input);

        return redirect()->route('produk.index')
                        ->with('success','Produk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        // Delete image
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('produk.index')
                        ->with('success','Produk deleted successfully');
    }

    public function welcome()
    {
        $produks = Produk::with('kategori')->latest()->paginate(12);
        return view('welcome', compact('produks'));
    }
}
