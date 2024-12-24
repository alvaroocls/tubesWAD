<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-8">
            <!-- Judul Halaman -->
            <h1 class="text-4xl font-extrabold mb-8 text-white">
                Detail Pekerjaan: {{ $job->title }}
            </h1>


            <div class="bg-white p-8 rounded-3xl shadow-xl transform transition-all hover:scale-105 duration-300 ease-in-out">
                <!-- Deskripsi Pekerjaan -->
                <h2 class="text-3xl font-semibold mb-6 text-indigo-700">
                    Deskripsi Pekerjaan
                </h2>
                <p class="text-lg text-gray-800 leading-relaxed">
                    {{ $job->description }}
                </p>

                <!-- Informasi Tambahan -->
                <div class="mt-8 space-y-4">
                    <p class="text-lg text-gray-700">
                        <strong class="font-medium text-indigo-600">Disediakan oleh:</strong> {{ $job->user->name }}
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong class="font-medium text-indigo-600">Preferensi:</strong> {{ $job->preferences }}
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong class="font-medium text-indigo-600">Tanggal:</strong> {{ \Carbon\Carbon::parse($job->date)->format('d M Y') }}
                    </p>
                    <p class="text-lg text-gray-700">
                        <strong class="font-medium text-indigo-600">Waktu:</strong> {{ \Carbon\Carbon::parse($job->time)->format('H:i') }}
                    </p>
                </div>

                <!-- Formulir Lamaran -->
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold mb-6 text-indigo-700">
                        Ajukan Lamaran
                    </h3>
                    <form id="applyForm" action="{{ route('jobs.apply', $job->id) }}" method="POST" onsubmit="showModal(event)">
                        @csrf
                        <textarea 
                            name="message" 
                            placeholder="Tambahkan pesan untuk lamaran Anda (opsional)" 
                            class="w-full p-6 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 text-gray-900 leading-relaxed"
                        ></textarea>
                        <button 
                            type="submit" 
                            class="mt-6 bg-indigo-600 text-white py-3 px-6 rounded-lg shadow-lg hover:bg-indigo-700 transition-all duration-200"
                        >
                            Lamar Pekerjaan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
            <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-lg text-center">
                <h2 class="text-3xl font-extrabold text-indigo-700 mb-6">Lamaran Berhasil Diajukan</h2>
                <p class="text-lg text-gray-700 mb-8">Lamaran Anda telah berhasil diajukan. Anda dapat memeriksa statusnya di halaman lamaran.</p>
                <a href="{{ route('jobs.showapply') }}"
                   class="bg-indigo-600 text-white py-3 px-6 rounded-lg shadow-lg hover:bg-indigo-700 transition-all duration-200"
                >
                    Lihat Lamaran Saya
                </a>
            </div>
        </div>
    </x-slot:content>
</x-layout>

<script>
    function showModal(event) {
        event.preventDefault(); // Mencegah pengiriman formulir default
        document.getElementById('successModal').classList.remove('hidden');
    }
</script>
