<x-layout>
    <x-slot:content>
        <div class="container mx-auto px-4 mt-10">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-100">Portofolio Band</h1>
                <p class="text-gray-400 mt-2">Lihat koleksi karya terbaik Band di bawah ini.</p>
                <a href="{{ route('musician.portfolio.create') }}" class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-500">
                    <i class="fas fa-plus"></i> Tambah Portofolio
                </a>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @foreach($portfolios as $portfolio)
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <!-- Portfolio Content -->
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-100">{{ $portfolio->title }}</h3>
                            <p class="text-sm text-gray-400 mt-2">{{ $portfolio->description }}</p>
                        </div>
                        <div class="border-t border-gray-700 p-4">
                            <div class="flex justify-between items-center">
                            <a href="{{ asset('img/' . $portfolio->media) }}" target="_blank" class="text-sm text-blue-400 hover:underline">
    <i class="fas fa-eye"></i> Lihat Media
</a>

                                <a href="{{ route('musician.portfolio.edit', $portfolio->id) }}" class="px-3 py-1 bg-yellow-500 text-sm text-gray-900 font-semibold rounded-lg hover:bg-yellow-400">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                            <form action="{{ route('musician.portfolio.destroy', $portfolio->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-3 py-2 bg-red-600 text-sm text-white font-semibold rounded-lg hover:bg-red-500" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if($portfolios->isEmpty())
                <div class="text-center mt-16">
                    <p class="text-gray-400">Belum ada portofolio yang ditambahkan. Klik tombol "Tambah Portofolio" untuk memulai!</p>
                </div>
            @endif
        </div>
    </x-slot:content>
</x-layout>
