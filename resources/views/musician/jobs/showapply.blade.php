<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-white">Lamaran Saya</h1>

            <!-- Button to Go Back to Job Listings -->
            <div class="mb-6">
                <a href="{{ route('jobs.index') }}" 
                   class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-200"
                >
                    Kembali ke Daftar Pekerjaan
                </a>
            </div>

            @if ($appliedJobs->isEmpty())
                <div class="text-center bg-gray-100 p-6 rounded-lg shadow">
                    <p class="text-gray-600">Anda belum melamar pekerjaan apa pun.</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($appliedJobs as $application)
                        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transform transition hover:scale-105">
                            <h2 class="text-xl font-bold text-gray-800">{{ $application->job->title }}</h2>
                            <p class="text-gray-600 mt-2">{{ $application->job->description }}</p>
                            <p class="text-gray-600 mt-4">
                                <strong>Status:</strong> 
                                <span class="text-indigo-600 font-medium">{{ ucfirst($application->status) }}</span>
                            </p>

                            @if ($application->message)
                                <p class="mt-4 text-gray-800">
                                    <strong>Pesan Lamaran:</strong> {{ $application->message }}
                                </p>
                            @endif

                            <a href="{{ route('jobs.edit', $application->id) }}"
                               class="mt-4 inline-block bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-200"
                            >
                                Edit Lamaran
                            </a>

                            <form 
                                action="{{ route('jobs.cancel', $application->id) }}" 
                                method="POST" 
                                class="mt-4"
                                onsubmit="return confirm('Apakah Anda yakin ingin membatalkan lamaran ini?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="mt-2 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200"
                                >
                                    Batalkan Lamaran
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot:content>
</x-layout>
