<x-layout>
    <x-slot:content>
        <div class="container mt-5" style="max-width: 800px; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); color: #000; margin: 0 auto;">
            @if ($musician)
                <h1 style="font-weight: bold; text-align: center; margin-bottom: 20px;">{{ $musician->name }}</h1>
                <p style="font-size: 16px;"><strong>Genre:</strong> {{ $musician->genre }}</p>
                <p style="font-size: 16px;"><strong>Location:</strong> {{ $musician->location }}</p>
                <p style="font-size: 16px;"><strong>Bio:</strong> {{ $musician->bio }}</p>

                @if ($musician->photo)
                    <div style="text-align: center; margin-top: 20px;">
                        <img src="{{ asset('storage/' . $musician->photo) }}" alt="{{ $musician->name }}" style="max-width: 300px; border-radius: 10px; border: 2px solid #ddd;">
                    </div>
                @else
                    <p style="color: #888; font-style: italic;">No photo available</p>
                @endif

                <div style="text-align: center; margin-top: 30px;">
                    <a href="{{ route('musician.profile.index') }}" class="btn btn-secondary" style="padding: 10px 20px; border-radius: 5px; margin-right: 10px;">Back</a>
                    <a href="{{ route('musician.profile.edit', $musician->id) }}" class="btn btn-warning" style="padding: 10px 20px; border-radius: 5px; margin-right: 10px;">Edit Profile</a>
                    
                    <!-- Delete Profile Form -->
                    <form action="{{ route('musician.profile.destroy', $musician->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this profile?');" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 10px 20px; border-radius: 5px;">Delete Profile</button>
                    </form>
                </div>
            @else
                <h2 style="text-align: center; margin-bottom: 20px;">Data Kosong, Harap Lengkapi Profile Anda</h2>
                <div style="text-align: center;">
                    <a href="{{ route('musician.profile.create') }}" class="btn btn-primary" style="padding: 10px 20px; border-radius: 5px;">Create Profile</a>
                </div>
            @endif
        </div>
    </x-slot:content>
</x-layout>

