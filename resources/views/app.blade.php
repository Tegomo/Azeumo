<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  {{-- Meta dynamiques via Inertia --}}
  <title inertia>Steve William Azeumo</title>
  <meta name="description" content="Consultant indépendant en Intelligence Économique, Due Diligence et Veille Stratégique." />

  {{-- Open Graph --}}
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:site_name" content="Azeumo" />
  <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}" />

  {{-- Schema.org Person --}}
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Steve William Azeumo",
    "url": "https://www.azeumo.com",
    "jobTitle": "Consultant en Intelligence Économique",
    "email": "contact@azeumo.com",
    "telephone": "+237696550555",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Yaoundé",
      "addressCountry": "CM"
    },
    "sameAs": [
      "https://www.linkedin.com/in/azeumo/",
      "https://twitter.com/loftyazeumo",
      "http://www.facebook.com/loftyazeumo"
    ]
  }
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @inertiaHead
</head>
<body>
  @inertia
</body>
</html>
