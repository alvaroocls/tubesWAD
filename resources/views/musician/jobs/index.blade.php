<x-layout>
    <x-slot:content>
        <div class="container">
            <h1 class="mb-4">Daftar Pekerjaan</h1>
            <div class="flex space-x-4 overflow-x-auto">
                @foreach ($jobs as $job)
                    <x-card-img 
                        image="Gartenhaus.jpg" 
                        title="{{ $job->title }}" 
                        description="{{ Str::limit($job->description, 100) }}" 
                        buttonText="Apply Now" 
                        buttonLink="{{ route('jobs.show', $job->id) }}" 
                    />
                @endforeach
            </div>
        </div>
    </x-slot:content>
</x-layout>
