<a href="{{ $link }}" class="block max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow duration-300 dark:bg-gray-800 dark:border-gray-700">
    <div class="h-20 mx-6 mt-6 rounded-xl bg-gradient-to-b from-blue-400 to-blue-600 flex items-center justify-center text-white text-4xl shadow-xl">
        {{ $emoji }}
    </div>
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $description }}
        </p>
    </div>
</a>
