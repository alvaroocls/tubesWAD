<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostingJobController extends Controller
{
    public function index()
    {
        return view('cafeOwner.postingJob.index');
    }
}
