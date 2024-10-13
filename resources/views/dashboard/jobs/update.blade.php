@extends('dashboard.layout.main')
@section('title', 'Jobs')
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg w-80">
    <h1 class="my-4">Update Job</h1>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Update Job Form</h6>
            </div>
            <div class="card-body px-4 pt-4 pb-2">
                <form action="{{ route('dashboard.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Input -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter the job title" required value="{{ old('title', $job->title) }}">
                    </div>

                    <!-- Content Input -->
                    <div class="form-group mb-3">
                        <label for="content" class="form-label">Job Content</label>
                        <textarea id="content" name="content" class="form-control" rows="6" placeholder="Enter the job content" required>{{ old('content', $job->content) }}</textarea>
                    </div>

                    <!-- Location Input -->
                    <div class="form-group mb-3">
                        <label for="location" class="form-label">Job Location</label>
                        <input type="text" id="location" name="location" class="form-control" placeholder="Enter the job location" required value="{{ old('location', $job->location) }}">
                    </div>

                    <!-- Type Input -->
                    <div class="form-group mb-3">
                        <label for="type" class="form-label">Job Type</label>
                        <select id="type" name="type" class="form-select">
                            <option value="full-time" {{ old('type', $job->type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="part-time" {{ old('type', $job->type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="remote" {{ old('type', $job->type) == 'remote' ? 'selected' : '' }}>Remote</option>
                        </select>
                    </div>

                    <!-- Status Input -->
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Job Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="open" {{ old('status', $job->status) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <!-- User Dropdown -->
                    <div class="form-group mb-3">
                        <label for="user_id" class="form-label">Author</label>
                        <select id="user_id" name="user_id" class="form-select">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $job->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Experience Requirements Input -->
                    <div class="form-group mb-3">
                        <label for="experience_requirements" class="form-label">Experience Requirements</label>
                        <textarea id="experience_requirements" name="experience_requirements" class="form-control" rows="6" placeholder="Enter the experience requirements" required>{{ old('experience_requirements', $job->experience_requirements) }}</textarea>
                    </div>

                    <!-- Vacancy Input -->
                    <div class="form-group mb-3">
                        <label for="vacancy" class="form-label">Vacancy</label>
                        <input type="number" id="vacancy" name="vacancy" class="form-control" placeholder="Enter the vacancy" required value="{{ old('vacancy', $job->vacancy) }}">
                    </div>

                    <!-- Salary Input -->
                    <div class="form-group mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" id="salary" name="salary" class="form-control" placeholder="Enter the salary" required value="{{ old('salary', $job->salary) }}">
                    </div>

                    <!-- Deadline Input -->
                    <div class="form-group mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="datetime-local" id="deadline" name="deadline" class="form-control" placeholder="Enter the deadline" required value="{{ old('deadline', $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('Y-m-d\TH:i') : '' ) }}">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                        <a href="{{ route('dashboard.jobs.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection
