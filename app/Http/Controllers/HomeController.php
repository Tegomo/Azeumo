<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'services' => Service::orderBy('order')->get()->map(fn($s) => [
                'slug' => $s->slug,
                'icon' => $s->icon,
                'title' => $s->title(),
                'summary' => $s->summary(),
            ]),
        ]);
    }
}
