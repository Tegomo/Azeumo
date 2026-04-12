# Azeumo.com — Plan d'implémentation Laravel + Vue 3

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Site personnel `azeumo.com` bilingue FR/EN — Laravel 11 backend, Vue 3 (Inertia.js) pour les pages publiques, Blade pour le dashboard admin, MySQL.

**Architecture:** Laravel gère le routing, l'auth, la locale et les données. Inertia.js sert de pont entre les contrôleurs Laravel et les composants Vue 3 — pas d'API REST séparée. Le dashboard admin est en Blade pur (CRUD simple). Les contenus bilingues (articles, services) stockent `title_fr`, `title_en`, `body_fr`, `body_en` dans la même ligne MySQL.

**Tech Stack:** PHP 8.3, Laravel 11, Inertia.js v2, Vue 3 (Composition API), Vite, Tailwind CSS, MySQL 8, Laravel Breeze (auth admin), `spatie/laravel-translatable` non requis (colonnes `_fr`/`_en` directes).

---

## Structure des fichiers

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ServicesController.php
│   │   ├── MethodeController.php
│   │   ├── BlogController.php
│   │   ├── MediaController.php
│   │   ├── ContactController.php
│   │   ├── LocaleController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── PostController.php
│   │       ├── ServiceAdminController.php
│   │       └── MessageController.php
│   └── Middleware/
│       └── SetLocale.php
├── Models/
│   ├── Post.php
│   ├── Service.php
│   └── ContactMessage.php
database/migrations/
│   ├── xxxx_create_posts_table.php
│   ├── xxxx_create_services_table.php
│   └── xxxx_create_contact_messages_table.php
resources/
├── js/
│   ├── app.js
│   ├── Pages/
│   │   ├── Home.vue
│   │   ├── About.vue
│   │   ├── Services.vue
│   │   ├── Methode.vue
│   │   ├── Blog/Index.vue
│   │   ├── Blog/Show.vue
│   │   ├── Media.vue
│   │   └── Contact.vue
│   └── Components/
│       ├── Layout/AppLayout.vue
│       ├── Layout/Navbar.vue
│       ├── Layout/Footer.vue
│       ├── UI/Button.vue
│       ├── UI/SectionTitle.vue
│       └── UI/ServiceCard.vue
├── views/
│   ├── app.blade.php          ← template racine Inertia
│   └── admin/
│       ├── layout.blade.php
│       ├── dashboard.blade.php
│       ├── posts/index.blade.php
│       ├── posts/create.blade.php
│       ├── posts/edit.blade.php
│       ├── services/index.blade.php
│       ├── services/create.blade.php
│       ├── services/edit.blade.php
│       └── messages/index.blade.php
└── lang/
    ├── fr.json
    └── en.json
routes/web.php
```

---

## Task 1 : Installation et configuration du projet

- [ ] **Créer le projet Laravel**

```bash
cd /home/anuvis/Azeumo
composer create-project laravel/laravel . "^11.0"
```

- [ ] **Configurer `.env`**

```env
APP_NAME=Azeumo
APP_URL=http://localhost:8000
APP_LOCALE=fr
APP_FALLBACK_LOCALE=en

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=azeumo
DB_USERNAME=root
DB_PASSWORD=secret
```

- [ ] **Créer la base de données**

```bash
mysql -u root -p -e "CREATE DATABASE azeumo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

- [ ] **Installer Inertia + Vue 3 + Tailwind**

```bash
composer require inertiajs/inertia-laravel
npm install @inertiajs/vue3 vue @vitejs/plugin-vue
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

- [ ] **Installer Laravel Breeze (auth admin)**

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

- [ ] **`vite.config.js`**

```js
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    laravel({ input: ['resources/js/app.js', 'resources/css/app.css'], refresh: true }),
    vue({ template: { transformAssetUrls: { base: null, includeAbsolute: false } } }),
  ],
})
```

- [ ] **`tailwind.config.js`**

```js
export default {
  content: ['./resources/**/*.{blade.php,vue,js}'],
  theme: {
    extend: {
      colors: {
        navy: { DEFAULT: '#0A1628', 700: '#0d1f38' },
        gold: { DEFAULT: '#C9A84C', dark: '#a07d2c' },
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        display: ['Montserrat', 'sans-serif'],
      },
    },
  },
}
```

- [ ] **`resources/css/app.css`**

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap');

@layer base {
  body { @apply bg-white text-navy font-sans antialiased; }
}
```

- [ ] **`resources/js/app.js`**

```js
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import AppLayout from './Components/Layout/AppLayout.vue'
import '../css/app.css'

createInertiaApp({
  resolve: (name) =>
    resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```

- [ ] **`resources/views/app.blade.php`** (template racine Inertia)

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title inertia>Azeumo</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @inertiaHead
</head>
<body>
  @inertia
</body>
</html>
```

- [ ] **Publier le middleware Inertia**

```bash
php artisan inertia:middleware
```

Ajouter dans `bootstrap/app.php` :

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [\App\Http\Middleware\HandleInertiaRequests::class]);
})
```

- [ ] **Vérifier**

```bash
npm run dev &
php artisan serve
# Ouvrir http://localhost:8000
```

Expected: page Laravel par défaut (ou Breeze login).

- [ ] **Commit**

```bash
git add .
git commit -m "feat: initialize Laravel 11 + Inertia + Vue 3 + Tailwind"
```

---

## Task 2 : Internationalisation (FR/EN)

- [ ] **Middleware `SetLocale`** — `app/Http/Middleware/SetLocale.php`

```php
<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale'));
        if (!in_array($locale, ['fr', 'en'])) {
            $locale = 'fr';
        }
        App::setLocale($locale);
        return $next($request);
    }
}
```

Enregistrer dans `bootstrap/app.php` après `HandleInertiaRequests` :

```php
\App\Http\Middleware\SetLocale::class,
```

- [ ] **`LocaleController`** — `app/Http/Controllers/LocaleController.php`

```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch(Request $request, string $locale)
    {
        if (in_array($locale, ['fr', 'en'])) {
            Session::put('locale', $locale);
        }
        return back();
    }
}
```

- [ ] **Route locale dans `routes/web.php`**

```php
Route::get('/locale/{locale}', [\App\Http\Controllers\LocaleController::class, 'switch'])
    ->name('locale.switch');
```

- [ ] **`resources/lang/fr.json`**

