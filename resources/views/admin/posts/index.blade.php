@extends('admin.layout')
@section('title', 'Articles')
@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Articles</h1>
  <a href="{{ route('admin.posts.create') }}" class="page-title-action">
    <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
    Ajouter
  </a>
</div>

<div class="tablenav">
  <span style="font-size:13px;color:#646970;">{{ $posts->count() }} article(s)</span>
</div>

<table class="wp-list-table">
  <thead>
    <tr>
      <th style="width:40%;">Titre</th>
      <th>Statut</th>
      <th>Date</th>
      <th style="width:80px;"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($posts as $post)
    <tr>
      <td class="column-title">
        <a href="{{ route('admin.posts.edit', $post) }}" style="color:#1d2327;text-decoration:none;font-weight:600;">
          {{ $post->title_fr }}
        </a>
        @if($post->title_en)
          <span style="color:#646970;font-size:12px;display:block;font-weight:400;">EN: {{ Str::limit($post->title_en, 60) }}</span>
        @endif
        <div class="row-actions">
          <span class="edit"><a href="{{ route('admin.posts.edit', $post) }}">Modifier</a></span>
          <span class="view"><a href="{{ url('/blog/'.$post->slug) }}" target="_blank">Voir</a></span>
          <span class="delete">
            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display:inline;" onsubmit="return confirm('Supprimer cet article ?')">
              @csrf @method('DELETE')
              <button type="submit">Corbeille</button>
            </form>
          </span>
        </div>
      </td>
      <td>
        <span class="status-badge {{ $post->published ? 'published' : 'draft' }}">
          {{ $post->published ? 'Publié' : 'Brouillon' }}
        </span>
      </td>
      <td style="color:#646970;font-size:13px;white-space:nowrap;">
        {{ $post->published_at?->format('d/m/Y') ?? '—' }}
      </td>
      <td>
        <a href="{{ route('admin.posts.edit', $post) }}" class="button" style="font-size:12px;padding:3px 8px;">Modifier</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4" style="text-align:center;padding:24px;color:#646970;">
        Aucun article pour l'instant.
        <a href="{{ route('admin.posts.create') }}" style="color:#FF7400;">Créer le premier ?</a>
      </td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection
