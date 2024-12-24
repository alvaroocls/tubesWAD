<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-6 text-white">Edit Lamaran Pekerjaan: {{ $application->job->title }}</h1>

            <div class="bg-white p-8 rounded-3xl shadow-xl">
                <h2 class="text-3xl font-semibold mb-6 text-indigo-700">Deskripsi Pekerjaan</h2>
                <p class="text-lg text-gray-800">{{ $application->job->description }}</p>

                <form action="{{ route('jobs.update', $application->id) }}" method="POST" class="mt-8">
                    @csrf
                    @method('PUT')

                   
                    <textarea 
                        name="message" 
                        placeholder="Pesan untuk lamaran Anda" 
                        class="w-full p-6 border-2 border-gray-300 rounded-lg text-black focus:ring-2 focus:ring-indigo-500"
                        required
                    >{{ old('message', $application->message) }}</textarea>
                    
                    
                    <button 
                        type="submit" 
                        class="mt-4 bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
                        Perbarui Lamaran
                    </button>
                </form>
            </div>
        </div>
    </x-slot:content>
</x-layout>
