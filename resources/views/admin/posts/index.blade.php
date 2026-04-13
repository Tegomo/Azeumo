@extends('admin.layout')
@section('content')
<div class="flex items-center justify-between mb-6">
  <h1 class="font-display font-bold text-2xl text-navy">Articles</h1>
  <a href="{{ route('admin.posts.create') }}" class="bg-gold text-navy px-4 py-2 rounded font-semibold text-sm">+ Nouvel article</a>
</div>
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 border-b border-gray-200">
      <tr>
        <th class="text-left p-3">Titre (FR)</th>
        <th class="text-left p-3">Statut</th>
        <th class="text-left p-3">Date</th>
        <th class="p-3"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($posts as $post)
      <tr>
        <td class="p-3 font-medium">{{ $post->title_fr }}</td>
        <td class="p-3">
          <span class="px-2 py-0.5 rounded text-xs {{ $post->published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
            {{ $post->published ? 'Publié' : 'Brouillon' }}
          </span>
        </td>
        <td class="p-3 text-gray-500">{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
        <td class="p-3 flex gap-2 justify-end">
          <a href="{{ route('admin.posts.edit', $post) }}" class="text-gold hover:underline text-xs">Modifier</a>
          <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Supprimer ?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline text-xs">Supprimer</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="4" class="p-4 text-center text-gray-400">Aucun article.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
