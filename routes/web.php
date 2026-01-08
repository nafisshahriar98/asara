<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

// Controllers
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\FrontProjectController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Models
use App\Models\Project;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| AUTH / SETTINGS (Fortify + Volt)
|--------------------------------------------------------------------------
*/
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

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Home page (dynamic: latest 3 published blogs)
Route::get('/', function () {
    $blogs = Blog::where('status', 1)
        ->orderByDesc('published_at')
        ->orderByDesc('id')
        ->take(3)
        ->get();

    return view('home', compact('blogs'));
})->name('home');

// Static pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::get('/news-events', [FrontBlogController::class, 'index'])
    ->name('news.index');

// Projects frontend
Route::get('/projects', [FrontProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [FrontProjectController::class, 'show'])->name('project.details');

// Blog popup + details page
// Route::get('/blog-json/{slug}', [FrontBlogController::class, 'json'])->name('blog.json');
Route::get('/blog/{slug}', [FrontBlogController::class, 'detailPage'])->name('blog.detail');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::delete('projects/gallery/{id}', [ProjectController::class, 'deleteGallery'])
        ->name('projects.gallery.destroy');

    Route::resource('projects', ProjectController::class);
    Route::resource('blog', BlogController::class)->except(['show']);
});

/*
|--------------------------------------------------------------------------
| TEST ROUTE (your existing testing page)
|--------------------------------------------------------------------------
*/
Route::get('/projects-test/{slug}', function ($slug) {
    $project = Project::with(['features', 'overviews', 'galleries'])
        ->where('slug', $slug)
        ->firstOrFail();

    return view('project-details-testing', compact('project'));
})->name('project.details.testing');

/*
|--------------------------------------------------------------------------
| LOGOUT ROUTE
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
