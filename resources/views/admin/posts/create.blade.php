@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Nouvel article</h1>
<form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-6 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
  @csrf
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (FR) *</label>
      <input name="title_fr" value="{{ old('title_fr') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
      @error('title_fr')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (EN) *</label>
      <input name="title_en" value="{{ old('title_en') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (FR) *</label>
      <textarea name="excerpt_fr" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_fr') }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (EN) *</label>
      <textarea name="excerpt_en" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_en') }}</textarea>
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (FR) *</label>
      <textarea name="body_fr" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_fr') }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (EN) *</label>
      <textarea name="body_en" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_en') }}</textarea>
    </div>
  </div>
  <div class="flex items-center gap-6">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Tags (séparés par virgule)</label>
      <input name="tags" value="{{ old('tags') }}" class="border border-gray-300 rounded px-3 py-2 text-sm" placeholder="IE, Cameroun, OSINT" />
    </div>
    <div class="flex items-center gap-2 mt-5">
      <input type="checkbox" name="published" value="1" id="published" {{ old('published') ? 'checked' : '' }} />
      <label for="published" class="text-sm font-semibold text-gray-700">Publier immédiatement</label>
    </div>
  </div>
  <div class="flex gap-3">
    <button type="submit" class="bg-gold text-navy px-6 py-2 rounded font-semibold text-sm">Enregistrer</button>
    <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-navy px-4 py-2 text-sm">Annuler</a>
  </div>
</form>
@endsection
