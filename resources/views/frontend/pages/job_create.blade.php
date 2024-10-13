@extends('frontend.layouts.main')

@section('title', 'Job Listing')

@section('content')
    <section class="job-create m-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="my-4 text-center">Add New Job</h1>

                    <form action="{{ route('home.jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Job Title</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the job title" required>
                            @error('title')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Job Content</label>
                            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="6" placeholder="Enter the job content" required></textarea>
                            @error('content')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="location" class="form-label">Job Location</label>
                            <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Enter the job location" required>
                            @error('location')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="type" class="form-label">Job Type</label>
                            <select id="type" name="type" class="form-select @error('type') is-invalid @enderror">
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="remote">Remote</option>
                            </select>
                            @error('type')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Job Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                            @error('status')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_id" class="form-label">Author</label>
                            <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="experience_requirements" class="form-label">Experience Requirements</label>
                            <textarea id="experience_requirements" name="experience_requirements" class="form-control @error('experience_requirements') is-invalid @enderror" rows="3" placeholder="Enter the experience requirements"></textarea>
                            @error('experience_requirements')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="vacancy" class="form-label">Vacancy</label>
                            <input type="number" id="vacancy" name="vacancy" class="form-control @error('vacancy') is-invalid @enderror" placeholder="Enter the vacancy" required>
                            @error('vacancy')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" id="salary" name="salary" class="form-control @error('salary') is-invalid @enderror" placeholder="Enter the salary" required>
                            @error('salary')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="datetime-local" id="deadline" name="deadline" class="form-control @error('deadline') is-invalid @enderror" placeholder="Enter the deadline" required>
                            @error('deadline')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">Add Job</button>
                            <a href="{{ route('home.jobs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
