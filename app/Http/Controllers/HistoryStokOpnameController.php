<?php

namespace App\Http\Controllers;

use App\Models\HistoryStokOpname;
use Illuminate\Http\Request;

class HistoryStokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = HistoryStokOpname::with(['produk', 'user'])->latest()->paginate(10);
        return view('history.index', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $produk = \App\Models\Produk::find($request->id_produk);
        return view('history.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produks,id',
            'operasi' => 'required|in:tambah,kurang',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $produk = \App\Models\Produk::findOrFail($request->id_produk);
        $stok_awal = $produk->stok;
        $jumlah = $request->jumlah;
        $perubahan = 0;

        if ($request->operasi == 'kurang') {
            if ($stok_awal < $jumlah) {
                return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi untuk dikurangi.'])->withInput();
            }
            $stok_akhir = $stok_awal - $jumlah;
            $perubahan = -$jumlah;
        } else {
            $stok_akhir = $stok_awal + $jumlah;
            $perubahan = $jumlah;
        }

        HistoryStokOpname::create([
            'id_produk' => $produk->id,
            'stok_awal' => $stok_awal,
            'stok_akhir' => $stok_akhir,
            'perubahan' => $perubahan,
            'keterangan' => $request->keterangan,
            'tanggal' => now(),
            'id_user' => auth()->id(),
        ]);

        $produk->update(['stok' => $stok_akhir]);

        return redirect()->route('produk.index')->with('success', 'Stok berhasil disesuaikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryStokOpname $historyStokOpname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryStokOpname $historyStokOpname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoryStokOpname $historyStokOpname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryStokOpname $historyStokOpname)
    {
        //
    }
}
