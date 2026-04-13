<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog/Index', [
            'posts' => Post::published()->get()->map(fn($p) => [
                'slug' => $p->slug,
                'title' => $p->title(),
                'excerpt' => $p->excerpt(),
                'tags' => $p->tags,
                'published_at' => $p->published_at?->format('d/m/Y'),
            ]),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->published, 404);
        return Inertia::render('Blog/Show', [
            'post' => [
                'slug' => $post->slug,
                'title' => $post->title(),
                'body' => $post->body(),
                'tags' => $post->tags,
                'published_at' => $post->published_at?->format('d/m/Y'),
            ],
        ]);
    }
}
