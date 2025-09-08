<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    Belanjaparts
                </h1>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main>
            <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($produks as $produk)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/300' }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold">{{ $produk->nama_produk }}</h3>
                                <p class="text-gray-600">{{ $produk->kategori->nama_kategori ?? '' }}</p>
                                <p class="mt-2 font-bold text-lg">Rp {{ number_format($produk->harga, 2, ',', '.') }}</p>
                                <div class="mt-4">
                                    <a href="{{ route('produk.show', $produk->id) }}" class="w-full text-center btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-gray-500">
                            <p>Tidak ada produk yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
                <div class="mt-6">
                    {{ $produks->links() }}
                </div>
            </div>
        </main>
    </body>
</html>
