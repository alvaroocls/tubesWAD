<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostingJob;
use App\Models\User;
use App\Models\ApplyJob;
use App\Models\Payment;

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

        return redirect()->route('cafeOwner.postingjob.index')->with('message', 'Posting job created successfully!');
    }

    public function show($id)
    {
        $job = PostingJob::with('user')->findOrFail($id);
        return view('cafeOwner.postingJob.show', compact('job'));
    }

    public function edit($id)
    {
        $job = PostingJob::findOrFail($id);
        return view('cafeOwner.postingJob.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'preferences' => 'required|array',
            'date' => 'required',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $job = PostingJob::findOrFail($id);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().auth()->id().'.'.$image->extension();
            $image->move(public_path('img'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $validatedData['preferences'] = implode(',', $validatedData['preferences']);

        $job->update($validatedData);

        return redirect()->route('cafeOwner.postingjob.index')->with('success', 'Posting job updated successfully!');
    }

    public function destroy($id)
    {
        $job = PostingJob::findOrFail($id);
        $job->delete();
        return redirect()->route('cafeOwner.postingjob.index')->with('success', 'Posting job deleted successfully!');
    }

    public function applicants($id)
    {
        $applicants = ApplyJob::where('job_id', $id)->with('user')->get();
        return view('cafeOwner.postingJob.applicants', compact('applicants'));
    }

    public function updateStatus(Request $request,$id){
        $validated = $request->validate([
            'status' => 'required|in:accepted,rejected,finished',
        ]);

        $application = ApplyJob::findOrFail($id);

        $application->update([
            'status' => $validated['status'],
        ]);

        if ($validated['status'] === 'finished') {
            Payment::create([
                'name' => $application->user->firstName . ' ' . $application->user->lastName,
                'job_id' => $application->job_id,
                'apply_id' => $application->id,
                'apply_date' => $application->created_at,
            ]);
        }

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
}