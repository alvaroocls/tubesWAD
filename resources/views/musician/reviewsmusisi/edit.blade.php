<x-layout>
    <x-slot:content>
        <div class="container" style="font-family: Arial, sans-serif; margin: 20px auto; max-width: 800px; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #333; font-size: 2em; margin-bottom: 20px;">Edit Review</h1>

            <form method="POST" action="{{ route('musician.review.update', $review) }}">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="rating" class="block mb-2 text-sm font-medium text-gray-900" style="font-size: 1.1em; color: #555;">Rating (1-5)</label>
                    <input type="number" name="rating" id="rating" value="{{ old('rating', $review->rating) }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" min="1" max="5" required>
                </div>

                <div class="mb-5">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900" style="font-size: 1.1em; color: #555;">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('deskripsi', $review->deskripsi) }}</textarea>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 5px; font-size: 1.1em; border: none;">
                        Update Review
                    </button>
                </div>
            </form>
        </div>
    </x-slot:content>
</x-layout>
