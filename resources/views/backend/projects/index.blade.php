@extends('backend.layouts.app')
@section('title', 'Projects')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="rb-page-title mb-0">All Projects</h3>

  <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i> Add Project
  </a>
</div>

<div class="card rb-card">
  <div class="card-body">

    @if($projects->count() > 0)
      <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
          <thead>
            <tr class="text-center">
              <th width="5%">#</th>
              <th>Title</th>
              <th width="15%">Status</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($projects as $project)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $project->title }}</td>
                <td class="text-center">
                  <span class="badge {{ $project->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $project->status === 'active' ? 'Active' : 'Inactive' }}
                  </span>
                </td>
                <td class="text-center">
                  <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>

                  <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash3"></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="text-center text-muted my-3">No projects found.</p>
    @endif

  </div>
</div>
@endsection
