<x-layout>
    <x-slot:content>
        <h1>
            Ini home nya Cafe Owner
        </h1>

        <a href="{{ route('cafeOwner.filter') }}">
            <x-primarybutton>
                filter
            </x-primarybutton>
        </a>
        
        <a href="{{ route('cafeOwner.postingjob') }}">
            <x-primarybutton>
                posting job
            </x-primarybutton>
        </a>
        
        <a href="{{ route('cafeOwner.profile') }}">
            <x-primarybutton>
                profile
            </x-primarybutton>
        </a>
        
        <a href="{{ route('cafeOwner.review') }}">
            <x-primarybutton>
                review
            </x-primarybutton>
        </a>
        

    </x-slot:content>
</x-layout>