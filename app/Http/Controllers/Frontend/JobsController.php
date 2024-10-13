<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobsRequest;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('frontend.pages.job_listing', compact('jobs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('frontend.pages.job_details', compact('job'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('frontend.pages.job_create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobsRequest $request)
    {
        $request->validated();
        Job::create($request->all());

        toastr()->success('Job has been created successfully');
        return redirect()->route( 'home.jobs.index')->with('success', 'Job has been created successfully');
    }



    public function destroy(Job $job)
    {
        $job->delete();

        toastr()->success('Job has been deleted successfully');
        return redirect()->back()->with('success', 'Job has been deleted successfully');
    }

    public function apply(Request $request, Job $job)
    {
        // Check if the user has already applied
        $applicationExists = Application::where('user_id', auth()->id())->where('job_id', $job->id)->exists();

        if ($applicationExists) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Store the application
        Application::create(['user_id' => auth()->id(), 'job_id' => $job->id, 'status' => 'pending',]);

        // Send email or notification if needed

        return redirect()->back()->with('success', 'You have successfully applied for this job.');
    }
}
