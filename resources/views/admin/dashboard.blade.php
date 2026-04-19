@extends('admin.layout')
@section('title', 'Tableau de bord')
@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Tableau de bord</h1>
</div>

<!-- Stats -->
<div class="dashboard-widget-wrap">
  <div class="dashboard-widget">
    <a href="{{ route('admin.posts.index') }}">
      <svg style="width:32px;height:32px;color:#FF7400;margin:0 auto 8px;display:block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
      <span class="widget-count">{{ $postCount }}</span>
      <span class="widget-label">Articles publiés</span>
    </a>
  </div>
  <div class="dashboard-widget">
    <a href="{{ route('admin.messages.index') }}">
      <svg style="width:32px;height:32px;color:#FF7400;margin:0 auto 8px;display:block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      <span class="widget-count">{{ $messageCount }}</span>
      <span class="widget-label">Messages reçus</span>
    </a>
  </div>
  <div class="dashboard-widget">
    <a href="{{ route('admin.messages.index') }}">
      <svg style="width:32px;height:32px;color:#d63638;margin:0 auto 8px;display:block;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
      <span class="widget-count" style="color:#d63638;">{{ $unreadCount }}</span>
      <span class="widget-label">Messages non lus</span>
    </a>
  </div>
</div>

<!-- Quick actions -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
  <div class="postbox">
    <div class="postbox-header"><h2>Actions rapides</h2></div>
    <div class="inside">
      <div class="wp-quicklinks">
        <a href="{{ route('admin.posts.create') }}" class="button button-primary">
          <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Nouvel article
        </a>
        <a href="{{ route('admin.services.create') }}" class="button">
          <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Nouveau service
        </a>
        <a href="{{ route('admin.messages.index') }}" class="button">
          Voir les messages
          @if($unreadCount > 0)
            <span style="background:#d63638;color:#fff;border-radius:10px;padding:0 6px;font-size:11px;">{{ $unreadCount }}</span>
          @endif
        </a>
        <a href="{{ url('/') }}" target="_blank" class="button">↗ Voir le site</a>
      </div>
    </div>
  </div>

  <div class="postbox">
    <div class="postbox-header"><h2>Informations du site</h2></div>
    <div class="inside">
      <table style="width:100%;font-size:13px;border-collapse:collapse;">
        <tr style="border-bottom:1px solid #f0f0f1;">
          <td style="padding:6px 0;color:#646970;width:120px;">Version Laravel</td>
          <td style="padding:6px 0;font-weight:600;">{{ app()->version() }}</td>
        </tr>
        <tr style="border-bottom:1px solid #f0f0f1;">
          <td style="padding:6px 0;color:#646970;">PHP</td>
          <td style="padding:6px 0;font-weight:600;">{{ PHP_VERSION }}</td>
        </tr>
        <tr style="border-bottom:1px solid #f0f0f1;">
          <td style="padding:6px 0;color:#646970;">Environnement</td>
          <td style="padding:6px 0;font-weight:600;">{{ app()->environment() }}</td>
        </tr>
        <tr>
          <td style="padding:6px 0;color:#646970;">Locale par défaut</td>
          <td style="padding:6px 0;font-weight:600;">{{ config('app.locale') }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection
