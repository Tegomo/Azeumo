@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Modifier le service</h1>
<form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-6 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
  @csrf @method('PUT')
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (FR) *</label>
      <input name="title_fr" value="{{ old('title_fr', $service->title_fr) }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (EN) *</label>
      <input name="title_en" value="{{ old('title_en', $service->title_en) }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Résumé (FR) *</label>
      <textarea name="summary_fr" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('summary_fr', $service->summary_fr) }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Résumé (EN) *</label>
      <textarea name="summary_en" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('summary_en', $service->summary_en) }}</textarea>
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (FR) *</label>
      <textarea name="body_fr" rows="8" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_fr', $service->body_fr) }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (EN) *</label>
      <textarea name="body_en" rows="8" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_en', $service->body_en) }}</textarea>
    </div>
  </div>
  <div class="flex gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Icône (emoji)</label>
      <input name="icon" value="{{ old('icon', $service->icon) }}" class="border border-gray-300 rounded px-3 py-2 text-sm w-20" />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Ordre</label>
      <input name="order" type="number" value="{{ old('order', $service->order) }}" class="border border-gray-300 rounded px-3 py-2 text-sm w-20" />
    </div>
  </div>
  <div class="flex gap-3">
    <button type="submit" class="bg-gold text-navy px-6 py-2 rounded font-semibold text-sm">Mettre à jour</button>
    <a href="{{ route('admin.services.index') }}" class="text-gray-500 hover:text-navy px-4 py-2 text-sm">Annuler</a>
  </div>
</form>
@endsection
