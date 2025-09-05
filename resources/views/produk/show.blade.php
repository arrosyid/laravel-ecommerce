<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $produk->nama_produk }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        {{ $produk->nama_produk }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-100 object-contain">
                    </div>

                    <div class="mt-6 text-gray-500">
                        <p><strong>Deskripsi :</strong></p>
                        {!! $produk->deskripsi !!}
                    </div>

                    <div class="mt-6 text-gray-500">
                        <strong>Harga:</strong> Rp {{ number_format($produk->harga, 2, ',', '.') }}
                    </div>

                    <div class="mt-6 text-gray-500">
                        <strong>Stok:</strong> {{ $produk->stok }} {{ $produk->satuan }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
