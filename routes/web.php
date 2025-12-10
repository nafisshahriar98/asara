<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\FrontProjectController;
use App\Models\Project;


// Route::get('/hellow', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// -----------------------------
// FRONTEND ROUTES
// -----------------------------
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Dynamic single project details
Route::get('/projects/{slug}', [FrontProjectController::class, 'show'])
    ->name('project.details');



Route::get('/projects', [FrontProjectController::class, 'index'])->name('projects');




// -----------------------------
// ADMIN ROUTES
// -----------------------------
Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {

    // ⚠️ Must come FIRST so Laravel matches it before DELETE /projects/{project}
    Route::delete('projects/gallery/{id}', [ProjectController::class, 'deleteGallery'])
        ->name('projects.gallery.destroy');

    // RESTful CRUD routes for projects
    Route::resource('projects', ProjectController::class);
});






// Test page: http://127.0.0.1:8000/projects-test/{slug}
Route::get('/projects-test/{slug}', function ($slug) {
    $project = Project::with(['features','overviews','galleries'])
        ->where('slug', $slug)
        ->firstOrFail();

    // ⬇️ Use the correct view name based on where you saved the file:
    // If saved at resources/views/project-details-testing.blade.php:
    return view('project-details-testing', compact('project'));

    // If you saved it under resources/views/front/project-details-testing.blade.php,
    // use this instead:
    // return view('front.project-details-testing', compact('project'));
})->name('project.details.testing');




// routes/web.php
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
