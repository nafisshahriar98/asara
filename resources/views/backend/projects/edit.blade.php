<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Project | Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* For newly-picked (pre-submit) gallery thumbs */
    .gallery-item-new { position: relative; }
    .gallery-item-new .remove-new{
      position:absolute; top:4px; right:4px; background:rgba(0,0,0,.6);
      color:#fff; border:0; border-radius:6px; padding:2px 8px; cursor:pointer;
    }

    body{ background:#f7f9fb; }
    .card{ border:0; box-shadow:0 6px 20px rgba(0,0,0,.06); }
    .input-gap>*{ margin-right:.5rem }
    .input-gap>*:last-child{ margin-right:0 }
    .preview img{ max-height:140px; object-fit:cover; border-radius:8px }

    .gallery-grid{
      display:grid; grid-template-columns:repeat(auto-fill,minmax(130px,1fr));
      gap:.75rem;
    }
    .gallery-item{ position:relative; }
    .gallery-item button{
      position:absolute; top:4px; right:4px; background:rgba(0,0,0,.6);
      color:#fff; border:none; border-radius:5px; padding:2px 6px;
    }
    .btn-rounded{ border-radius:8px }
  </style>
</head>
<body>
<div class="container py-4 py-md-5">
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h2 class="mb-0">Edit Project</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Back to List</a>
  </div>

  {{-- Flash Messages --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Fix the following errors:</strong>
      <ul class="mb-0 mt-1">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-body p-4">
      <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
          <label class="form-label">Project Title <span class="text-danger">*</span></label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title', $project->title) }}" required>
          @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Banner Section --}}
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Banner Title</label>
            <input type="text" name="banner_title" class="form-control" value="{{ old('banner_title', $project->banner_title) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Banner Subtitle</label>
            <input type="text" name="banner_subtitle" class="form-control" value="{{ old('banner_subtitle', $project->banner_subtitle) }}">
          </div>
        </div>

        {{-- Banner Image --}}
        <div class="mb-3 mt-3">
          <label class="form-label">Banner Image</label>
          @if($project->banner_image)
            <div class="preview mb-2">
              <img src="{{ asset('storage/' . $project->banner_image) }}" class="img-fluid border">
            </div>
          @endif
          <input type="file" id="banner_image" name="banner_image" class="form-control" accept="image/*">
          <div id="banner_preview" class="preview mt-2"></div>
        </div>

        {{-- Description --}}
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" rows="5" class="form-control">{{ old('description', $project->description) }}</textarea>
        </div>

        {{-- Features --}}
        <div class="mb-4">
          <label class="form-label">Features</label>
          <div id="features-wrapper">
            @if($project->features->count())
              @foreach($project->features as $feature)
                <div class="d-flex input-gap mb-2 align-items-center feature-item">
                  <input type="text" name="features[]" class="form-control" value="{{ $feature->feature_text }}" placeholder="Feature">
                  <button type="button" class="btn btn-outline-danger btn-sm remove-feature"><i class="bi bi-x-lg"></i></button>
                </div>
              @endforeach
            @else
              <div class="d-flex input-gap mb-2 align-items-center feature-item">
                <input type="text" name="features[]" class="form-control" placeholder="Feature">
                <button type="button" class="btn btn-outline-success btn-sm add-feature"><i class="bi bi-plus-lg"></i></button>
              </div>
            @endif
          </div>
          <button type="button" class="btn btn-outline-success btn-sm add-feature mt-2">+ Add Feature</button>
        </div>

        {{-- Overview --}}
        <div class="mb-4">
          <label class="form-label">Overview Items</label>
          <div id="overview-wrapper">
            @if($project->overviews->count())
              @foreach($project->overviews as $ov)
                <div class="d-flex input-gap mb-2 align-items-center overview-item">
                  <input type="text" name="overview_titles[]" class="form-control" value="{{ $ov->title }}" placeholder="Title (e.g., Address)">
                  <input type="text" name="overview_details[]" class="form-control" value="{{ $ov->detail }}" placeholder="Detail (e.g., Plot 06)">
                  <button type="button" class="btn btn-outline-danger btn-sm remove-overview"><i class="bi bi-x-lg"></i></button>
                </div>
              @endforeach
            @else
              <div class="d-flex input-gap mb-2 align-items-center overview-item">
                <input type="text" name="overview_titles[]" class="form-control" placeholder="Title (e.g., Address)">
                <input type="text" name="overview_details[]" class="form-control" placeholder="Detail (e.g., Plot 06)">
                <button type="button" class="btn btn-outline-success btn-sm add-overview"><i class="bi bi-plus-lg"></i></button>
              </div>
            @endif
          </div>
          <button type="button" class="btn btn-outline-success btn-sm add-overview mt-2">+ Add Overview</button>
        </div>

        {{-- Overview Image --}}
        <div class="mb-4">
          <label class="form-label">Overview Image</label>
          @if($project->overview_image)
            <div class="preview mb-2">
              <img src="{{ asset('storage/' . $project->overview_image) }}" class="img-fluid border">
            </div>
          @endif
          <input type="file" id="overview_image" name="overview_image" class="form-control" accept="image/*">
          <div id="overview_preview" class="preview mt-2"></div>
        </div>

        {{-- Gallery --}}
        <div class="mb-4">
          <label class="form-label">Gallery Images</label>

          <div class="gallery-grid mb-3" id="gallery_list">
            @foreach($project->galleries as $gallery)
              <div class="gallery-item" id="g-{{ $gallery->id }}">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid border" alt="">
                <button type="button" class="btn btn-sm btn-danger"
                        data-delete-url="{{ route('admin.projects.gallery.destroy', $gallery->id) }}"
                        data-id="{{ $gallery->id }}">
                  &times;
                </button>
              </div>
            @endforeach
          </div>

          <input type="file" id="gallery_images" name="gallery_images[]" class="form-control" multiple accept="image/*">
          <div id="gallery_preview" class="gallery-grid mt-2"></div>
        </div>

        {{-- Status --}}
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="active" {{ $project->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $project->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        {{-- Project Stage --}}
        <div class="mb-4">
          <label class="form-label">Project Stage</label>
          <select name="project_stage" class="form-select" required>
            <option value="ongoing"  {{ $project->project_stage === 'ongoing'  ? 'selected' : '' }}>Ongoing</option>
            <option value="completed"{{ $project->project_stage === 'completed'? 'selected' : '' }}>Completed</option>
          </select>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Update Project</button>
          <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // ================= Helpers: single-file previews (banner & overview) =================
  const imageToPreview = (file, cb) => {
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => cb(e.target.result);
    reader.readAsDataURL(file);
  };

  const previewSingle = (inputId, wrapId) => {
    document.getElementById(inputId)?.addEventListener('change', function () {
      const wrap = document.getElementById(wrapId);
      wrap.innerHTML = '';
      const file = this.files?.[0];
      imageToPreview(file, (src) => {
        const img = document.createElement('img');
        img.src = src;
        img.className = 'img-fluid border';
        wrap.appendChild(img);
      });
    });
  };

  previewSingle('banner_image', 'banner_preview');
  previewSingle('overview_image', 'overview_preview');

  // ================= Dynamic rows: features & overview =================
  document.addEventListener('click', function (e) {
    // features
    if (e.target.closest('.add-feature')) {
      const wrap = document.getElementById('features-wrapper');
      const row = document.createElement('div');
      row.className = 'd-flex input-gap mb-2 align-items-center feature-item';
      row.innerHTML = `
        <input type="text" name="features[]" class="form-control" placeholder="Feature">
        <button type="button" class="btn btn-outline-danger btn-sm remove-feature"><i class="bi bi-x-lg"></i></button>`;
      wrap.appendChild(row);
    }
    if (e.target.closest('.remove-feature')) e.target.closest('.feature-item')?.remove();

    // overview
    if (e.target.closest('.add-overview')) {
      const wrap = document.getElementById('overview-wrapper');
      const row = document.createElement('div');
      row.className = 'd-flex input-gap mb-2 align-items-center overview-item';
      row.innerHTML = `
        <input type="text" name="overview_titles[]" class="form-control" placeholder="Title (e.g., Address)">
        <input type="text" name="overview_details[]" class="form-control" placeholder="Detail (e.g., Plot 06)">
        <button type="button" class="btn btn-outline-danger btn-sm remove-overview"><i class="bi bi-x-lg"></i></button>`;
      wrap.appendChild(row);
    }
    if (e.target.closest('.remove-overview')) e.target.closest('.overview-item')?.remove();
  });

  // ================= Gallery (EDIT): append picks + allow pre-submit remove =================
  const galleryInput   = document.getElementById('gallery_images');   // <input type=file name="gallery_images[]" multiple>
  const galleryPreview = document.getElementById('gallery_preview');  // container for new (unsaved) previews
  const formEl         = document.querySelector('form');
  let selectedFiles    = []; // Array<File> for newly-picked files

  const canMergeFiles = typeof DataTransfer !== 'undefined';

  function syncInputFiles() {
    if (!canMergeFiles) return; // fallback: last pick only (older browsers)
    const dt = new DataTransfer();
    selectedFiles.forEach(f => dt.items.add(f));
    galleryInput.files = dt.files;
  }

  function renderNewPreviews() {
    galleryPreview.innerHTML = '';
    selectedFiles.forEach((file, idx) => {
      const reader = new FileReader();
      reader.onload = e => {
        const wrap = document.createElement('div');
        wrap.className = 'gallery-item-new';
        wrap.innerHTML = `
          <img src="${e.target.result}" class="img-fluid border" alt="${file.name}">
          <button type="button" class="remove-new" data-index="${idx}" title="Remove">×</button>`;
        galleryPreview.appendChild(wrap);
      };
      reader.readAsDataURL(file);
    });
  }

  function addFiles(newFiles) {
    const limit = 20;
    for (const f of newFiles) {
      const key = f.name + '|' + f.size; // simple de-dup
      const exists = selectedFiles.some(x => (x.name + '|' + x.size) === key);
      if (!exists) selectedFiles.push(f);
      if (selectedFiles.length >= limit) break;
    }
    syncInputFiles();
    renderNewPreviews();
  }

  galleryInput?.addEventListener('change', function () {
    const picked = Array.from(this.files || []);
    if (!picked.length) return;
    addFiles(picked);
    if (canMergeFiles) this.value = ''; // allow re-picking the same files later
  });

  // Remove a newly-added (pre-submit) file
  galleryPreview.addEventListener('click', (e) => {
    const btn = e.target.closest('.remove-new');
    if (!btn) return;
    const idx = parseInt(btn.getAttribute('data-index'), 10);
    if (!isNaN(idx)) {
      selectedFiles.splice(idx, 1);
      syncInputFiles();
      renderNewPreviews();
    }
  });

  // Safety net: ensure files synced before submit
  formEl?.addEventListener('submit', () => {
    if (selectedFiles.length && canMergeFiles) {
      syncInputFiles();
    }
  });

  // ================= Existing image deletion (AJAX) =================
  const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const galleryList = document.getElementById('gallery_list'); // declare ONCE

  galleryList?.addEventListener('click', async (e) => {
    const btn = e.target.closest('button[data-delete-url]');
    if (!btn) return;

    e.preventDefault();

    const url = btn.getAttribute('data-delete-url');
    const id  = btn.getAttribute('data-id');
    if (!url || !id) return;

    if (!confirm('Delete this image only?')) return;

    try {
      const res = await fetch(url, {
        method: 'POST', // method override => DELETE
        headers: {
          'X-CSRF-TOKEN': CSRF,
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        },
        body: new URLSearchParams({ _method: 'DELETE' })
      });

      if (!res.ok) {
        const txt = await res.text();
        alert('Failed to delete (HTTP ' + res.status + ').\n' + txt);
        return;
      }

      // Remove DOM node if ok
      document.getElementById('g-' + id)?.remove();
    } catch (err) {
      console.error(err);
      alert('Network error while deleting. Please try again.');
    }
  });
</script>
</body>
</html>
