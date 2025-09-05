<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History Stok Opname') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Stok Awal</th>
                                <th>Stok Akhir</th>
                                <th>Perubahan</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($history as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->produk->nama_produk ?? 'N/A' }}</td>
                                    <td>{{ $item->stok_awal }}</td>
                                    <td>{{ $item->stok_akhir }}</td>
                                    <td>{{ $item->perubahan }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->user->name ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $history->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
