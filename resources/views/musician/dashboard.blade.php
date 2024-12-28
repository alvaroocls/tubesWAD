<x-layout>
    <x-slot:content>
        <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
                Dashboard Musician
            </h1>

            <!-- Tambahkan Informasi Saldo -->
            <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 p-4 rounded-lg mb-6 shadow-md">
                <p class="text-lg font-semibold">Saldo Anda:</p>
                <p class="text-2xl font-bold">Rp {{ number_format(auth()->user()->saldo, 0, ',', '.') }}</p>
            </div>

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
                    link="{{ route('musician.portofolio') }}" />

                <x-card 
                    emoji="🎤" 
                    title="Apply Live Music" 
                    description="Ajukan lamaran untuk live music di Cafe."
                    link="{{ route('jobs.index') }}" /> 
            </div>
        </div>
    </x-slot:content>
</x-layout>