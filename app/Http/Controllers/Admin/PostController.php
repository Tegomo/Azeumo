<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest()->get()]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'excerpt_fr' => 'required|string',
            'excerpt_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title_fr']) . '-' . now()->timestamp;
        $data['tags'] = $data['tags'] ? array_map('trim', explode(',', $data['tags'])) : [];
        $data['published_at'] = $data['published'] ?? false ? now() : null;

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article créé.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'excerpt_fr' => 'required|string',
            'excerpt_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data['tags'] = $data['tags'] ? array_map('trim', explode(',', $data['tags'])) : [];
        if (($data['published'] ?? false) && !$post->published_at) {
            $data['published_at'] = now();
        }

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Article supprimé.');
    }
}
