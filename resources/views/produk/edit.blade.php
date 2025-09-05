<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Nama Produk</span></label>
                            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Kode Produk</span></label>
                            <input type="text" name="kode_produk" value="{{ $produk->kode_produk }}" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Kategori</span></label>
                            <select name="id_kategori" class="select select-bordered w-full" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" @if($produk->id_kategori == $kategori->id) selected @endif>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Harga</span></label>
                            <input type="number" name="harga" value="{{ $produk->harga }}" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Stok</span></label>
                            <input type="number" name="stok" value="{{ $produk->stok }}" class="input input-bordered w-full" required disabled />
                            <!-- <a href="{{ route('history-stok-opname.create', ['id_produk' => $produk->id]) }}" class="btn btn-sm btn-outline btn-primary mt-2">Penyesuaian Stok</a> -->
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Satuan</span></label>
                            <input type="text" name="satuan" value="{{ $produk->satuan }}" class="input input-bordered w-full" required />
                        </div>
                         <div class="form-control w-full">
                            <label class="label"><span class="label-text">Status</span></label>
                            <select name="status" class="select select-bordered w-full" required>
                                <option value="1" @if($produk->status == 1) selected @endif>Aktif</option>
                                <option value="0" @if($produk->status == 0) selected @endif>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-control w-full md:col-span-2">
                            <label class="label"><span class="label-text">Deskripsi</span></label>
                            <textarea name="deskripsi" class="textarea textarea-bordered">{{ $produk->deskripsi }}</textarea>
                        </div>
                        <div class="form-control w-full md:col-span-2">
                            <label class="label"><span class="label-text">Gambar Produk</span></label>
                            <input type="file" name="gambar" class="file-input file-input-bordered w-full" />
                            @if($produk->gambar)
                                <img src="{{asset('storage/' . $produk->gambar)}}" alt="{{ $produk->nama_produk }}" class="mt-4 w-32 h-32 object-cover">
                            @endif
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
