<x-layout>
    <x-slot:content>
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $musician->name ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre', $musician->genre ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $musician->location ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio', $musician->bio ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if (isset($musician) && $musician->photo)
                <img src="{{ asset('storage/' . $musician->photo) }}" alt="Current Photo" style="max-width: 200px;">
            @endif
        </div>
    
    </x-slot:content>
</x-layout>