```json
{
  "nav.about": "À propos",
  "nav.services": "Services",
  "nav.method": "Méthode",
  "nav.blog": "Blog",
  "nav.media": "Média",
  "nav.contact": "Contact",
  "hero.tag": "Intelligence Économique · Due Diligence · Veille Stratégique",
  "hero.subtitle": "Consultant indépendant, partenaire stratégique et opérationnel au sein de projets innovants en Afrique et dans le monde.",
  "hero.cta_services": "Découvrir mes services",
  "hero.cta_contact": "Me contacter",
  "services.title": "Mes Services",
  "services.subtitle": "Des solutions sur mesure pour vos défis stratégiques et organisationnels.",
  "services.order_cta": "Commandez un service",
  "method.title": "Ma Méthode",
  "blog.title": "Blog & Articles",
  "blog.empty": "Aucun article publié pour l'instant.",
  "media.title": "Média",
  "contact.title": "Me contacter",
  "contact.name": "Votre nom",
  "contact.email": "Votre email",
  "contact.subject": "Sujet",
  "contact.message": "Votre message",
  "contact.send": "Envoyer",
  "contact.success": "Message envoyé ! Je vous répondrai rapidement.",
  "contact.whatsapp": "Écrire sur WhatsApp",
  "footer.legal": "Mentions légales",
  "about.title": "À propos de moi",
  "about.skills": "Compétences clés",
  "about.education": "Éducation & Qualifications",
  "about.bibliography": "Bibliographie"
}
```

- [ ] **`resources/lang/en.json`**

```json
{
  "nav.about": "About",
  "nav.services": "Services",
  "nav.method": "Method",
  "nav.blog": "Blog",
  "nav.media": "Media",
  "nav.contact": "Contact",
  "hero.tag": "Economic Intelligence · Due Diligence · Strategic Watch",
  "hero.subtitle": "Independent consultant, strategic and operational partner for innovative projects in Africa and worldwide.",
  "hero.cta_services": "Discover my services",
  "hero.cta_contact": "Contact me",
  "services.title": "My Services",
  "services.subtitle": "Tailored solutions for your strategic and organisational challenges.",
  "services.order_cta": "Request a service",
  "method.title": "My Method",
  "blog.title": "Blog & Articles",
  "blog.empty": "No articles published yet.",
  "media.title": "Media",
  "contact.title": "Contact me",
  "contact.name": "Your name",
  "contact.email": "Your email",
  "contact.subject": "Subject",
  "contact.message": "Your message",
  "contact.send": "Send",
  "contact.success": "Message sent! I will reply shortly.",
  "contact.whatsapp": "Message on WhatsApp",
  "footer.legal": "Legal notice",
  "about.title": "About me",
  "about.skills": "Key skills",
  "about.education": "Education & Qualifications",
  "about.bibliography": "Bibliography"
}
```

- [ ] **Partager la locale via Inertia (`HandleInertiaRequests.php`)**

```php
public function share(Request $request): array
{
    return array_merge(parent::share($request), [
        'locale' => app()->getLocale(),
        'translations' => fn() => collect(trans(app()->getLocale()))->toArray(),
    ]);
}
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add FR/EN i18n with SetLocale middleware and lang files"
```

---

## Task 3 : Migrations et modèles

- [ ] **Migration `posts`**

```bash
php artisan make:migration create_posts_table
```

```php
// database/migrations/xxxx_create_posts_table.php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique();
    $table->string('title_fr');
    $table->string('title_en');
    $table->text('excerpt_fr');
    $table->text('excerpt_en');
    $table->longText('body_fr');
    $table->longText('body_en');
    $table->json('tags')->nullable();
    $table->boolean('published')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
});
```

- [ ] **Migration `services`**

```bash
php artisan make:migration create_services_table
```

```php
Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique();
    $table->string('icon');
    $table->string('title_fr');
    $table->string('title_en');
    $table->text('summary_fr');
    $table->text('summary_en');
    $table->longText('body_fr');
    $table->longText('body_en');
    $table->unsignedTinyInteger('order')->default(0);
    $table->timestamps();
});
```

- [ ] **Migration `contact_messages`**

```bash
php artisan make:migration create_contact_messages_table
```

```php
Schema::create('contact_messages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('subject');
    $table->text('message');
    $table->boolean('read')->default(false);
    $table->timestamps();
});
```

- [ ] **Lancer les migrations**

```bash
php artisan migrate
```

Expected: 3 tables créées + tables Breeze (users, sessions…).

- [ ] **`app/Models/Post.php`**

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'slug', 'title_fr', 'title_en', 'excerpt_fr', 'excerpt_en',
        'body_fr', 'body_en', 'tags', 'published', 'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function title(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr;
    }

    public function excerpt(): string
    {
        $locale = app()->getLocale();
        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_fr;
    }

    public function body(): string
    {
        $locale = app()->getLocale();
        return $this->{"body_{$locale}"} ?? $this->body_fr;
    }

    public static function published()
    {
        return static::where('published', true)->orderByDesc('published_at');
    }
}
```

- [ ] **`app/Models/Service.php`**

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'icon', 'title_fr', 'title_en',
        'summary_fr', 'summary_en', 'body_fr', 'body_en', 'order',
    ];

    public function title(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr;
    }

    public function summary(): string
    {
        $locale = app()->getLocale();
        return $this->{"summary_{$locale}"} ?? $this->summary_fr;
    }

    public function body(): string
    {
        $locale = app()->getLocale();
        return $this->{"body_{$locale}"} ?? $this->body_fr;
    }
}
```

- [ ] **`app/Models/ContactMessage.php`**

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'read'];
    protected $casts = ['read' => 'boolean'];
}
```

- [ ] **Seeder — services initiaux**

```bash
php artisan make:seeder ServiceSeeder
```

```php
// database/seeders/ServiceSeeder.php
use App\Models\Service;

