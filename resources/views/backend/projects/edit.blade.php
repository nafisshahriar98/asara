@extends('backend.layouts.app')
@section('title', 'Edit Project')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="rb-page-title mb-0">Edit Project</h3>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left me-1"></i> Back
  </a>
</div>

<div class="card rb-card">
  <div class="card-body p-4">
    {{-- ✅ paste your existing <form> here exactly --}}
  </div>
</div>
@endsection

@push('scripts')
{{-- ✅ paste your existing scripts (gallery delete / preview / etc.) here --}}
@endpush
