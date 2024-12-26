<x-layout>
    <x-slot:content>
        <div class="container mx-auto px-20">
            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
                Dashboard Cafe Owner
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-card 
                    emoji="🎸" 
                    title="Show Profile" 
                    description="Lihat Profile Anda!"
                    link="{{ route('cafeOwner.profile') }}" />

                <x-card 
                    emoji="⭐" 
                    title="Review Anda" 
                    description="Lihat feedback untuk cafe anda."
                    link="{{ route('cafeOwner.review') }}" />

                <x-card 
                    emoji="🎤" 
                    title="Posting Job" 
                    description="Buat lowongan pekerjaan baru."
                    link="{{ route('cafeOwner.postingjob.index') }}" /> 
        </div>

    </x-slot:content>
</x-layout>