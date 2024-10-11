@extends('dashboard.layout.main')
@section('title', 'Comments')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg w-80">
        <!-- Header Section -->
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="m-0 font-weight-bold text-primary">All Comments</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="collapse"
                    data-bs-target="#addCommentCollapse" aria-expanded="false" aria-controls="addCommentCollapse">
                    <i class="fas fa-plus"></i> Add Comment
                </button>
            </div>

            <div class="collapse mt-2" id="addCommentCollapse">
                <div class="card card-body">
                    <form action="{{ route('dashboard.posts.comments.store', $post->user()->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="content" class="form-label">Comment</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                @if (count($comments) == 0)
                    <div class="text-center py-5">
                        <i class="fas fa-comments fa-3x text-gray-300 mb-3"></i>
                        <p class="text-gray-500 mb-0">No comments yet</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-uppercase small font-weight-bold">User</th>
                                    <th class="text-uppercase small font-weight-bold">Comment</th>
                                    <th class="text-uppercase small font-weight-bold" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 bg-primary rounded-circle text-white d-flex align-items-center justify-content-center">
                                                    {{ substr($comment->user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                                    <small class="text-muted">{{ $comment->user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $comment->content }}</p>
                                            <small class="text-muted">{{ $comment->created_at }}</small>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCommentModal{{ $comment->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{ route('dashboard.posts.comments.destroy', [$comment->post_id, $comment->id]) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this comment?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Comment Modal -->
                                    <div class="modal fade" id="editCommentModal{{ $comment->id }}" tabindex="-1"
                                        aria-labelledby="editCommentModalLabel{{ $comment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="editCommentModalLabel{{ $comment->id }}">Edit
                                                        Comment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('dashboard.posts.comments.update', [$comment->post_id, $comment->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="content" class="form-label">Comment</label>
                                                            <textarea class="form-control" id="content" name="content" rows="3">{{ $comment->content }}</textarea>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection

@push('style')
    <style>
        .avatar-sm {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .table> :not(caption)>*>* {
            padding: 1rem;
        }

        .btn-group .btn {
            padding: 0.25rem 0.5rem;
        }

        .card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card-header {
            border-bottom: 1px solid #e3e6f0;
        }

        .btn-group .btn {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

