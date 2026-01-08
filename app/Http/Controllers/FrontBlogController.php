<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class FrontBlogController extends Controller
{
    // News & Events listing page
    public function index()
    {
        $blogs = Blog::with('category')
            ->where('status', 1)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9);

        return view('news-events', compact('blogs'));
    }

    // Blog details page
    public function detailPage($slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $latest = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get(['id','title','slug','thumbnail','published_at']);

        return view('blog-detail', compact('blog', 'latest'));
    }

    // OPTIONAL: only keep this if you still use modal somewhere
    public function json($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return response()->json([
            'title'   => $blog->title,
            'date'    => $blog->published_at?->format('F d, Y'),
            'image'   => $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : null,
            'details' => $blog->content,
        ]);
    }
}