public function run(): void
{
    $services = [
        [
            'slug' => 'conseil-management',
            'icon' => '🏢',
            'title_fr' => 'Conseil en Management des Organisations',
            'title_en' => 'Organisational Management Consulting',
            'summary_fr' => 'Stratégie fiable, outils simples, pour atteindre la performance par anticipation.',
            'summary_en' => 'Reliable strategy and simple tools to achieve anticipated performance.',
            'body_fr' => "Gérer une entreprise demande beaucoup d'énergie. J'interviens pour mettre en place une stratégie fiable permettant d'atteindre la performance escomptée et de prendre les bonnes décisions au moment opportun.\n\nMon intervention couvre : la fidélisation clients, l'innovation, la qualité des relations internes, fournisseurs et clients.",
            'body_en' => "Running a business takes a great deal of energy. I step in to establish a reliable strategy enabling you to reach expected performance and make the right decisions at the right time.\n\nMy scope covers: customer loyalty, innovation, and the quality of internal, supplier and client relationships.",
            'order' => 1,
        ],
        [
            'slug' => 'conception-gestion-projets',
            'icon' => '📋',
            'title_fr' => 'Conception et Gestion des Projets',
            'title_en' => 'Project Design and Management',
            'summary_fr' => "+10 ans d'expérience dans la conduite de projets complexes pour des organisations africaines et internationales.",
            'summary_en' => '+10 years of experience managing complex projects for African and international organisations.',
            'body_fr' => "Maîtrise de la conception de projets avec +10 ans d'expérience. Projet phare : Incubateur d'entrepreneurs sociaux → +500 jeunes accompagnés, +90 entreprises stables, agrément gouvernemental 2022.",
            'body_en' => "Project design expertise with +10 years of experience. Flagship project: Social entrepreneur incubator → +500 young people supported, +90 stable businesses, government accreditation 2022.",
            'order' => 2,
        ],
        [
            'slug' => 'intelligence-economique',
            'icon' => '🔍',
            'title_fr' => 'Intelligence Économique en Afrique',
            'title_en' => 'Economic Intelligence in Africa',
            'summary_fr' => "+15 ans dans la conduite de missions d'Intelligence Économique.",
            'summary_en' => '+15 years conducting Economic Intelligence missions.',
            'body_fr' => "+15 ans dans la conduite de missions d'IE : procédés défensifs / offensifs / d'influence.\n\nMissions types : collecte OSINT, benchmarking, veille SWOT, due diligence, cartographie client, lobbying, implémentation de départements IE.",
            'body_en' => "+15 years conducting EI missions: defensive / offensive / influence.\n\nTypical missions: OSINT collection, benchmarking, SWOT monitoring, due diligence, client mapping, lobbying, EI department setup.",
            'order' => 3,
        ],
        [
            'slug' => 'veille-due-diligence',
            'icon' => '🛡️',
            'title_fr' => 'Veille Stratégique · Due Diligence · Protection des données',
            'title_en' => 'Strategic Watch · Due Diligence · Data Protection',
            'summary_fr' => 'Veille concurrentielle, diligence raisonnable et conformité des données personnelles.',
            'summary_en' => 'Competitive watch, due diligence and personal data compliance.',
            'body_fr' => "**Veille Stratégique :** veille concurrentielle, environnementale et sociétale.\n\n**Due Diligence :** vérifications juridiques, financières, environnementales et sociales avant toute signature.\n\n**Protection des données :** conformité aux lois camerounaises et internationales.",
            'body_en' => "**Strategic Watch:** competitive, environmental and societal monitoring.\n\n**Due Diligence:** legal, financial, environmental and social checks before any signature.\n\n**Data Protection:** compliance with Cameroonian and international law.",
            'order' => 4,
        ],
        [
            'slug' => 'projets-developpement',
            'icon' => '🌍',
            'title_fr' => 'Projets de Développement',
            'title_en' => 'Development Projects',
            'summary_fr' => "Conception, gestion opérationnelle, gestion financière et évaluation d'impact de projets financés par des bailleurs internationaux.",
            'summary_en' => 'Design, operational management, financial management and impact assessment of internationally funded projects.',
            'body_fr' => "Conception, gestion opérationnelle, gestion financière et évaluation d'impact de projets de développement, notamment financés par des bailleurs internationaux (AICS, CEI, ONG AVSI).",
            'body_en' => "Design, operational management, financial management and impact assessment of development projects, notably funded by international donors (AICS, CEI, AVSI NGO).",
            'order' => 5,
        ],
    ];

    foreach ($services as $data) {
        Service::updateOrCreate(['slug' => $data['slug']], $data);
    }
}
```

```bash
php artisan db:seed --class=ServiceSeeder
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add migrations, models (Post, Service, ContactMessage) and ServiceSeeder"
```

---

## Task 4 : Composants Vue (Layout + UI)

- [ ] **`resources/js/Components/Layout/AppLayout.vue`**

```vue
<template>
  <div>
    <Navbar />
    <main class="pt-16">
      <slot />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
</script>
```

- [ ] **`resources/js/Components/Layout/Navbar.vue`**

```vue
<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-navy/95 backdrop-blur-sm border-b border-white/10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
      <Link href="/" class="font-display font-bold text-white text-lg hover:text-gold transition-colors">
        AZEUMO
      </Link>

      <!-- Desktop -->
      <nav class="hidden md:flex items-center gap-6">
        <Link v-for="link in links" :key="link.href" :href="link.href"
          class="text-sm font-medium transition-colors"
          :class="isActive(link.href) ? 'text-gold' : 'text-gray-300 hover:text-white'">
          {{ t(link.key) }}
        </Link>
      </nav>

      <!-- Locale switcher -->
      <div class="hidden md:flex items-center gap-2 ml-6">
        <a :href="`/locale/fr`" class="text-xs font-semibold"
           :class="locale === 'fr' ? 'text-gold' : 'text-gray-400 hover:text-white'">FR</a>
        <span class="text-gray-600">|</span>
        <a :href="`/locale/en`" class="text-xs font-semibold"
           :class="locale === 'en' ? 'text-gold' : 'text-gray-400 hover:text-white'">EN</a>
      </div>

      <!-- Mobile burger -->
      <button class="md:hidden text-white p-2" @click="open = !open">
        <span class="block w-5 h-0.5 bg-white mb-1" />
        <span class="block w-5 h-0.5 bg-white mb-1" />
        <span class="block w-5 h-0.5 bg-white" />
      </button>
    </div>

    <!-- Mobile menu -->
    <nav v-if="open" class="md:hidden bg-navy border-t border-white/10 px-4 pb-4">
      <Link v-for="link in links" :key="link.href" :href="link.href"
        @click="open = false"
        class="block py-2 text-gray-300 hover:text-gold transition-colors">
        {{ t(link.key) }}
      </Link>
      <div class="flex gap-3 pt-2">
        <a href="/locale/fr" class="text-xs" :class="locale === 'fr' ? 'text-gold font-bold' : 'text-gray-400'">FR</a>
        <a href="/locale/en" class="text-xs" :class="locale === 'en' ? 'text-gold font-bold' : 'text-gray-400'">EN</a>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { useRoute } from '../../../composables/useI18n'

const { t, locale } = useRoute()
const open = ref(false)

const links = [
  { href: '/a-propos', key: 'nav.about' },
  { href: '/services', key: 'nav.services' },
  { href: '/methode', key: 'nav.method' },
  { href: '/blog', key: 'nav.blog' },
  { href: '/media', key: 'nav.media' },
  { href: '/contact', key: 'nav.contact' },
]

