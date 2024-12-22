<x-layout>
    <x-slot:content>
        
        <div class="max-w-6xl mx-auto">
            <h1 class="text-4xl font-bold">Your job listings</h1>

            <div class="flex gap-4 my-8">
                <a href="{{ route('cafeOwner.postingjob.create') }}">
                    <x-primarybutton>Post a new job</x-primarybutton>
                </a>
            </div>
        </div>  

        <div class="flex flex-wrap gap-12  mx-32">
            @foreach ($jobs as $job )
                <x-card-img
                    :image="$job->image"
                    :title="$job->title"
                    :description="$job->description"
                    buttonLink="{{ route('cafeOwner.postingjob.show', $job) }}"
                    buttonText="Show detail"
                ></x-card-img>     
            @endforeach
                       
        </div>        
    </x-slot:content>
</x-layout>