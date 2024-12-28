<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('img/' . $image) }}" alt="{{ $title }}">
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $description }}
        </p>
        <a href="{{ $buttonLink }}" class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            {{ $buttonText }}
        </a>
    </div>
</div>
