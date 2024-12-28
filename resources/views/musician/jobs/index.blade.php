<x-layout>
    <x-slot:content>
        <div class="container">
            <h1 class="mb-4">Daftar Pekerjaan</h1>

            <!-- Form Search -->
            <form action="{{ route('jobs.index') }}" method="GET" class="mb-6">
                <div class="flex items-center space-x-4">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari berdasarkan nama atau title..." 
                        class="w-full px-4 py-2 border rounded-lg text-black" <!-- Tambahkan `text-black` -->
                    >
                    <button 
                        type="submit" 
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Cari
                    </button>
                </div>
            </form>

            <!-- List of Jobs -->
            <div class="flex space-x-4 overflow-x-auto">
                @foreach ($jobs as $job)
                    <x-card-img 
                        image="{{ $job->image }}" 
                        title="{{ $job->title }}" 
                        description="{{ Str::limit($job->description, 100) }}" 
                        buttonText="Apply Now" 
                        buttonLink="{{ route('jobs.show', $job->id) }}" 
                    />
                @endforeach
            </div>
            @if ($jobs->isEmpty())
            <div class="text-center mt-6 text-gray-500">
                <p>Hasil pencarian untuk "<strong>{{ request('search') }}</strong>" tidak ditemukan.</p>
            </div>
             @endif
            <!-- Pagination -->
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        </div>
    </x-slot:content>
</x-layout>
