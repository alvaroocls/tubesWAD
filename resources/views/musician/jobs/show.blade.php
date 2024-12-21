<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-black">
                Detail Pekerjaan: {{ $job->title }}
            </h1>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Deskripsi Pekerjaan -->
                <h2 class="text-2xl font-semibold mb-4 text-black">
                    Deskripsi Pekerjaan
                </h2>
                <p class="text-gray-900">
                    {{ $job->description }}
                </p>

                <!-- Informasi Tambahan -->
                <div class="mt-4">
                    <p class="text-gray-800">
                        <strong>Disediakan oleh:</strong> {{ $job->user->name }}
                    </p>
                    <p class="text-gray-800">
                        <strong>Preferensi:</strong> {{ $job->preferences }}
                    </p>
                    <p class="text-gray-800">
                        <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($job->date)->format('d M Y') }}
                    </p>
                    <p class="text-gray-800">
                        <strong>Waktu:</strong> {{ \Carbon\Carbon::parse($job->time)->format('H:i') }}
                    </p>
                </div>

                <!-- Formulir Lamaran -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-4 text-black">
                        Ajukan Lamaran
                    </h3>
                    <form id="applyForm" action="{{ route('jobs.apply', $job->id) }}" method="POST" onsubmit="showModal(event)">
                        @csrf
                        <textarea 
                            name="message" 
                            placeholder="Tambahkan pesan untuk lamaran Anda (opsional)" 
                            class="w-full p-4 border rounded-lg shadow-sm focus:ring focus:ring-indigo-200 text-gray-900"
                        ></textarea>
                        <button 
                            type="submit" 
                            class="mt-4 bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition"
                        >
                            Lamar Pekerjaan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-md text-center">
                <h2 class="text-2xl font-bold text-black mb-4">Lamaran Berhasil Diajukan</h2>
                <p class="text-gray-700 mb-6">Lamaran Anda telah berhasil diajukan. Anda dapat memeriksa statusnya di halaman lamaran.</p>
                <a href="{{ route('jobs.apply.view') }}"
                   class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition"
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
