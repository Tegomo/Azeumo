@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Modifier l'article</h1>
<form method="POST" action="{{ route('admin.posts.update', $post) }}" class="space-y-6 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
  @csrf @method('PUT')
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (FR) *</label>
      <input name="title_fr" value="{{ old('title_fr', $post->title_fr) }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (EN) *</label>
      <input name="title_en" value="{{ old('title_en', $post->title_en) }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (FR) *</label>
      <textarea name="excerpt_fr" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_fr', $post->excerpt_fr) }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (EN) *</label>
      <textarea name="excerpt_en" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_en', $post->excerpt_en) }}</textarea>
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (FR) *</label>
      <textarea name="body_fr" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_fr', $post->body_fr) }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (EN) *</label>
      <textarea name="body_en" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_en', $post->body_en) }}</textarea>
    </div>
  </div>
  <div class="flex items-center gap-6">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Tags</label>
      <input name="tags" value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : '') }}" class="border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
    <div class="flex items-center gap-2 mt-5">
      <input type="checkbox" name="published" value="1" id="published" {{ $post->published ? 'checked' : '' }} />
      <label for="published" class="text-sm font-semibold text-gray-700">Publié</label>
    </div>
  </div>
  <div class="flex gap-3">
    <button type="submit" class="bg-gold text-navy px-6 py-2 rounded font-semibold text-sm">Mettre à jour</button>
    <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-navy px-4 py-2 text-sm">Annuler</a>
  </div>
</form>
@endsection
