@extends('admin.layout')
@section('title', 'Messages')
@section('content')

<div class="title-area">
  <h1 class="wp-heading-inline">Messages reçus</h1>
  @php $unreadCount = $messages->where('read', false)->count(); @endphp
  @if($unreadCount > 0)
    <span style="display:inline-flex;align-items:center;gap:4px;background:#fcf0f1;color:#d63638;border:1px solid #f5c6cb;padding:3px 10px;border-radius:2px;font-size:13px;font-weight:600;margin-left:8px;">
      <svg style="width:13px;height:13px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      {{ $unreadCount }} non lu(s)
    </span>
  @endif
</div>

@if($messages->isEmpty())
  <div class="postbox">
    <div class="inside" style="text-align:center;padding:32px;color:#646970;">
      <svg style="width:40px;height:40px;margin:0 auto 12px;display:block;opacity:.3;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      <p style="margin:0;">Aucun message pour l'instant.</p>
    </div>
  </div>
@else
  <div style="display:flex;flex-direction:column;gap:8px;">
    @foreach($messages as $msg)
    <div class="message-card {{ $msg->read ? 'read' : 'unread' }}">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:10px;">
        <!-- Avatar + identité -->
        <div style="display:flex;align-items:center;gap:10px;">
          <div style="width:38px;height:38px;border-radius:50%;background:{{ $msg->read ? '#f0f0f1' : '#fff5ed' }};display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <span style="font-size:15px;font-weight:700;color:{{ $msg->read ? '#646970' : '#FF7400' }};">
              {{ strtoupper(substr($msg->name, 0, 1)) }}
            </span>
          </div>
          <div>
            <span style="font-weight:600;color:#1d2327;font-size:14px;">{{ $msg->name }}</span>
            <a href="mailto:{{ $msg->email }}" style="display:block;font-size:12px;color:#646970;text-decoration:none;">{{ $msg->email }}</a>
          </div>
        </div>

        <!-- Meta droite -->
        <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
          <span class="status-badge {{ $msg->read ? 'read' : 'unread' }}">
            {{ $msg->read ? 'Lu' : 'Non lu' }}
          </span>
          <span style="font-size:12px;color:#646970;white-space:nowrap;">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
          @unless($msg->read)
          <form method="POST" action="{{ route('admin.messages.read', $msg) }}" style="margin:0;">
            @csrf @method('PATCH')
            <button type="submit" class="button" style="font-size:12px;padding:3px 8px;">
              ✓ Marquer lu
            </button>
          </form>
          @endunless
        </div>
      </div>

      <!-- Sujet -->
      <div style="background:{{ $msg->read ? '#f6f7f7' : '#fff8f3' }};border-radius:3px;padding:8px 12px;margin-bottom:8px;">
        <span style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#646970;">Sujet</span>
        <p style="margin:2px 0 0;font-size:14px;font-weight:600;color:#1d2327;">{{ $msg->subject }}</p>
      </div>

      <!-- Message -->
      <p style="font-size:13px;color:#3c434a;line-height:1.7;margin:0;white-space:pre-line;">{{ $msg->message }}</p>

      <!-- Reply link -->
      <div style="margin-top:10px;padding-top:10px;border-top:1px solid #f0f0f1;display:flex;gap:8px;">
        <a href="mailto:{{ $msg->email }}?subject=Re: {{ $msg->subject }}" class="button" style="font-size:12px;padding:3px 10px;">
          ↩ Répondre par email
        </a>
        @if($msg->email)
        <a href="https://wa.me/{{ preg_replace('/\D/', '', '') }}" style="display:none;"></a>
        @endif
      </div>
    </div>
    @endforeach
  </div>
@endif

@endsection
