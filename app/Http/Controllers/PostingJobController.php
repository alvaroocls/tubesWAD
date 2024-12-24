<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostingJob;


class PostingJobController extends Controller
{
    public function index()
    {
        $jobs = PostingJob::where('user_id', auth()->id())->get();
        return view('cafeOwner.postingJob.index', compact('jobs'));
    }

    public function create()
    {
        return view('cafeOwner.postingJob.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'preferences' => 'required|array',
            'date' => 'required',
            'time' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().auth()->id().'.'.$image->extension();
            $image->move(public_path('img'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $validatedData['user_id'] = auth()->id();

        $validatedData['preferences'] = implode(',', $validatedData['preferences']);

        PostingJob::create($validatedData);

        return redirect()->route('cafeOwner.dashboard')->with('success', 'Posting job created successfully!');
    }
}