function isActive(href) {
  return window.location.pathname.startsWith(href)
}
</script>
```

- [ ] **`resources/js/Components/Layout/Footer.vue`**

```vue
<template>
  <footer class="bg-navy text-gray-400 py-10 mt-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
      <p class="text-sm">© {{ year }} Steve William Azeumo · Yaoundé, Cameroun</p>
      <div class="flex gap-6 text-sm">
        <a href="https://www.linkedin.com/in/azeumo/" target="_blank" rel="noopener noreferrer"
           class="hover:text-gold transition-colors">LinkedIn</a>
        <a href="https://twitter.com/loftyazeumo" target="_blank" rel="noopener noreferrer"
           class="hover:text-gold transition-colors">Twitter</a>
        <Link href="/mentions-legales" class="hover:text-gold transition-colors">
          {{ t('footer.legal') }}
        </Link>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { useRoute } from '../../../composables/useI18n'
const { t } = useRoute()
const year = new Date().getFullYear()
</script>
```

- [ ] **Composable i18n `resources/js/composables/useI18n.js`**

```js
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export function useRoute() {
  const page = usePage()
  const locale = computed(() => page.props.locale)
  const translations = computed(() => page.props.translations ?? {})

  function t(key) {
    return translations.value[key] ?? key
  }

  return { t, locale }
}
```

- [ ] **`resources/js/Components/UI/Button.vue`**

```vue
<template>
  <component :is="href ? (external ? 'a' : Link) : 'button'"
    :href="href"
    :target="external ? '_blank' : undefined"
    :rel="external ? 'noopener noreferrer' : undefined"
    :type="!href ? (type || 'button') : undefined"
    class="inline-flex items-center justify-center px-6 py-3 rounded font-display font-semibold text-sm tracking-wide transition-colors duration-200"
    :class="variantClass">
    <slot />
  </component>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  href: String,
  variant: { type: String, default: 'primary' },
  external: Boolean,
  type: String,
})

const variantClass = computed(() => ({
  'bg-gold text-navy hover:bg-gold-dark': props.variant === 'primary',
  'border-2 border-gold text-gold hover:bg-gold hover:text-navy': props.variant === 'outline',
}))
</script>
```

- [ ] **`resources/js/Components/UI/SectionTitle.vue`**

```vue
<template>
  <div class="mb-10">
    <h2 class="font-display text-3xl font-bold mb-3" :class="light ? 'text-white' : 'text-navy'">
      {{ title }}
    </h2>
    <div class="w-16 h-1 bg-gold rounded mb-4" />
    <p v-if="subtitle" class="text-lg max-w-2xl" :class="light ? 'text-gray-300' : 'text-gray-600'">
      {{ subtitle }}
    </p>
  </div>
</template>

<script setup>
defineProps({ title: String, subtitle: String, light: Boolean })
</script>
```

- [ ] **`resources/js/Components/UI/ServiceCard.vue`**

```vue
<template>
  <Link :href="`/services#${slug}`"
    class="block p-6 border border-gray-200 rounded-lg hover:border-gold hover:shadow-md transition-all duration-200 group">
    <span class="text-3xl mb-4 block">{{ icon }}</span>
    <h3 class="font-display font-bold text-navy text-lg mb-2 group-hover:text-gold transition-colors">
      {{ title }}
    </h3>
    <p class="text-gray-600 text-sm leading-relaxed">{{ summary }}</p>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ icon: String, title: String, summary: String, slug: String })
</script>
```

- [ ] **Commit**

```bash
git add resources/js/
git commit -m "feat: add Vue layout components (Navbar, Footer, AppLayout) and UI components"
```

---

## Task 5 : Contrôleurs et pages Vue publiques (Home, About, Services, Méthode)

- [ ] **Routes publiques dans `routes/web.php`**

```php
<?php
use App\Http\Controllers\{
    HomeController, AboutController, ServicesController,
    MethodeController, BlogController, MediaController,
    ContactController, LocaleController
};

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/methode', [MethodeController::class, 'index'])->name('methode');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/media', [MediaController::class, 'index'])->name('media');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
Route::get('/mentions-legales', fn() => inertia('MentionsLegales'))->name('legal');
```

- [ ] **`HomeController.php`**

```php
<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'services' => Service::orderBy('order')->get()->map(fn($s) => [
                'slug' => $s->slug,
                'icon' => $s->icon,
                'title' => $s->title(),
                'summary' => $s->summary(),
            ]),
        ]);
    }
}
```

- [ ] **`AboutController.php`**

```php
<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class AboutController extends Controller
{
    public function index()
    {
        return Inertia::render('About');
    }
}
```

- [ ] **`ServicesController.php`**

```php
<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

class ServicesController extends Controller
{
    public function index()
    {
        return Inertia::render('Services', [
            'services' => Service::orderBy('order')->get()->map(fn($s) => [
                'slug' => $s->slug,
                'icon' => $s->icon,
                'title' => $s->title(),
                'body' => $s->body(),
            ]),
        ]);
    }
}
```

- [ ] **`MethodeController.php`**

```php
<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MethodeController extends Controller
{
    public function index()
    {
        return Inertia::render('Methode', [
            'missions' => [
                ['year' => '2019', 'object' => 'Due Diligence', 'location' => 'Paris, France'],
                ['year' => '2013–aujourd\'hui', 'object' => 'Collecte OSINT', 'location' => 'Ploeren, France'],
                ['year' => '2013–2019', 'object' => 'Stratégie de croissance', 'location' => 'Rome, Kenya, Cameroun'],
                ['year' => '2017', 'object' => 'Benchmarking', 'location' => 'Manille, Philippines'],
                ['year' => '2019', 'object' => 'Veille OSINT + SWOT', 'location' => 'Dakar, Mali, Burkina Faso'],
                ['year' => '2015', 'object' => 'Stratégie réseau', 'location' => 'Nairobi, Kenya'],
                ['year' => '2013–aujourd\'hui', 'object' => 'Cartographie client', 'location' => 'Yaoundé, Cameroun'],
            ],
        ]);
    }
}
```

- [ ] **`resources/js/Pages/Home.vue`**

```vue
<template>
  <AppLayout>
    <!-- Hero -->
    <section class="bg-navy text-white min-h-[90vh] flex items-center">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
          <p class="text-gold font-display font-semibold text-sm tracking-widest uppercase mb-4">
            {{ t('hero.tag') }}
          </p>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6">
            Steve William<br /><span class="text-gold">Azeumo</span>
          </h1>
          <p class="text-gray-300 text-lg leading-relaxed mb-8 max-w-lg">{{ t('hero.subtitle') }}</p>
          <blockquote class="border-l-2 border-gold pl-4 text-gray-400 italic text-sm mb-8 max-w-md">
            "I've a dream that one day, Africa will be one Country with one Authority and one Nation." — Lofty Azeumo
          </blockquote>
          <div class="flex flex-wrap gap-4">
            <Button href="/services">{{ t('hero.cta_services') }}</Button>
            <Button href="/contact" variant="outline">{{ t('hero.cta_contact') }}</Button>
          </div>
        </div>
        <div class="hidden md:flex justify-center">
          <div class="w-72 h-72 rounded-full border-4 border-gold/30 overflow-hidden bg-navy-700 flex items-center justify-center">
            <img v-if="false" src="/images/portrait.jpg" alt="Steve William Azeumo" class="w-full h-full object-cover" />
            <span class="text-6xl">👤</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle :title="t('services.title')" :subtitle="t('services.subtitle')" />
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <ServiceCard v-for="s in services" :key="s.slug"
            :icon="s.icon" :title="s.title" :summary="s.summary" :slug="s.slug" />
        </div>
      </div>
    </section>

    <!-- Method teaser -->
    <section class="py-20 bg-navy text-white">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle :title="t('method.title')" light />
        <div class="grid md:grid-cols-3 gap-8 mb-10">
          <div v-for="m in modes" :key="m.key" class="bg-white/5 border border-white/10 rounded-lg p-6">
            <span class="text-3xl block mb-3">{{ m.icon }}</span>
            <h3 class="font-display font-bold text-gold text-lg mb-2">{{ t(m.titleKey) }}</h3>
            <p class="text-gray-300 text-sm leading-relaxed">{{ t(m.descKey) }}</p>
          </div>
        </div>
        <Button href="/methode" variant="outline">{{ locale === 'fr' ? 'En savoir plus' : 'Learn more' }}</Button>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import ServiceCard from '../Components/UI/ServiceCard.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ services: Array })

