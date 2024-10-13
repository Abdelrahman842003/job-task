<?php

namespace App\Http\Controllers\Dashboard\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobsRequest;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function index()
    {
        $jobs = Job::all();
        return view('dashboard.jobs.index', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobsRequest $request)
    {
        $request->validated();
        Job::create($request->all());
        toastr()->success(message: 'Job Created Successful');
        return redirect(route('dashboard.jobs.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('dashboard.jobs.create', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        $user = $job->user_id;

        $users = User::get();
        return view('dashboard.jobs.update', compact('job', 'user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobsRequest $request, string $id)
    {
        $validated = $request->validated();
        $job = Job::findOrFail($id);
        $job->update($validated);
        toastr()->success(message: 'Post Updated Successful');
        return redirect(route('dashboard.jobs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        toastr()->error(message: 'Post Deleted Successful');
        return redirect(route('dashboard.jobs.index'));
    }


}
