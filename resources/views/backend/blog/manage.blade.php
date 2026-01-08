@extends('backend.layouts.app')
@section('title', 'Manage News & Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h3 class="rb-page-title mb-0">News & Events</h3>
        <small class="text-muted">Create, edit and manage all posts.</small>
    </div>

    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add New
    </a>
</div>

<div class="card rb-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                <tr class="text-center">
                    <th width="60">#</th>
                    <th width="150">Thumbnail</th>
                    <th class="text-start">Title</th>
                    <th width="170">Category</th>
                    <th width="150">Publish Date</th>
                    <th width="120">Status</th>
                    <th width="210">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <td class="text-center">
                            @if($blog->thumbnail)
                                <img
                                    src="{{ asset('storage/'.$blog->thumbnail) }}"
                                    alt="{{ $blog->title }}"
                                    style="width:120px;height:70px;object-fit:cover;border-radius:12px;"
                                >
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td class="text-start">
                            <div class="fw-semibold">{{ $blog->title }}</div>
                            <small class="text-muted">Slug: {{ $blog->slug }}</small>
                        </td>

                        <td class="text-center">{{ $blog->category?->name ?? '-' }}</td>

                        <td class="text-center">{{ $blog->published_at?->format('M d, Y') ?? '-' }}</td>

                        <td class="text-center">
                            <span class="badge {{ $blog->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $blog->status ? 'Published' : 'Draft' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this post?')">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No posts found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
