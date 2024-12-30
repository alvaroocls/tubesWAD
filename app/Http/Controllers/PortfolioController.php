<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    // READ: Tampilkan semua portofolio
    public function index()
    {
        $portfolios = Portfolio::where('user_id', auth()->id())->get();
        return view('musician.portfolio.index', compact('portfolios'));
    }

    // CREATE: Form tambah portofolio
    public function create()
    {
        return view('musician.portfolio.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'media' => 'required|file|mimes:jpg,png,mp4,avi|max:10240', // Maks 10MB
    ]);

    // Ambil file media dari request
    $file = $request->file('media');

    // Generate nama file unik
    $filename = time() . '_' . $file->getClientOriginalName();

    // Simpan file ke folder public/img
    $file->move(public_path('img'), $filename);

    // Simpan data ke database
    Portfolio::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'description' => $request->description,
        'media' => $filename, // Hanya simpan nama file di database
    ]);

    return redirect()->route('musician.portfolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
}

    // CREATE: Simpan portofolio baru
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'media' => 'required|file|mimes:jpg,png,mp4,avi|max:10240',
    //     ]);

    //     $path = $request->file('media')->store('portfolio_media', 'public');

    //     Portfolio::create([
    //         'user_id' => auth()->id(),
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'media' => $path,
    //     ]);

    //     return redirect()->route('musician.portfolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    // }

    // UPDATE: Form edit portofolio
    public function edit($id)
    {
        $portfolio = Portfolio::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('musician.portfolio.edit', compact('portfolio'));
    }

    // UPDATE: Simpan perubahan portofolio
    public function update(Request $request, $id)
{
    // Temukan portofolio berdasarkan ID dan pastikan milik user yang sedang login
    $portfolio = Portfolio::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'media' => 'nullable|file|mimes:jpg,png,mp4,avi|max:10240', // Maksimal 10MB
    ]);

    // Periksa jika ada file media baru
    if ($request->hasFile('media')) {
        // Hapus file lama jika ada
        $oldFilePath = public_path('img/' . $portfolio->media);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }

        // Ambil file baru
        $file = $request->file('media');

        // Generate nama file unik
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke folder public/img
        $file->move(public_path('img'), $filename);

        // Update nama file di database
        $portfolio->media = $filename;
    }

    // Update data lainnya
    $portfolio->title = $request->title;
    $portfolio->description = $request->description;

    // Simpan perubahan
    $portfolio->save();

    return redirect()->route('musician.portfolio.index')->with('success', 'Portofolio berhasil diperbarui.');
}

    // DELETE: Hapus portofolio
    public function destroy($id)
    {
        $portfolio = Portfolio::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $portfolio->delete();

        return redirect()->route('musician.portfolio.index')->with('success', 'Portofolio berhasil dihapus.');
    }
}
