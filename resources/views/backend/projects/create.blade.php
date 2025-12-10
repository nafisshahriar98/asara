<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Project | Admin</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .thumb { position: relative; display: inline-block; }
.thumb img { max-height: 120px; border-radius: 8px; object-fit: cover; width: 100%; }
.thumb .remove {
  position: absolute; top: 6px; right: 6px;
  background: rgba(0,0,0,.65); color: #fff; border: 0;
  width: 26px; height: 26px; border-radius: 50%;
  line-height: 26px; text-align: center; cursor: pointer;
}
        body { background: #f7f9fb; }
        .card { border: 0; box-shadow: 0 6px 20px rgba(0, 0, 0, .06); }
        .form-label .req { color: #dc3545; }
        .preview-wrap img { max-height: 120px; object-fit: cover; border-radius: 8px; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: .75rem; }
        .btn-rounded { border-radius: 8px }
        .input-row-gap>* { margin-right: .5rem }
        .input-row-gap>*:last-child { margin-right: 0 }
    </style>
</head>

<body>
<div class="container py-4 py-md-5">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="mb-0">Add New Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-rounded">Back to List</a>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Project Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title <span class="req">*</span></label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" placeholder="Enter project name" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Banner Section --}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Banner Title</label>
                        <input type="text" name="banner_title" class="form-control" value="{{ old('banner_title') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Banner Subtitle</label>
                        <input type="text" name="banner_subtitle" class="form-control" value="{{ old('banner_subtitle') }}">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="banner_image" class="form-label">Banner Image</label>
                    <input type="file" id="banner_image" name="banner_image" class="form-control" accept="image/*">
                    <div class="preview-wrap mt-2" id="banner_preview"></div>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                </div>

                {{-- Features --}}
                <div class="mb-3">
                    <label class="form-label">Features</label>
                    <div id="features-wrapper">
                        <div class="d-flex input-row-gap mb-2 feature-item">
                            <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                            <button type="button" class="btn btn-outline-success add-feature">+</button>
                        </div>
                    </div>
                </div>

                {{-- Overview --}}
                <div class="mb-3">
                    <label class="form-label">Overview Items</label>
                    <div id="overview-wrapper">
                        <div class="d-flex input-row-gap mb-2 overview-item">
                            <input type="text" name="overview_titles[]" class="form-control" placeholder="Title (e.g., Address)">
                            <input type="text" name="overview_details[]" class="form-control" placeholder="Detail (e.g., Plot 06, Road 96)">
                            <button type="button" class="btn btn-outline-success add-overview">+</button>
                        </div>
                    </div>
                </div>

                {{-- Overview Image --}}
                <div class="mb-3">
                    <label for="overview_image" class="form-label">Overview Image</label>
                    <input type="file" id="overview_image" name="overview_image" class="form-control" accept="image/*">
                    <div class="preview-wrap mt-2" id="overview_preview"></div>
                </div>

                {{-- Gallery Images --}}
                <div class="mb-3">
                    <label class="form-label">Gallery Images (multiple)</label>
                    <input type="file" id="gallery_images" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                    <div class="gallery-grid mt-2" id="gallery_preview"></div>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                {{-- Project Stage --}}
                <div class="mb-4">
                    <label class="form-label">Project Stage</label>
                    <select name="project_stage" class="form-select" required>
                        <option value="ongoing" {{ old('project_stage', 'ongoing') === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ old('project_stage') === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-rounded">Save Project</button>
                    <button type="reset" class="btn btn-outline-secondary btn-rounded">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- <script>
    const imageToPreview = (file, cb) => {
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => cb(e.target.result);
        reader.readAsDataURL(file);
    };

    const previewSingle = (inputId, previewId) => {
        document.getElementById(inputId)?.addEventListener('change', function () {
            const wrap = document.getElementById(previewId);
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

    document.getElementById('gallery_images')?.addEventListener('change', function () {
        const grid = document.getElementById('gallery_preview');
        grid.innerHTML = '';
        Array.from(this.files || []).slice(0, 20).forEach(file => {
            imageToPreview(file, (src) => {
                const img = document.createElement('img');
                img.src = src; img.className = 'img-fluid border';
                grid.appendChild(img);
            });
        });
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('add-feature')) {
            const wrap = document.getElementById('features-wrapper');
            const row = document.createElement('div');
            row.className = 'd-flex input-row-gap mb-2 feature-item';
            row.innerHTML = `<input type="text" name="features[]" class="form-control" placeholder="Enter feature">
                             <button type="button" class="btn btn-outline-danger remove-feature">&minus;</button>`;
            wrap.appendChild(row);
        }
        if (e.target.classList.contains('remove-feature')) e.target.closest('.feature-item')?.remove();

        if (e.target.classList.contains('add-overview')) {
            const wrap = document.getElementById('overview-wrapper');
            const row = document.createElement('div');
            row.className = 'd-flex input-row-gap mb-2 overview-item';
            row.innerHTML = `<input type="text" name="overview_titles[]" class="form-control" placeholder="Title">
                             <input type="text" name="overview_details[]" class="form-control" placeholder="Detail">
                             <button type="button" class="btn btn-outline-danger remove-overview">&minus;</button>`;
            wrap.appendChild(row);
        }
        if (e.target.classList.contains('remove-overview')) e.target.closest('.overview-item')?.remove();
    });

    document.querySelector('form').addEventListener('reset', () => {
        setTimeout(() => window.location.reload(), 100);
    });
</script> -->

<script>
  // ---------- Helpers (keep single-image previews working) ----------
  const imageToPreview = (file, cb) => {
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => cb(e.target.result);
    reader.readAsDataURL(file);
  };

  const previewSingle = (inputId, previewId) => {
    document.getElementById(inputId)?.addEventListener('change', function () {
      const wrap = document.getElementById(previewId);
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

  // Activate single-file previews (banner & overview)
  previewSingle('banner_image', 'banner_preview');
  previewSingle('overview_image', 'overview_preview');

 // ---------- MULTI gallery logic (append + remove + final sync on submit) ----------
  const galleryInput  = document.getElementById('gallery_images');
  const galleryGrid   = document.getElementById('gallery_preview');
  const formEl        = document.querySelector('form'); // this page's form
  let selectedFiles   = []; // Array<File>

  // Detect DataTransfer support
  const canMergeFiles = typeof DataTransfer !== 'undefined';

  // Rebuild input.files from our selectedFiles (so PHP receives ALL picks)
  function syncInputFiles() {
    if (!canMergeFiles) return; // fallback: browser without DataTransfer (last pick only)
    const dt = new DataTransfer();
    selectedFiles.forEach(f => dt.items.add(f));
    galleryInput.files = dt.files;
  }

  // Render thumbnails with a remove (×) button
  function renderGallery() {
    galleryGrid.innerHTML = '';
    selectedFiles.forEach((file, idx) => {
      const reader = new FileReader();
      reader.onload = e => {
        const wrap = document.createElement('div');
        wrap.className = 'thumb';
        wrap.innerHTML = `
          <img src="${e.target.result}" class="img-fluid border" alt="${file.name}">
          <button type="button" class="remove" data-index="${idx}" title="Remove">×</button>
        `;
        galleryGrid.appendChild(wrap);
      };
      reader.readAsDataURL(file);
    });
  }

  // Append new files, dedupe by name+size, cap to 20
  function addFiles(newFiles) {
    const limit = 20;
    for (const f of newFiles) {
      const key = f.name + '|' + f.size;
      const exists = selectedFiles.some(x => (x.name + '|' + x.size) === key);
      if (!exists) selectedFiles.push(f);
      if (selectedFiles.length >= limit) break;
    }
    syncInputFiles();
    renderGallery();
  }

  // When user selects again later, append instead of replacing
  galleryInput?.addEventListener('change', function () {
    const picked = Array.from(this.files || []);
    if (!picked.length) return;
    addFiles(picked);

    // Only clear the native selection if we can rebuild it; keeps 'change' firing for same file
    if (canMergeFiles) this.value = '';
  });

  // Remove a single file (pre-submit)
  galleryGrid.addEventListener('click', function (e) {
    const btn = e.target.closest('.remove');
    if (!btn) return;
    const idx = parseInt(btn.getAttribute('data-index'), 10);
    if (!isNaN(idx)) {
      selectedFiles.splice(idx, 1);
      syncInputFiles();
      renderGallery();
    }
  });

  // FINAL SAFETY: sync files right before submit (nothing is removed here)
  formEl?.addEventListener('submit', () => {
    if (selectedFiles.length && canMergeFiles) {
      syncInputFiles();
    }
    // Debug: see what will be sent to PHP
    console.log('SUBMIT -> gallery_images.files.length =', galleryInput?.files?.length || 0);
    if (galleryInput?.files?.length) {
      console.log('SUBMIT -> names =', Array.from(galleryInput.files).map(f => f.name));
    }
  });

  // Keep your reset behavior
  formEl?.addEventListener('reset', () => {
    setTimeout(() => {
      selectedFiles = [];
      syncInputFiles();
      renderGallery();
      window.location.reload();
    }, 0);
  });
</script>
<script>
  const featuresWrap = document.getElementById('features-wrapper');
  const overviewWrap = document.getElementById('overview-wrapper');

  document.addEventListener('click', (e) => {
    // + Feature
    if (e.target.closest('.add-feature')) {
      e.preventDefault();
      const row = document.createElement('div');
      row.className = 'd-flex input-row-gap mb-2 feature-item';
      row.innerHTML = `
        <input type="text" name="features[]" class="form-control" placeholder="Enter feature">
        <button type="button" class="btn btn-outline-danger remove-feature">&minus;</button>`;
      featuresWrap.appendChild(row);
      return;
    }
    // - Feature
    if (e.target.closest('.remove-feature')) {
      e.target.closest('.feature-item')?.remove();
      return;
    }
    // + Overview
    if (e.target.closest('.add-overview')) {
      e.preventDefault();
      const row = document.createElement('div');
      row.className = 'd-flex input-row-gap mb-2 overview-item';
      row.innerHTML = `
        <input type="text" name="overview_titles[]" class="form-control" placeholder="Title (e.g., Address)">
        <input type="text" name="overview_details[]" class="form-control" placeholder="Detail (e.g., Plot 06, Road 96)">
        <button type="button" class="btn btn-outline-danger remove-overview">&minus;</button>`;
      overviewWrap.appendChild(row);
      return;
    }
    // - Overview
    if (e.target.closest('.remove-overview')) {
      e.target.closest('.overview-item')?.remove();
    }
  });
</script>

</body>
</html>
