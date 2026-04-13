@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Dashboard</h1>
<div class="grid grid-cols-3 gap-6">
  <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 text-center">
    <span class="block text-3xl font-bold text-gold">{{ $postCount }}</span>
    <span class="text-sm text-gray-500">Articles</span>
  </div>
  <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 text-center">
    <span class="block text-3xl font-bold text-gold">{{ $messageCount }}</span>
    <span class="text-sm text-gray-500">Messages reçus</span>
  </div>
  <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 text-center">
    <span class="block text-3xl font-bold text-red-500">{{ $unreadCount }}</span>
    <span class="text-sm text-gray-500">Non lus</span>
  </div>
</div>
@endsection
