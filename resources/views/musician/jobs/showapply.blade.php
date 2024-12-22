<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-black">Lamaran Saya</h1>

            @if ($appliedJobs->isEmpty())
                <p class="text-gray-700">Anda belum melamar pekerjaan apa pun.</p>
            @else
                <div class="grid gap-6">
                    @foreach ($appliedJobs as $application)
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold text-black">{{ $application->job->title }}</h2>
                            <p class="text-gray-700 mt-2">{{ $application->job->description }}</p>
                            <p class="text-gray-700 mt-2">
                                <strong>Status:</strong> 
                                <span class="text-indigo-600">{{ ucfirst($application->status) }}</span>
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-slot:content>
</x-layout>
