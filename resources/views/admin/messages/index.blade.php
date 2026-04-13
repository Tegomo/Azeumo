@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Messages reçus</h1>
<div class="space-y-4">
  @forelse($messages as $msg)
  <div class="bg-white rounded-lg p-5 border {{ $msg->read ? 'border-gray-200' : 'border-gold' }} shadow-sm">
    <div class="flex justify-between items-start mb-2">
      <div>
        <span class="font-semibold text-navy">{{ $msg->name }}</span>
        <span class="text-gray-400 text-sm ml-2">{{ $msg->email }}</span>
      </div>
      <div class="flex items-center gap-3">
        <span class="text-xs text-gray-400">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
        @unless($msg->read)
        <form method="POST" action="{{ route('admin.messages.read', $msg) }}">
          @csrf @method('PATCH')
          <button type="submit" class="text-xs text-gold hover:underline">Marquer lu</button>
        </form>
        @endunless
      </div>
    </div>
    <p class="text-sm font-semibold text-gray-700 mb-1">{{ $msg->subject }}</p>
    <p class="text-sm text-gray-600 whitespace-pre-line">{{ $msg->message }}</p>
  </div>
  @empty
  <p class="text-gray-400">Aucun message.</p>
  @endforelse
</div>
@endsection
