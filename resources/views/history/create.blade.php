<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penyesuaian Stok') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('history-stok-opname.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_produk" value="{{ request('id_produk') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Produk</span></label>
                            <input type="text" value="{{ \App\Models\Produk::find(request('id_produk'))->nama_produk ?? '' }}" class="input input-bordered w-full" disabled />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Stok Saat Ini</span></label>
                            <input type="number" value="{{ \App\Models\Produk::find(request('id_produk'))->stok ?? '' }}" class="input input-bordered w-full" disabled />
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Operasi</span></label>
                            <select name="operasi" class="select select-bordered w-full" required>
                                <option value="tambah">Tambah</option>
                                <option value="kurang">Kurang</option>
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label"><span class="label-text">Jumlah</span></label>
                            <input type="number" name="jumlah" class="input input-bordered w-full" required min="1" />
                        </div>
                        <div class="form-control w-full md:col-span-2">
                            <label class="label"><span class="label-text">Keterangan</span></label>
                            <textarea name="keterangan" class="textarea textarea-bordered"></textarea>
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