const { t, locale } = useRoute()

const modes = [
  { icon: '🤝', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: '🎓', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: '🔧', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]
</script>
```

Ajouter les clés `method.conseil`, `method.formation`, `method.intervention` (+ `_desc`) dans `fr.json` et `en.json` :

```json
// fr.json (ajout)
"method.conseil": "Conseil",
"method.conseil_desc": "Accompagnement stratégique personnalisé, co-construction de la solution avec le client.",
"method.formation": "Formation",
"method.formation_desc": "Ateliers sur l'IE, l'entrepreneuriat et l'économie de communion.",
"method.intervention": "Intervention",
"method.intervention_desc": "Missions terrain, enquêtes OSINT, déploiement opérationnel, audits."
```

```json
// en.json (ajout)
"method.conseil": "Consulting",
"method.conseil_desc": "Personalised strategic support, co-building solutions with the client.",
"method.formation": "Training",
"method.formation_desc": "Workshops on EI, entrepreneurship and economy of communion.",
"method.intervention": "Field work",
"method.intervention_desc": "On-site missions, OSINT investigations, operational deployment, audits."
```

- [ ] **`resources/js/Pages/Services.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('services.title')" :subtitle="t('services.subtitle')" />
      <div class="space-y-16">
        <section v-for="s in services" :key="s.slug" :id="s.slug" class="scroll-mt-20">
          <div class="flex items-start gap-4 mb-4">
            <span class="text-4xl">{{ s.icon }}</span>
            <h2 class="font-display font-bold text-navy text-2xl leading-snug">{{ s.title }}</h2>
          </div>
          <div class="border-l-4 border-gold pl-6">
            <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ s.body }}</p>
          </div>
        </section>
      </div>
      <div class="mt-16 bg-navy text-white rounded-xl p-8 text-center">
        <h3 class="font-display font-bold text-2xl mb-3">{{ t('services.order_cta') }}</h3>
        <Button href="/contact">{{ t('hero.cta_contact') }}</Button>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'
defineProps({ services: Array })
const { t } = useRoute()
</script>
```

- [ ] **`resources/js/Pages/Methode.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('method.title')" />
      <div class="grid md:grid-cols-3 gap-8 mb-20">
        <div v-for="m in modes" :key="m.key" class="bg-gray-50 rounded-xl p-6 border border-gray-200">
          <span class="text-4xl block mb-4">{{ m.icon }}</span>
          <h2 class="font-display font-bold text-navy text-xl mb-3">{{ t(m.titleKey) }}</h2>
          <p class="text-gray-600 text-sm leading-relaxed">{{ t(m.descKey) }}</p>
        </div>
      </div>

      <SectionTitle :title="locale === 'fr' ? 'Tableau des missions IE' : 'EI Missions'" />
      <div class="overflow-x-auto mb-16">
        <table class="w-full text-sm border-collapse">
          <thead>
            <tr class="bg-navy text-white">
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Année' : 'Year' }}</th>
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Objet' : 'Object' }}</th>
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(m, i) in missions" :key="i" :class="i % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
              <td class="p-3 font-mono text-gold font-semibold whitespace-nowrap">{{ m.year }}</td>
              <td class="p-3 text-gray-700">{{ m.object }}</td>
              <td class="p-3 text-gray-500">{{ m.location }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <Button href="/contact">{{ t('hero.cta_contact') }}</Button>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ missions: Array })
const { t, locale } = useRoute()

