@php use Carbon\Carbon; @endphp
@extends('.frontend.layouts.main')
@section('title','Job Listing')
@section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                 data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20px" height="12px">
                                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                  d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <label class="container">Full Time
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Part Time
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Remote
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Freelance
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>

                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>Count of {{ $jobs->count() }} Jobs</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('home.jobs.create') }}" class="btn btn-primary">Add Job</a>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                @foreach($jobs as $job)
                                    <div class="single-job-items mb-30">
                                        <hr>
                                        <div class="job-items">

                                            <div class="job-tittle job-tittle2">
                                                <a>
                                                    <h4 class="p-1">{{ $job->title }}</h4>
                                                </a>
                                                <ul>
                                                    <li class="p-1">{{ Str::limit($job->content, 50) }}</li>
                                                    <li class="p-1"><i
                                                            class="fas fa-map-marker-alt"></i>{{ $job->location }}</li>
                                                    <li class="p-1">{{ $job->type }}</li>
                                                    <li class="p-1">{{ $job->status }}</li>
                                                    <li class="p-1">Experience: {{ $job->experience_requirements }}</li>
                                                    <li class="p-1">Vacancy: {{ $job->vacancy }}</li>
                                                    <li class="p-1">Salary: {{ $job->salary }}</li>
                                                    <li class="p-1">
                                                        Deadline: {{ Carbon::parse($job->deadline)->format('d-m-Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                        @if( $job->status == 'open')
                                            <a class="p-3 mt-5" href="{{ route('job.apply', $job->id) }}">Apply Now</a>
                                        @else
                                            <a class="p-3 mt-5">Closed</a>
                                        @endif
                                        @if($job->user_id == Auth::id())
                                            <form action="{{ route('home.jobs.delete', $job->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="p-3 btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        @endif


                                        <span
                                            class="p-1"> Publication date {{ $job->created_at->diffForHumans() }}</span>
                                    </div>
                            </div>
                        @endforeach

                    </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
        </div>
        <!-- Job List Area End -->


    </main>
@endsection
