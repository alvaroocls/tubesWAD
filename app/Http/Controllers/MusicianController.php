<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Musician;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MusicianController extends Controller 
{
    public function index()
    {
        $musician = User::where('id', auth()->id())->first();
        return view('musician.profile.index', compact('musician'));
    }
    public function show()
    {
        $musician = Musician::where('user_id', auth()->id())->first();

        if (!$musician) {
        // Jika tidak ada data musician, redirect atau tampilkan pesan
        return redirect()->route('musician.profile.create')->with('error', 'Profile not found, please create one.');
    }

        return view('musician.profile.show', compact('musician'));
    }

    public function create(Request $request)
    {
        $musician = User::where('id', auth()->id())->first();
        return view('musician.profile.create', compact('musician'));
    }

    
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Proses penyimpanan data
        $musician = Musician::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'name' => $request->name,
                'genre' => $request->genre,
                'location' => $request->location,
                'bio' => $request->bio,
                'photo' => $request->file('photo') 
                            ? $request->file('photo')->store('musician_photos', 'public')
                            : null,
            ]
        );


        return redirect()->route('musician.profile.show', $musician->id)->with('success', 'Profile created successfully!');
    }


    public function edit($id)
    {
        $musician = Musician::where('user_id', auth()->id())->firstOrFail();
        if ($musician->user_id != auth()->id()) {
            return redirect()->route('musician.profile.index')->with('error', 'Unauthorized access');
        }
    
        return view('musician.profile.edit', compact('musician'));
    }


    public function update(Request $request, $id)
    {
        // Ambil data musician berdasarkan user_id yang sedang login
        $musician = Musician::where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Perbarui data musician
        $musician->update([
            'name' => $request->name,
            'genre' => $request->genre,
            'location' => $request->location,
            'bio' => $request->bio,
            'photo' => $request->file('photo') 
                        ? $request->file('photo')->store('musician_photos', 'public') 
                        : $musician->photo, // Jika tidak ada foto baru, biarkan foto lama
        ]);
    
        return redirect()
            ->route('musician.profile.show', $musician->id) // Redirect ke halaman profil
            ->with('success', 'Profile updated successfully.');
}


    public function destroy(string $id)
    {
        $musician = Musician::where('id', $id)
        ->where('user_id', auth()->id()) // Pastikan yang login adalah owner profile
        ->firstOrFail();

        // Hapus data musician
        $musician->delete();

        // Redirect setelah penghapusan dengan pesan sukses
        return redirect()->route('musician.profile.index')->with('success', 'Profile deleted successfully.');
    }

}