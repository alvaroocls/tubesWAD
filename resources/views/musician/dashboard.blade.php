<x-layout>
    <x-slot:content>
        <h1>
            Ini home nya musician
        </h1>

        <a href="{{ route('musician.filter') }}">
            <x-primarybutton>
                filter
            </x-primarybutton>    
        </a>
        
        <a href="{{ route('musician.profile') }}">
            <x-primarybutton>
                profile
            </x-primarybutton>
        </a>

        <a href="{{ route('musician.review') }}">
            <x-primarybutton>
                review
            </x-primarybutton>
        </a>

        <a href="{{ route('musician.portofolio') }}">
            <x-primarybutton>
                portofolio
            </x-primarybutton>
        </a>

        <a href="{{ route('musician.apply') }}">
            <x-primarybutton>
                apply
            </x-primarybutton>
        </a>

    </x-slot:content>
</x-layout>