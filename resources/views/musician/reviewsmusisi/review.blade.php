<!-- resources/views/musician/review.blade.php -->

<x-layout>
    <x-slot:content>
        <div class="container" style="font-family: Arial, sans-serif; margin: 20px auto; max-width: 800px; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #333; font-size: 2em; margin-bottom: 20px;">Review Musisi</h1>

            {{-- Daftar review yang diberikan oleh musisi --}}
            <h2 style="color: #555; font-size: 1.5em; border-bottom: 2px solid #ddd; padding-bottom: 10px;">Review yang Diberikan</h2>
            <div style="margin-top: 20px; padding: 15px; background-color: #fff; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; color: #666;">
                @if($reviews->isEmpty())
                    <p>Tidak ada review yang ditemukan.</p>
                @else
                    @foreach ($reviews as $review)
                        <div style="margin-bottom: 20px;">
                            <p><strong>{{ $review->rating }} / 5</strong></p>
                            <p>{{ $review->deskripsi }}</p>
                            <p><em>Ditulis oleh: {{ $review->user->name }}</em></p>
                            <p><em>Untuk Cafe: {{ $review->cafe->name ?? 'Musisi' }}</em></p>
                            
                            {{-- Tombol Update dan Delete --}}
                            <div style="margin-top: 10px;">
                                <a href="{{ route('musician.review.edit', $review) }}" style="padding: 5px 10px; background-color: #ffa500; color: white; text-decoration: none; border-radius: 5px; font-size: 0.9em; margin-right: 10px;">
                                    Edit Deskripsi
                                </a>
                                <form action="{{ route('musician.review.destroy', $review) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 5px 10px; background-color: #e74c3c; color: white; border: none; border-radius: 5px; font-size: 0.9em;">
                                        Hapus Review
                                    </button>
                                </form>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- Tombol untuk menambah review --}}
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('musician.review.create') }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 1em;">
                    Tambah Review
                </a>
            </div>
        </div>
    </x-slot:content>
</x-layout>
