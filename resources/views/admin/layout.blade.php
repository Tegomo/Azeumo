<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin — Azeumo</title>
  @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
  <nav class="bg-navy text-white px-6 py-3 flex items-center justify-between">
    <span class="font-display font-bold text-gold">Azeumo Admin</span>
    <div class="flex gap-6 text-sm">
      <a href="{{ route('admin.dashboard') }}" class="hover:text-gold">Dashboard</a>
      <a href="{{ route('admin.posts.index') }}" class="hover:text-gold">Articles</a>
      <a href="{{ route('admin.services.index') }}" class="hover:text-gold">Services</a>
      <a href="{{ route('admin.messages.index') }}" class="hover:text-gold">Messages</a>
      <a href="/" class="hover:text-gold">← Site</a>
      <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="hover:text-gold">Déconnexion</button>
      </form>
    </div>
  </nav>
  <main class="max-w-5xl mx-auto px-4 py-10">
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    @yield('content')
  </main>
</body>
</html>
