<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceAdminController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['services' => Service::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'summary_fr' => 'required|string',
            'summary_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['title_fr']);
        $data['icon'] = $data['icon'] ?? '🏢';
        $data['order'] = $data['order'] ?? 0;

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service créé.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'summary_fr' => 'required|string',
            'summary_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
        ]);

        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service supprimé.');
    }
}
