<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

class ServicesController extends Controller
{
    public function index()
    {
        return Inertia::render('Services', [
            'services' => Service::orderBy('order')->get()->map(fn($s) => [
                'slug' => $s->slug,
                'icon' => $s->icon,
                'title' => $s->title(),
                'body' => $s->body(),
            ]),
        ]);
    }
}
