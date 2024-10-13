<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{

    public function approve(Application $application)
    {
        $application->status = 'approved';
        $application->save();

        // Send approval email to the user
        Mail::to($application->user->email)->send(new ApplicationStatusMail($application));

        return back()->with('status', 'Application approved!');
    }

    public function decline(Application $application)
    {
        $application->status = 'declined';
        $application->save();

        // Send rejection email to the user
        Mail::to($application->user->email)->send(new ApplicationStatusMail($application));

        return back()->with('status', 'Application declined!');
    }

}
