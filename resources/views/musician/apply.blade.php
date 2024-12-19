<x-layout>
    <x-slot:content>
        <div class="flex space-x-4 overflow-x-auto">
            <x-card-img 
                image="Gartenhaus.jpg" 
                title="Gartenhaus Cafe" 
                description="Live music setiap akhir pekan. Join dan tampilkan karya Anda!" 
                buttonText="Apply Now" 
                buttonLink="{{route('musician.review')}}" 
            />
            <x-card-img 
                image="Gartenhaus.jpg" 
                title="Gartenhaus Cafe" 
                description="Live music setiap akhir pekan. Join dan tampilkan karya Anda!" 
                buttonText="Apply Now" 
                buttonLink="{{route('musician.review')}}" 
            />
            <x-card-img 
                image="Gartenhaus.jpg" 
                title="Gartenhaus Cafe" 
                description="Live music setiap akhir pekan. Join dan tampilkan karya Anda!" 
                buttonText="Apply Now" 
                buttonLink="{{route('musician.review')}}" 
            />
            <x-card-img 
                image="Gartenhaus.jpg" 
                title="Gartenhaus Cafe" 
                description="Live music setiap akhir pekan. Join dan tampilkan karya Anda!" 
                buttonText="Apply Now" 
                buttonLink="{{route('musician.review')}}" 
            />
        </div>
    </x-slot:content>
</x-layout>

<!-- route('musician.job.apply', ['id' => $item->id])  -->