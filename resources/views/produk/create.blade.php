<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Nama Produk</span></label>
                            <input type="text" name="nama_produk" placeholder="Nama Produk" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Kode Produk</span></label>
                            <input type="text" name="kode_produk" placeholder="Kode Produk" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Kategori</span></label>
                            <select name="id_kategori" class="select select-bordered w-full" required>
                                <option disabled selected>Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Harga</span></label>
                            <input type="number" name="harga" placeholder="Harga" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Stok</span></label>
                            <input type="number" name="stok" placeholder="Stok" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Satuan</span></label>
                            <input type="text" name="satuan" placeholder="Contoh: Pcs, Unit, Set" class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Status</span></label>
                            <select name="status" class="select select-bordered w-full" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-control w-full md:col-span-2">
                            <label class="label"><span class="label-text">Deskripsi</span></label>
                            <textarea name="deskripsi" class="textarea textarea-bordered" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-control w-full md:col-span-2">
                            <label class="label"><span class="label-text">Gambar Produk</span></label>
                            <input type="file" name="gambar" class="file-input file-input-bordered w-full" />
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