const modes = [
  { icon: '🤝', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: '🎓', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: '🔧', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]
</script>
```

- [ ] **Vérifier**

```bash
npm run dev &
php artisan serve
# Tester / , /a-propos, /services, /methode en FR et EN
```

Expected: pages avec contenu traduit, switcher de langue fonctionnel.

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add public controllers and Vue pages (Home, Services, Methode)"
```

---

## Task 6 : Blog, Média, Contact (pages Vue + contrôleurs)

- [ ] **`BlogController.php`**

```php
<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog/Index', [
            'posts' => Post::published()->get()->map(fn($p) => [
                'slug' => $p->slug,
                'title' => $p->title(),
                'excerpt' => $p->excerpt(),
                'tags' => $p->tags,
                'published_at' => $p->published_at?->format('d/m/Y'),
            ]),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->published, 404);
        return Inertia::render('Blog/Show', [
            'post' => [
                'slug' => $post->slug,
                'title' => $post->title(),
                'body' => $post->body(),
                'tags' => $post->tags,
                'published_at' => $post->published_at?->format('d/m/Y'),
            ],
        ]);
    }
}
```

- [ ] **`MediaController.php`**

```php
<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MediaController extends Controller
{
    public function index()
    {
        $items = [
            ['category' => 'Réseaux sociaux', 'label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/azeumo/', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Twitter / X', 'href' => 'https://twitter.com/loftyazeumo', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Facebook', 'href' => 'http://www.facebook.com/loftyazeumo', 'type' => 'social'],
            ['category' => 'Bibliographie', 'label' => "L'Intelligence Économique Camerounaise — Harmattan", 'href' => 'https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html', 'type' => 'book'],
            ['category' => 'Bibliographie', 'label' => "L'Intelligence Économique Camerounaise — Amazon", 'href' => 'https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8', 'type' => 'book'],
            ['category' => 'Vidéos', 'label' => 'VoxAfrica — Voxbook 2014 (I)', 'href' => 'https://www.youtube.com/watch?v=KUohpA131dc', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => 'VoxAfrica — Voxbook 2014 (II)', 'href' => 'https://www.youtube.com/watch?v=Z05xRdvgeNw', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => 'Économie de Communion — IT', 'href' => 'https://youtu.be/uY7XdBj8JDg', 'type' => 'video'],
            ['category' => 'Articles & Interviews', 'label' => 'romereports.com', 'href' => 'https://www.romereports.com/en/2017/02/04/economy-of-communion-an-alternative-to-the-economy-that-kills-which-pope-francis-denounces/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => 'francescoeconomy.org', 'href' => 'https://francescoeconomy.org/vocation-and-profit-in-the-perspective-of-african-culture/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => 'algeriancenter.com', 'href' => 'https://algeriancenter.com/le-cameroun-entre-francophonie-commonwealth-et-les-geants-usa-chine-interview-de-steve-william-azeumo/', 'type' => 'article'],
        ];

        return Inertia::render('Media', ['items' => $items]);
    }
}
```

- [ ] **`ContactController.php`**

```php
<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:20',
        ]);

        ContactMessage::create($data);

        return back()->with('success', true);
    }
}
```

- [ ] **`resources/js/Pages/Blog/Index.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('blog.title')" />
      <p v-if="!posts.length" class="text-gray-500">{{ t('blog.empty') }}</p>
      <div class="space-y-8">
        <article v-for="p in posts" :key="p.slug" class="border-b border-gray-100 pb-8">
          <p class="text-sm text-gold font-mono mb-2">{{ p.published_at }}</p>
          <h2 class="font-display font-bold text-navy text-xl mb-2 hover:text-gold transition-colors">
            <Link :href="`/blog/${p.slug}`">{{ p.title }}</Link>
          </h2>
          <p class="text-gray-600 text-sm leading-relaxed mb-3">{{ p.excerpt }}</p>
          <div v-if="p.tags?.length" class="flex flex-wrap gap-2">
            <span v-for="tag in p.tags" :key="tag"
              class="text-xs bg-gold/10 text-gold px-2 py-0.5 rounded">{{ tag }}</span>
          </div>
        </article>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
import SectionTitle from '../../Components/UI/SectionTitle.vue'
import { useRoute } from '../../composables/useI18n'
defineProps({ posts: Array })
const { t } = useRoute()
</script>
```

- [ ] **`resources/js/Pages/Blog/Show.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <Link href="/blog" class="text-sm text-gold hover:underline mb-8 inline-block">← Blog</Link>
      <p class="text-sm text-gray-400 font-mono mb-3">{{ post.published_at }}</p>
      <h1 class="font-display font-bold text-navy text-3xl sm:text-4xl mb-8 leading-tight">
        {{ post.title }}
      </h1>
      <div class="prose prose-lg max-w-none text-gray-700 whitespace-pre-line leading-relaxed">
        {{ post.body }}
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
defineProps({ post: Object })
</script>
```

- [ ] **`resources/js/Pages/Media.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('media.title')" />
      <section v-for="cat in categories" :key="cat" class="mb-12">
        <h2 class="font-display font-bold text-navy text-xl mb-4 border-b border-gold/30 pb-2">{{ cat }}</h2>
        <ul class="space-y-3">
          <li v-for="item in byCategory(cat)" :key="item.href">
            <a :href="item.href" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3 group hover:text-gold transition-colors">
              <span class="text-xl">{{ icons[item.type] }}</span>
              <span class="text-gray-700 group-hover:text-gold underline underline-offset-2">{{ item.label }}</span>
            </a>
          </li>
        </ul>
      </section>
    </div>
  </AppLayout>
</template>

<script setup>
import { computed } from 'vue'
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import { useRoute } from '../composables/useI18n'

const props = defineProps({ items: Array })
const { t } = useRoute()

const icons = { social: '💬', book: '📚', video: '🎥', article: '📰' }
const categories = computed(() => [...new Set(props.items.map(i => i.category))])
function byCategory(cat) { return props.items.filter(i => i.category === cat) }
</script>
```

- [ ] **`resources/js/Pages/Contact.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('contact.title')" />
      <div class="grid md:grid-cols-2 gap-12">
        <!-- Coordonnées -->
        <div>
          <div class="space-y-4 mb-8">
            <div>
              <p class="text-sm font-semibold text-navy mb-1">Email</p>
              <a href="mailto:contact@azeumo.com" class="text-gold hover:underline">contact@azeumo.com</a>
            </div>
            <div>
              <p class="text-sm font-semibold text-navy mb-1">{{ locale === 'fr' ? 'Téléphone' : 'Phone' }}</p>
              <a href="tel:+237674463867" class="text-gray-700 hover:text-gold block">+237 674 46 38 67</a>
              <a href="tel:+237696550555" class="text-gray-700 hover:text-gold block">+237 696 55 05 55</a>
            </div>
            <div>
              <p class="text-sm font-semibold text-navy mb-1">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</p>
              <p class="text-gray-600">Yaoundé, Cameroun</p>
            </div>
          </div>
          <a href="https://wa.me/237674463867" target="_blank" rel="noopener noreferrer"
             class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded font-semibold text-sm transition-colors">
            💬 {{ t('contact.whatsapp') }}
          </a>
        </div>

        <!-- Formulaire -->
        <form @submit.prevent="submit" class="space-y-5">
          <div v-if="$page.props.flash?.success" class="text-green-600 text-sm p-3 bg-green-50 rounded">
            {{ t('contact.success') }}
          </div>
          <div>
            <input v-model="form.name" :placeholder="t('contact.name') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
          </div>
          <div>
            <input v-model="form.email" type="email" :placeholder="t('contact.email') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
          </div>
          <div>
            <input v-model="form.subject" :placeholder="t('contact.subject') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.subject" class="text-red-500 text-xs mt-1">{{ form.errors.subject }}</p>
          </div>
          <div>
            <textarea v-model="form.message" :placeholder="t('contact.message') + ' *'" rows="5"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold resize-none" />
            <p v-if="form.errors.message" class="text-red-500 text-xs mt-1">{{ form.errors.message }}</p>
          </div>
          <Button type="submit" :class="{ 'opacity-60 cursor-not-allowed': form.processing }">
            {{ form.processing ? '…' : t('contact.send') }}
          </Button>
        </form>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

const { t, locale } = useRoute()
const form = useForm({ name: '', email: '', subject: '', message: '' })
function submit() { form.post('/contact') }
</script>
```

- [ ] **Vérifier**

```bash
# Tester /blog, /media, /contact — formulaire contact
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add Blog, Media, Contact pages with controllers"
```

---

## Task 7 : Dashboard Admin (Blade)

- [ ] **Routes admin dans `routes/web.php`** (après les routes publiques)

```php
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceAdminController::class);
    Route::get('messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::patch('messages/{message}/read', [\App\Http\Controllers\Admin\MessageController::class, 'markRead'])->name('messages.read');
});
```

- [ ] **`resources/views/admin/layout.blade.php`**

```blade
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
```

- [ ] **`DashboardController.php`**

```php
<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Post, ContactMessage};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postCount' => Post::count(),
            'unreadCount' => ContactMessage::where('read', false)->count(),
            'messageCount' => ContactMessage::count(),
        ]);
    }
}
```

- [ ] **`resources/views/admin/dashboard.blade.php`**

```blade
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
```

- [ ] **`PostController.php`** (admin)

```php
<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest()->get()]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'excerpt_fr' => 'required|string',
            'excerpt_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title_fr']) . '-' . now()->timestamp;
        $data['tags'] = $data['tags'] ? array_map('trim', explode(',', $data['tags'])) : [];
        $data['published_at'] = $data['published'] ?? false ? now() : null;

        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article créé.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'excerpt_fr' => 'required|string',
            'excerpt_en' => 'required|string',
            'body_fr' => 'required|string',
            'body_en' => 'required|string',
            'tags' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data['tags'] = $data['tags'] ? array_map('trim', explode(',', $data['tags'])) : [];
        if (($data['published'] ?? false) && !$post->published_at) {
            $data['published_at'] = now();
        }

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Article supprimé.');
    }
}
```

- [ ] **`resources/views/admin/posts/index.blade.php`**

```blade
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
```

- [ ] **`resources/views/admin/posts/create.blade.php`**

```blade
@extends('admin.layout')
@section('content')
<h1 class="font-display font-bold text-2xl text-navy mb-6">Nouvel article</h1>
<form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-6 bg-white p-6 rounded-lg shadow-sm border border-gray-200">
  @csrf
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (FR) *</label>
      <input name="title_fr" value="{{ old('title_fr') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
      @error('title_fr')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Titre (EN) *</label>
      <input name="title_en" value="{{ old('title_en') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm" />
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (FR) *</label>
      <textarea name="excerpt_fr" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_fr') }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Extrait (EN) *</label>
      <textarea name="excerpt_en" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm">{{ old('excerpt_en') }}</textarea>
    </div>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (FR) *</label>
      <textarea name="body_fr" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_fr') }}</textarea>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Corps (EN) *</label>
      <textarea name="body_en" rows="10" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm font-mono">{{ old('body_en') }}</textarea>
    </div>
  </div>
  <div class="flex items-center gap-6">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Tags (séparés par virgule)</label>
      <input name="tags" value="{{ old('tags') }}" class="border border-gray-300 rounded px-3 py-2 text-sm" placeholder="IE, Cameroun, OSINT" />
    </div>
    <div class="flex items-center gap-2 mt-5">
      <input type="checkbox" name="published" value="1" id="published" {{ old('published') ? 'checked' : '' }} />
      <label for="published" class="text-sm font-semibold text-gray-700">Publier immédiatement</label>
    </div>
  </div>
  <div class="flex gap-3">
    <button type="submit" class="bg-gold text-navy px-6 py-2 rounded font-semibold text-sm">Enregistrer</button>
    <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-navy px-4 py-2 text-sm">Annuler</a>
  </div>
</form>
@endsection
```

- [ ] **`resources/views/admin/posts/edit.blade.php`**

```blade
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
```

- [ ] **`MessageController.php`**

```php
<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index', [
            'messages' => ContactMessage::latest()->get(),
        ]);
    }

    public function markRead(ContactMessage $message)
    {
        $message->update(['read' => true]);
        return back();
    }
}
```

- [ ] **`resources/views/admin/messages/index.blade.php`**

```blade
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
```

- [ ] **Créer l'utilisateur admin**

```bash
php artisan tinker
# Dans tinker :
\App\Models\User::create([
    'name' => 'Steve Azeumo',
    'email' => 'admin@azeumo.com',
    'password' => bcrypt('ChangeMe2026!')
]);
```

- [ ] **Vérifier le dashboard admin**

```bash
# Naviguer vers http://localhost:8000/admin
# Se connecter avec admin@azeumo.com / ChangeMe2026!
# Créer un article bilingue, vérifier qu'il apparaît sur /blog
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add Blade admin dashboard (posts CRUD, messages, services)"
```

---

## Task 8 : Page À propos et Mentions Légales (Vue)

- [ ] **`resources/js/Pages/About.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('about.title')" />

      <!-- Bio -->
      <div class="prose prose-lg max-w-none text-gray-700 mb-16 space-y-4">
        <p v-for="para in bio" :key="para">{{ para }}</p>
        <ul class="list-none p-0 space-y-1 text-sm text-gray-600">
          <li>📅 {{ locale === 'fr' ? 'Né le' : 'Born' }} 01/06/1987, Yaoundé, Cameroun</li>
          <li>🗣️ {{ locale === 'fr' ? 'Langues' : 'Languages' }} : Français, Anglais, Italien</li>
        </ul>
      </div>

      <!-- Compétences -->
      <SectionTitle :title="t('about.skills')" />
      <div class="grid sm:grid-cols-3 gap-4 mb-16">
        <div v-for="s in skills" :key="s.label" class="border border-gray-200 rounded-lg p-4 text-center">
          <span class="block text-2xl font-display font-bold text-gold mb-1">{{ s.exp }}</span>
          <span class="text-sm text-gray-600">{{ locale === 'fr' ? s.labelFr : s.labelEn }}</span>
        </div>
      </div>

      <!-- Éducation -->
      <SectionTitle :title="t('about.education')" />
      <div class="space-y-3 mb-16">
        <div v-for="e in education" :key="e.degree"
          class="flex flex-col sm:flex-row sm:items-start gap-2 py-3 border-b border-gray-100">
          <span class="text-sm font-mono text-gold font-semibold whitespace-nowrap min-w-[110px]">{{ e.period }}</span>
          <div>
            <p class="font-medium text-navy">{{ e.degree }}</p>
            <p class="text-sm text-gray-500">{{ e.institution }}{{ e.mention ? ` — ${e.mention}` : '' }}</p>
          </div>
        </div>
      </div>

      <!-- Bibliographie -->
      <SectionTitle :title="t('about.bibliography')" />
      <div class="border border-gold/30 rounded-lg p-6 bg-gold/5 mb-6">
        <h3 class="font-display font-bold text-navy text-lg mb-2">L'Intelligence Économique Camerounaise (IEC)</h3>
        <p class="text-gray-600 text-sm mb-4">Éditions Harmattan Cameroun, 2013 — ISBN 978-2-343-01199-8</p>
        <div class="flex flex-wrap gap-3">
          <Button href="https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html" variant="outline" external>Harmattan</Button>
          <Button href="https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8" variant="outline" external>Amazon</Button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

const { t, locale } = useRoute()

const bio = [
  "Consultant indépendant, agissant en tant que partenaire stratégique et opérationnel au sein de projets innovants d'organisations du continent africain et du monde entier.",
  "Auteur de « L'intelligence économique Camerounaise » publié en 2013 aux éditions l'Harmattan Cameroun ; ISBN 978-2-343-01199-8.",
  "Je crois au potentiel humain et que dans tout projet ou entreprise nous devons mettre l'être humain au centre de tout ; raison pour laquelle je milite aux côtés des entrepreneurs de l'économie de communion et du mouvement The Economy of Francesco.",
]

const skills = [
  { exp: '10 ans', labelFr: "Conception et Gestion des projets d'IE", labelEn: 'EI Project Design & Management' },
  { exp: '10 ans', labelFr: 'Veille · Due Diligence · Protection des données', labelEn: 'Watch · Due Diligence · Data Protection' },
  { exp: '10 ans', labelFr: 'Conseils en Gestion des Organisations', labelEn: 'Organisational Management Consulting' },
]

const education = [
  { period: '2026', degree: 'CAS — Ethical Management', institution: 'Université de Fribourg' },
  { period: '2025', degree: 'Certification Gestion financière (développement)', institution: 'ITCILO (ILO)' },
  { period: '2024', degree: 'CAS — Integral Economics', institution: 'Université de Fribourg' },
  { period: '2021', degree: 'Certification Conception et gestion de projet', institution: 'ITCILO (ILO)' },
  { period: '2019', degree: "Certificat Intelligence des marchés Africain", institution: 'CAVIE / ACCI' },
  { period: '2018–2019', degree: "Master 2 Pro — Administration des Affaires (BAC+5)", institution: 'Université de Dschang', mention: 'Assez bien' },
  { period: '2011–2014', degree: "Licence Pro — Gestion de l'information (BAC+3)", institution: 'ESSTIC — UYII-Soa', mention: 'Assez bien' },
  { period: '2009–2010', degree: 'Sciences économiques et gestion', institution: 'Université de Yaoundé II' },
  { period: '2008', degree: 'Baccalauréat Scientifique Mathématiques', institution: '—', mention: 'Passable' },
]
</script>
```

- [ ] **`resources/js/Pages/MentionsLegales.vue`**

```vue
<template>
  <AppLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-20 prose prose-sm text-gray-700">
      <h1 class="font-display text-navy">Mentions Légales</h1>
      <h2>Éditeur</h2>
      <p>AZEUMO — Steve William Azeumo<br />Directeur de la publication : Monsieur Steve William Azeumo, Yaoundé, Cameroun</p>
      <h2>Hébergeur</h2>
      <p>OVH SAS / Infomaniak — <a href="https://www.infomaniak.com/fr" target="_blank" rel="noopener noreferrer">infomaniak.com</a></p>
      <h2>Concepteur initial</h2>
      <p>Tegomo Alain</p>
      <h2>Lois applicables</h2>
      <ul>
        <li>Loi N°2010/012 — Cybersécurité et cybercriminalité</li>
        <li>Loi N°2010/013 — Communications électroniques</li>
        <li>Loi N°2010/021 — Commerce électronique</li>
      </ul>
      <h2>Contact</h2>
      <p><a href="mailto:contact@azeumo.com">contact@azeumo.com</a></p>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
</script>
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add About and MentionsLegales Vue pages"
```

---

## Task 9 : SEO (meta, Open Graph, Schema.org)

- [ ] **`HandleInertiaRequests.php` — partager les meta SEO**

```php
public function share(Request $request): array
{
    return array_merge(parent::share($request), [
        'locale' => app()->getLocale(),
        'translations' => fn() => json_decode(file_get_contents(lang_path(app()->getLocale() . '.json')), true),
        'seo' => [
            'title' => 'Steve William Azeumo — Consultant en Intelligence Économique',
            'description' => "Consultant indépendant en Intelligence Économique, Due Diligence et Veille Stratégique. +15 ans d'expérience en Afrique.",
            'url' => $request->url(),
            'locale' => app()->getLocale(),
        ],
    ]);
}
```

- [ ] **Ajouter les balises meta dans `resources/views/app.blade.php`**

```blade
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
    "telephone": "+237674463867",
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
```

- [ ] **Commit**

```bash
git add .
git commit -m "feat: add SEO meta, Open Graph and Schema.org Person"
```

---

## Task 10 : Déploiement OVH/Infomaniak

- [ ] **`.env.production` (modèle)**

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.azeumo.com

DB_CONNECTION=mysql
DB_HOST=<host_infomaniak>
DB_DATABASE=<db_name>
DB_USERNAME=<db_user>
DB_PASSWORD=<db_password>

SESSION_DRIVER=database
CACHE_DRIVER=file
```

- [ ] **Checklist déploiement**

```bash
# Sur le serveur :
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan db:seed --class=ServiceSeeder --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

- [ ] **`public/.htaccess`** (si Apache OVH)

S'assurer que Laravel inclut le `.htaccess` standard (présent par défaut dans `public/`).

- [ ] **Commit final**

```bash
git add .
git commit -m "feat: production deployment config and checklist"
```

---

## Checklist de couverture

| Exigence | Tâche | Statut |
|---|---|---|
| Laravel 11 backend | Task 1 | ✅ |
| Vue 3 (Inertia) pages publiques | Tasks 4–6, 8 | ✅ |
| Dashboard admin Blade | Task 7 | ✅ |
| MySQL | Task 3 | ✅ |
| Bilingue FR/EN, défaut FR | Task 2 | ✅ |
| Home (Hero + Services + Méthode) | Task 5 | ✅ |
| À propos (bio + diplômes + biblio) | Task 8 | ✅ |
| Services (5 services dynamiques DB) | Tasks 3+5 | ✅ |
| Méthode | Task 5 | ✅ |
| Blog bilingue (admin CRUD) | Tasks 6+7 | ✅ |
| Média | Task 6 | ✅ |
| Contact (formulaire + WhatsApp) | Task 6 | ✅ |
| Mentions légales | Task 8 | ✅ |
| SEO (meta + OG + Schema.org) | Task 9 | ✅ |
| Responsive mobile-first | Tasks 4–8 | ✅ |
| Déployable OVH/Infomaniak | Task 10 | ✅ |
| Analytics Matomo | Non inclus — à ajouter post-deploy |
