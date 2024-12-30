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

    // CREATE: Simpan portofolio baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'required|file|mimes:jpg,png,mp4,avi|max:10240',
        ]);

        $path = $request->file('media')->store('portfolio_media', 'public');

        Portfolio::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'media' => $path,
        ]);

        return redirect()->route('musician.portfolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    // UPDATE: Form edit portofolio
    public function edit($id)
    {
        $portfolio = Portfolio::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('musician.portfolio.edit', compact('portfolio'));
    }

    // UPDATE: Simpan perubahan portofolio
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|file|mimes:jpg,png,mp4,avi|max:10240',
        ]);

        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('portfolio_media', 'public');
            $portfolio->media = $path;
        }

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
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
