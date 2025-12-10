<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Admin Panel</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .table th {
            background-color: #004A87;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 6px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-header h2 {
            font-weight: 600;
            color: #222;
        }

        .card {
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container py-5">

        {{-- Page Header --}}
        <div class="page-header">
            <h2>All Projects</h2>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Project
                </a>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>


        {{-- Project Table --}}
        <div class="card">
            <div class="card-body">
                @if($projects->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead>
                                <tr>
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
                                            @if($project->status === 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                class="btn btn-sm btn-outline-warning me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Are you sure you want to delete this project?')"
                                                    class="btn btn-sm btn-outline-danger">
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
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>