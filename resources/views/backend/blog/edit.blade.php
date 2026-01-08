@extends('backend.layouts.app')
@section('title', 'Edit News / Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h3 class="rb-page-title mb-0">Edit News / Event</h3>
        <small class="text-muted">Update the existing post details.</small>
    </div>

    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Manage
    </a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Fix the errors below:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card rb-card">
    <div class="card-body p-4">
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
            </div>

            <div class="row g-3">
                {{-- Category --}}
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="blog_category_id" class="form-select">
                        <option value="">-- Select Category --</option>
                        @foreach(($categories ?? collect()) as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('blog_category_id', $blog->blog_category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Optional</small>
                </div>

                {{-- Publish Date --}}
                <div class="col-md-6">
                    <label class="form-label">Publish Date</label>
                    <input type="date" name="published_at" class="form-control"
                        value="{{ old('published_at', optional($blog->published_at)->format('Y-m-d')) }}">
                    <small class="text-muted">Optional</small>
                </div>
            </div>

            <div class="row g-3 mt-1">
                {{-- Status --}}
                <div class="col-md-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ old('status', (string)$blog->status) == '1' ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('status', (string)$blog->status) == '0' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                {{-- Thumbnail --}}
                <div class="col-md-6">
                    <label class="form-label">Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    <small class="text-muted">jpg/png/webp</small>
                </div>
            </div>

            {{-- Current Thumbnail --}}
            @if($blog->thumbnail)
                <div class="mt-3">
                    <label class="form-label d-block">Current Thumbnail</label>
                    <img src="{{ asset('storage/'.$blog->thumbnail) }}"
                        style="width:240px;height:140px;object-fit:cover;border-radius:14px;">
                </div>
            @endif

            {{-- Content --}}
            <div class="mt-3">
                <label class="form-label">Details</label>
                <textarea name="content" rows="7" class="form-control">{{ old('content', $blog->content) }}</textarea>
                <small class="text-muted">Full text shown in popup/detail page</small>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-primary">
                    <i class="bi bi-check2-circle me-1"></i> Update
                </button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-light">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
