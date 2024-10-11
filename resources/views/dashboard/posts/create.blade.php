@extends('dashboard.layout.main')
@section('title', 'Posts')
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg w-80">
    <h1 class="my-4">Add New Post</h1>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>New Post Form</h6>
            </div>
            <div class="card-body px-4 pt-4 pb-2">
                <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Title Input -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter the post title" required>
                    </div>

                    <!-- Content Input -->
                    <div class="form-group mb-3">
                        <label for="content" class="form-label">Post Content</label>
                        <textarea id="content" name="content" class="form-control" rows="6" placeholder="Enter the post content" required></textarea>
                    </div>

                    <!-- Image Upload Input -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <!-- Status Input -->
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>

                    <!-- User Dropdown -->
                    <div class="form-group mb-3">
                        <label for="user_id" class="form-label">Author</label>
                        <select id="user_id" name="user_id" class="form-select">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Add Post</button>
                        <a href="{{ route('dashboard.posts.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection
