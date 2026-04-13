@extends('admin.layout')
@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="font-display font-bold text-2xl text-navy">Services</h1>
  <a href="{{ route('admin.services.create') }}" class="bg-gold text-navy px-4 py-2 rounded font-semibold text-sm">+ Nouveau service</a>
</div>
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 border-b border-gray-200">
      <tr>
        <th class="text-left p-3">Icône</th>
        <th class="text-left p-3">Titre (FR)</th>
        <th class="text-left p-3">Ordre</th>
        <th class="p-3"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($services as $service)
      <tr>
        <td class="p-3 text-2xl">{{ $service->icon }}</td>
        <td class="p-3 font-medium">{{ $service->title_fr }}</td>
        <td class="p-3 text-gray-500">{{ $service->order }}</td>
        <td class="p-3 flex gap-2 justify-end">
          <a href="{{ route('admin.services.edit', $service) }}" class="text-gold hover:underline text-xs">Modifier</a>
          <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Supprimer ?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline text-xs">Supprimer</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" class="p-4 text-center text-gray-400">Aucun service.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
