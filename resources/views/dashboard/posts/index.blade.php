@extends('dashboard.layout.main')
@section('title', 'Posts')
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg w-80">
        <h1 class="my-4 ">Posts</h1>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Posts Table</h6>
                    <a href="{{ route('dashboard.posts.create') }}">
                        <button type="button" class="btn btn-primary btn-sm">Add Post</button>
                    </a>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @if (count($posts) == 0)
                            <p class="text-center"> There is no post yet</p>
                        @else
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Title</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Content</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $post->user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $post->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->title }}</p>
                                            </td>
                                            <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <p class="text-xs font-weight-bold mb-0 text-truncate">{{ Str::limit($post->content, 100) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($post->status == 'active')
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $post->status }}</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-info">{{ $post->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                                    class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                    data-original-title="Edit Post">Edit
                                                </a>
                                                <form method="POST"
                                                    action="{{ route('dashboard.posts.destroy', $post->id) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this post?');">
                                                        Delete
                                                    </button>
                                                </form>
                                                <a href="{{ route('dashboard.posts.comments.index', $post) }}"
                                                    class="btn btn-info btn-sm" data-toggle="tooltip"
                                                    data-original-title="Post Comments">Comments
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
