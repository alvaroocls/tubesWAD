<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewCafe;
use App\Models\ReviewMusician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Menampilkan daftar review untuk cafe yang diberikan musisi.
     */
    public function indexForCafes()
    {
        // Ambil semua review yang terkait dengan cafe oleh user yang sedang login
        $reviews = Review::where('user_id', auth()->id())->get();


        // Tampilkan halaman dengan data review untuk cafe
        return view('cafeOwner.reviewscafe.review', compact('reviews'));
    }

    /**
     * Menampilkan daftar review untuk musisi yang diberikan cafe.
     */
    public function indexForMusicians()
    {
        // Ambil semua review untuk musisi yang diberikan cafe owner
        $reviews = Review::where('user_id', auth()->id())->get();
        return view('musician.reviewsmusisi.review', compact('reviews'));
    }

    /**
     * Musisi membuat review untuk cafe.
     */

    public function showCreate(){
        return view('musician.reviewsmusisi.reviewcafe');
    }

    public function showCreateCafe(){
        return view('cafeOwner.reviewscafe.reviewmusisi');
    }

    public function createReviewForCafe(Request $request, ReviewCafe $cafe)
    {
        $request->validate([
            'musician_id' =>'required',
            'rating' => 'required|numeric|min:1|max:5',
            'deskripsi' => 'required|string|max:255',
        ]);
    
        // Simpan review baru untuk cafe
        $review = Review::create([
            'user_id' => Auth::id(),
            'musician_id' => $request->musician_id,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('cafeOwner.review')->with('success', 'Review berhasil ditambahkan.');
    }
    
    public function createReviewForMusician(Request $request, ReviewMusician $musician)
    {
        $request->validate([
            'cafe_id' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'deskripsi' => 'required|string|max:255',
        ]);
    
        // Simpan review baru untuk musisi
        $review = Review::create([
            'user_id' => Auth::id(),
            'cafe_id' => $request->cafe_id,
            'rating' => $request->rating,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('musician.review')->with('success', 'Review berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit review.
     */
    public function edit($id)
    {   
        $review = Review::findOrFail($id);
        return view('musician.reviewsmusisi.edit', compact('review'));
    }

    /**
     * Mengupdate review.
     */
    public function update(Request $request, $id)
{
    // Ambil review berdasarkan ID
    $review = Review::findOrFail($id);

    // Pastikan user yang sedang login adalah yang memiliki review ini
    // $this->authorize('update', $review);

    // Validasi input untuk update review
    $request->validate([
        'rating' => 'required|numeric|min:1|max:5',  // Validasi rating
        'deskripsi' => 'required|string|max:255',
    ]);

    // Update review dengan data yang diterima dari form
    $review->update([
        'rating' => $request->input('rating'),  // Mengupdate rating
        'deskripsi' => $request->input('deskripsi'),  // Mengupdate deskripsi
    ]);

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('musician.review')->with('success', 'Review berhasil diperbarui.');
}
    /**
     * Menghapus review.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
