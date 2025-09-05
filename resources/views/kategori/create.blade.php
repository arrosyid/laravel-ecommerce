<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Nama Kategori</span>
                        </label>
                        <input type="text" name="nama_kategori" placeholder="Nama Kategori" class="input input-bordered w-full" required />
                    </div>
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Deskripsi</span>
                        </label>
                        <textarea name="deskripsi" class="textarea textarea-bordered" placeholder="Deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
