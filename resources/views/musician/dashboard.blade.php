<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
                Dashboard Musician
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-card 
                    emoji="🎸" 
                    title="Show Profile" 
                    description="Lihat Profile Anda!"
                    link="{{ route('musician.profile') }}" />

                <x-card 
                    emoji="⭐" 
                    title="Review Anda" 
                    description="Lihat feedback dari Cafe."
                    link="{{ route('musician.review') }}" />

                <x-card 
                    emoji="📁" 
                    title="Portofolio" 
                    description="Tampilkan karya terbaik Anda!"
                    link="{{ route('musician.portfolio.index') }}" />

                <x-card 
                    emoji="🎤" 
                    title="Apply Live Music" 
                    description="Ajukan lamaran untuk live music di Cafe."
                    link="{{ route('jobs.index') }}" /> 
        </div>
    </x-slot:content>
</x-layout>
