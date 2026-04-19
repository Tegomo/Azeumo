@extends('admin.layout')
@section('title', 'Services')
@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Services</h1>
  <a href="{{ route('admin.services.create') }}" class="page-title-action">
    <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
    Ajouter
  </a>
</div>

<div class="tablenav">
  <span style="font-size:13px;color:#646970;">{{ $services->count() }} service(s)</span>
</div>

<table class="wp-list-table">
  <thead>
    <tr>
      <th style="width:50px;">Ordre</th>
      <th>Titre</th>
      <th style="width:80px;">Icône</th>
      <th style="width:80px;"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($services as $service)
    <tr>
      <td style="color:#646970;text-align:center;">{{ $service->order }}</td>
      <td class="column-title">
        <a href="{{ route('admin.services.edit', $service) }}" style="color:#1d2327;text-decoration:none;font-weight:600;">
          {{ $service->title_fr }}
        </a>
        @if($service->title_en)
          <span style="color:#646970;font-size:12px;display:block;font-weight:400;">EN: {{ Str::limit($service->title_en, 60) }}</span>
        @endif
        <div class="row-actions">
          <span class="edit"><a href="{{ route('admin.services.edit', $service) }}">Modifier</a></span>
          <span class="delete">
            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display:inline;" onsubmit="return confirm('Supprimer ce service ?')">
              @csrf @method('DELETE')
              <button type="submit">Corbeille</button>
            </form>
          </span>
        </div>
      </td>
      <td style="font-size:13px;color:#646970;">{{ $service->icon }}</td>
      <td>
        <a href="{{ route('admin.services.edit', $service) }}" class="button" style="font-size:12px;padding:3px 8px;">Modifier</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4" style="text-align:center;padding:24px;color:#646970;">
        Aucun service.
        <a href="{{ route('admin.services.create') }}" style="color:#FF7400;">Créer le premier ?</a>
      </td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection
