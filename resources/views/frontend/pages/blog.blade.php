@extends('.frontend.layouts.main')
@section('title','Contact')
@section('content')
    <section class="blog_area py-5">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar (Blog Posts) -->
                <div class="col-lg-8 mx-auto">
                    <!-- Create Post Button -->
                    <button type="button" class="btn btn-primary mb-3" id="toggleCreatePostForm">
                        Create Post
                    </button>

                    <!-- Create Post Form (Initially Hidden with Transition) -->
                    <div id="createPostForm" class="mb-3 custom-collapse">
                        <form action="{{ route('home.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h4 class="card-title">Create Post</h4>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" id="content" name="content" rows="3"
                                                  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Blog Posts -->
                    <div class="blog_left_sidebar sticky-top">
                        <!-- Search Widget -->
                        <form action="{{ route('home.posts.index') }}" method="GET" class="mb-3">
                            <div class="input-group rounded bg-white p-2">
                                <input type="search" class="form-control border-2" placeholder="Search Keyword"
                                       name="query" autofocus style="border-radius: 1.5rem 0 0 1.5rem !important;">
                                <div class="input-group-append">
                                    <button class="btn btn-link text-primary px-3 h-25" type="submit"
                                            style="border-radius:0 4.5rem 1.5rem 0; top: -5px; left: 5px">
                                        <i class="ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if (count($posts) == 0)
                            <p class="text-center mt-3">There are no posts yet.</p>
                        @else
                            @foreach ($posts as $post)
                                <!-- Blog Post -->
                                <article class="card mb-4 shadow-sm">
                                    @if(file_exists($post->image))
                                        <img class="card-img-top" src="{{ asset('storage/posts/' . $post->image) }}"
                                             alt="Post Image">

                                    @endif

                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none">
                                            <h3 class="card-title">{{ $post->title }}</h3>
                                        </a>
                                        <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                        <div class="d-flex justify-content-between text-muted small">
                                            <a href="" class="fa fa-comments text-dark"> {{ count($post->comments) }}
                                                Comments</a>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-center">
                                        <button
                                            class="btn btn-outline-primary mr-2">{{ $post->created_at->format('d M') }}</button>
                                        @if($post->user_id == Auth::user()->id)
                                            <form action="{{ route('home.posts.destroy', $post->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        @endif

                                    </div>
                                </article>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript to Toggle Form with Transition -->

@endsection
@section('js')
    <script>
        document.getElementById('toggleCreatePostForm').addEventListener('click', function () {
            var form = document.getElementById('createPostForm');
            if (form.style.maxHeight) {
                form.style.maxHeight = null;
            } else {
                form.style.maxHeight = form.scrollHeight + "px";
            }
        });
    </script>
@endsection
@section('css')
    .custom-collapse {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.6s ease;
    }

    .card {
    border-radius: 15px;
    border: none;
    }

    .card-title {
    font-weight: bold;
    }

    .form-control, .form-control-file {
    border-radius: 8px;
    }

    .btn {
    border-radius: 20px;
    }

    .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    }

    .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    }

    .btn:hover {
    opacity: 0.9;
    }

@endsection
