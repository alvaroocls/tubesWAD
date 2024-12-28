<x-layout>
    <x-slot:content>
        <div class="container mt-5" style="max-width: 600px; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 0 auto;">
            <h1 class="mb-4" style="text-align: center; color: black;">Edit Musician Profile</h1>

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px;">
                    <ul style="padding-left: 20px; color: #ff4d4f;">
                        @foreach ($errors->all() as $error)
                            <li style="color: black;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('musician.profile.store', $musician->id) }}" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
                @csrf
                {{-- @method('PUT') --}}

                <div class="mb-3">
                    <label for="name" class="form-label" style="font-weight: bold; color: black;">Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $musician->name) }}" 
                        style="padding: 10px; border-radius: 5px; border: 1px solid #ddd; color: black;" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label" style="font-weight: bold; color: black;">Genre</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="genre" 
                        name="genre" 
                        value="{{ old('genre', $musician->genre) }}" 
                        style="padding: 10px; border-radius: 5px; border: 1px solid #ddd; color: black;" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label" style="font-weight: bold; color: black;">Location</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="location" 
                        name="location" 
                        value="{{ old('location', $musician->location) }}" 
                        style="padding: 10px; border-radius: 5px; border: 1px solid #ddd; color: black;" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label" style="font-weight: bold; color: black;">Bio</label>
                    <textarea 
                        class="form-control" 
                        id="bio" 
                        name="bio" 
                        rows="4" 
                        style="padding: 10px; border-radius: 5px; border: 1px solid #ddd; color: black;">{{ old('bio', $musician->bio) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label" style="font-weight: bold; color: black;">Photo</label>
                    <input 
                        type="file" 
                        class="form-control" 
                        id="photo" 
                        name="photo" 
                        accept="image/*" 
                        style="padding: 5px; border-radius: 5px; border: 1px solid #ddd;">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; font-weight: bold; background-color: #007bff; border: none; border-radius: 5px;">Update Profile</button>
            </form>
        </div>
    </x-slot:content>
</x-layout>

{{-- <x-layout>
    <x-slot:content>
        <div class="container mt-5">
            <h1 class="mb-4">Create Musician Profile</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('musician.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Auto-assign user_id for logged-in user -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="firstName" 
                        name="name" 
                        value="{{ old('name', $musician->firstName ?? '') }}" 
                        placeholder="Enter your name" 
                        style="color: black; placeholder-color: black;" 
                        required>
                </div>
                

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="genre" 
                        name="genre" 
                        value="{{ old('genre', $musician->genre ?? '') }}" 
                        placeholder="Enter genre" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="location" 
                        name="location" 
                        value="{{ old('location', $musician->location ?? '') }}" 
                        placeholder="Enter location" 
                        required>
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea 
                        class="form-control" 
                        id="bio" 
                        name="bio" 
                        rows="4" 
                        placeholder="Enter a short bio">{{ old('bio', $musician->bio ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input 
                        type="file" 
                        class="form-control" 
                        id="photo" 
                        name="photo" 
                        accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Create Profile</button>
            </form>
        </div>
    </x-slot:content>
</x-layout> --}}
